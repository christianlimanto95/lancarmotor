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
        parent::set_header_menu_active("shop");
		$data = array(
			"title" => "Shop &mdash; Lancar Motor"
		);
		
		parent::view("shop", $data);
    }
    
    public function item_detail() {
        parent::set_header_menu_active("shop");
		$data = array(
			"title" => "NGK Busi &mdash; Lancar Motor"
		);
		
		parent::view("item_detail", $data);
    }
}
