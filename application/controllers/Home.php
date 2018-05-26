<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Home extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Home_model");
	}
	
	public function index()
	{
        $brands = $this->Home_model->get_brands();
        $categories = $this->Home_model->get_categories();
        $items = $this->Home_model->get_items();
        parent::set_header_menu_active("home");
        parent::set_header_additional_class("transparent");
		$data = array(
            "title" => "Lancar Motor",
            "brands" => $brands,
            "categories" => $categories,
            "items" => $items
		);
		
		parent::view("home", $data);
	}
}
