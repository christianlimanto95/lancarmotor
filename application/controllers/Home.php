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
			if (sizeof($data) > 0 && $data[0]->user_google_id == "") {
				if (password_verify($password, $data[0]->user_password)) {
                    $this->session->set_userdata("user_id", $data[0]->user_id);
                    $this->Home_model->import_cart_from_temp(parent::is_logged_in(), parent::get_temp_user());
                    
                    echo json_encode(array(
                        "status" => "success"
                    ));
				} else {
					echo json_encode(array(
                        "status" => "error",
                        "message" => "Email / Password salah"
					));
				}
			} else {
				echo json_encode(array(
                    "status" => "error",
                    "message" => "Email / Password salah"
				));
			}
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => "Email / Password salah"
            ));
        }
    }

    public function do_login_with_google($data = null) {
        if ($data != null) {
            $result = $this->Home_model->do_login_with_google($data);
            $this->session->set_userdata("user_id", $result["user_id"]);
            $this->Home_model->import_cart_from_temp(parent::is_logged_in(), parent::get_temp_user());
            
            echo json_encode(array(
                "status" => "success"
            ));
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => ""
            ));
        }
    }

    function verify_google_id_token() {
        require_once("vendor/autoload.php");
        $CLIENT_ID = "702991525631-258gshg35oef1lfhnt21hohro5rjito9.apps.googleusercontent.com";
        $client = new Google_Client(['client_id' => $CLIENT_ID]);
        $id_token = $this->input->post("idtoken", true);
        $email = $this->input->post("email", true);
        $name = $this->input->post("name", true);
        $payload = $client->verifyIdToken($id_token);
        if ($payload) {
            $userid = $payload['sub'];
            $data = array(
                "user_google_id" => $id_token,
                "user_email" => $email,
                "user_name" => $name
            );
            $this->do_login_with_google($data);
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => "Google Login Error"
            ));
        }
    }

    public function logout() {
        $redirect = $this->input->get("redirect");
        $this->session->unset_userdata("user_id");

        redirect("https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" . $redirect);
    }

    public function get_cart() {
        $user_id = parent::is_logged_in();
        $temp_user_id = parent::get_temp_user();
        $cart = array();
        $cart = $this->Home_model->get_cart($user_id, $temp_user_id);
        $iLength = sizeof($cart);
        for ($i = 0; $i < $iLength; $i++) {
            $cart[$i]->image_url = base_url("assets/images/item/item_" . $cart[$i]->item_id . "." . $cart[$i]->item_image_extension . "?d=" . strtotime($cart[$i]->modified_date));
        }
        
        echo json_encode(array(
            "status" => "success",
            "data" => $cart
        ));
    }

    public function add_to_cart() {
        parent::show_404_if_not_ajax();

        $item_id = $this->input->post("item_id");
        $item_qty = $this->input->post("item_qty");
        $data = array(
            "item_id" => $item_id,
            "item_qty" => $item_qty,
            "user_id" => parent::is_logged_in(),
            "temp_user_id" => parent::get_temp_user()
        );

        $result = $this->Home_model->add_to_cart($data);
        if ($result) {
            $this->get_cart();
        } else {
            echo json_encode(array(
                "status" => "error"
            ));
        }
    }

    public function delete_from_cart() {
        parent::show_404_if_not_ajax();
        $dcart_id = $this->input->post("dcart_id");
        $data = array(
            "dcart_id" => $dcart_id,
            "user_id" => parent::is_logged_in(),
            "temp_user_id" => parent::get_temp_user()
        );
        $result = $this->Home_model->delete_from_cart($data);
        if ($result) {
            $this->get_cart();
        } else {
            echo json_encode(array(
                "status" => "error"
            ));
        }
    }
}
