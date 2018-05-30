<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Shop extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Shop_model");
	}
	
	public function index()
	{
        $brands = $this->Shop_model->get_brands();
        $categories = $this->Shop_model->get_categories();

        $query_category = $this->input->get("category");
        $query_brand = $this->input->get("brand");
        $query_keyword = $this->input->get("keyword");
        if ($query_category != null || $query_brand != null || $query_keyword != null) {
            $query_data = array(
                "brand" => $query_brand,
                "category" => $query_category,
                "keyword" => $query_keyword
            );
            $items = $this->Shop_model->get_items_query($query_data);
        } else {
            $items = $this->Shop_model->get_items();
        }
        parent::set_header_menu_active("shop");
		$data = array(
            "title" => "Shop &mdash; Lancar Motor",
            "items" => $items,
            "brands" => $brands,
            "categories" => $categories,
            "query_category" => $query_category,
            "query_brand" => $query_brand,
            "query_keyword" => $query_keyword
		);
		
		parent::view("shop", $data);
    }

    public function get_item_query() {
        parent::show_404_if_not_ajax();
        $brand = $this->input->post("brand");
        $category = $this->input->post("category");
        $keyword = $this->input->post("keyword");
        $data = array(
            "brand" => $brand,
            "category" => $category,
            "keyword" => $keyword
        );
        $items = $this->Shop_model->get_items_query($data);
        $iLength = sizeof($items);
        for ($i = 0; $i < $iLength; $i++) {
            $url_name = str_replace(" ", "-", str_replace("-", "", $items[$i]->item_name));
            $url = base_url("item-detail/" . $url_name . "-" . $items[$i]->item_id);
            $items[$i]->item_url = $url;
            $items[$i]->src = base_url("assets/images/item/item_" . $items[$i]->item_id . "." . $items[$i]->item_image_extension . "?d=" . strtotime($items[$i]->modified_date));
        }

        echo json_encode(array(
            "status" => "success",
            "data" => $items
        ));
    }
    
    public function item_detail() {
        $url_name = $this->uri->segment(2);
        $url_item = explode("-", $url_name);
        $id = $url_item[sizeof($url_item) - 1];
        $detail = $this->Shop_model->get_item_by_id($id);
        if (sizeof($detail) > 0) {
            $detail = $detail[0];
            $brands = $this->Shop_model->get_brands();
            $categories = $this->Shop_model->get_categories();
            $query_category = $this->input->get("category");
            $query_brand = $this->input->get("brand");
            parent::set_header_menu_active("shop");
            $data = array(
                "title" => $detail->item_name . " &mdash; Lancar Motor",
                "data" => $detail,
                "brands" => $brands,
                "categories" => $categories,
                "query_category" => $query_category,
                "query_brand" => $query_brand
            );
            
            parent::view("item_detail", $data);
        } else {
            redirect(base_url("shop"));
        }
    }
}
