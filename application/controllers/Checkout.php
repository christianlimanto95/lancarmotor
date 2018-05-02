<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Checkout extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Checkout_model");
	}
	
	public function index()
	{
		$data = array(
			"title" => "Shipping Information &mdash; Lancar Motor"
		);
		
		parent::view("shipping_information", $data);
    }
    
    public function payment() {
        $data = array(
			"title" => "Payment &mdash; Lancar Motor"
		);
		
		parent::view("payment", $data);
    }
}
