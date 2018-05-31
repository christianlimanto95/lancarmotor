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
        parent::redirect_if_not_logged_in("?redirect=" . rawurlencode(base_url("checkout")));
        $cart = $this->Checkout_model->get_cart(parent::is_logged_in());
        parent::do_hide_cart();
		$data = array(
            "title" => "Shipping Information &mdash; Lancar Motor",
            "data" => $cart
		);
		
		parent::view("shipping_information", $data);
    }
    
    public function payment() {
        parent::redirect_if_not_logged_in("?redirect=" . rawurlencode(base_url("checkout/payment")));
        $cart = $this->Checkout_model->get_cart(parent::is_logged_in());
        parent::do_hide_cart();
        $data = array(
            "title" => "Payment &mdash; Lancar Motor",
            "data" => $cart
		);
		
		parent::view("payment", $data);
    }
}
