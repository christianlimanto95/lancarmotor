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
    
    public function do_login() {
        parent::show_404_if_not_ajax();
        $email = $this->input->post("email", true);
        $password = $this->input->post("password", true);

        if ($email != "" && $password != "") {
            $data = $this->Home_model->get_data($email);
			if (sizeof($data) > 0) {
				if (password_verify($password, $data[0]->user_password)) {
					$this->session->set_userdata("user_id", $data[0]->user_id);

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
        $redirect = $this->input->get("redirect");
        $this->session->unset_userdata("user_id");
        if ($redirect) {
            redirect($redirect);
        } else {
            redirect(base_url());
        }
    }

    public function add_to_cart() {
        parent::show_404_if_not_ajax();
        $item_id = $this->input->post("item_id");
    }
}
