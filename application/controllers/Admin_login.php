<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Admin_login extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Admin_login_model");
	}
	
	public function index()
	{
		$data = array(
			"title" => "Admin Login &mdash; Lancar Motor"
		);
		
		$this->load->view("admin_login", $data);
    }
    
    public function do_login() {
		parent::show_404_if_not_ajax();
		$username = $this->input->post("username", true);
		$password = $this->input->post("password", true);
		if ($username != "" && $password != "") {
			$data = $this->Admin_login_model->get_data($username);
			if (sizeof($data) > 0) {
				if (password_verify($password, $data[0]->admin_password)) {
					$this->session->set_userdata("admin_id", $data[0]->admin_id);

					echo json_encode(array(
						"status" => "success"
					));
				} else {
					echo json_encode(array(
						"status" => "error"
					));
				}
			} else {
				echo json_encode(array(
					"status" => "error"
				));
			}
		} else {
			echo json_encode(array(
				"status" => "error"
			));
		}
    }
    
    public function logout() {
		$this->session->unset_userdata("admin_id");
		redirect(base_url("admin_login"));
	}
}
