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
        $items = $this->Shop_model->get_items();
        parent::set_header_menu_active("shop");
		$data = array(
            "title" => "Shop &mdash; Lancar Motor",
            "items" => $items,
            "brands" => $brands,
            "categories" => $categories
		);
		
		parent::view("shop", $data);
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
            parent::set_header_menu_active("shop");
            $data = array(
                "title" => $detail->item_name . " &mdash; Lancar Motor",
                "data" => $detail,
                "brands" => $brands,
                "categories" => $categories
            );
            
            parent::view("item_detail", $data);
        } else {
            redirect(base_url("shop"));
        }
    }
}
