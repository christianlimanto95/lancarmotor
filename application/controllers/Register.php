<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Register extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Register_model");
	}
	
	public function index()
	{
        parent::set_header_additional_class("hide");
		$data = array(
			"title" => "Register &mdash; Lancar Motor"
		);
		
		parent::view("register", $data);
	}
}
