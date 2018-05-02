<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Contact_us extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Contact_us_model");
	}
	
	public function index()
	{
        parent::set_header_menu_active("contact");
		$data = array(
			"title" => "Contact Us &mdash; Lancar Motor"
		);
		
		parent::view("contact_us", $data);
	}
}
