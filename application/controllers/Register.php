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

    public function do_register() {
        parent::show_404_if_not_ajax();
        $user_name = $this->input->post("user_name");
        $user_handphone = $this->input->post("user_handphone");
        $user_email = $this->input->post("user_email");
        $user_password = $this->input->post("user_password");

        if ($user_name != "" && $user_handphone != "" && $user_email != "" && $user_password != "") {
            $data = array(
                "user_name" => $user_name,
                "user_handphone" => $user_handphone,
                "user_email" => $user_email,
                "user_password" => $user_password
            );
            $result = $this->Register_model->do_register($data);

            if ($result["status"] == "success") {
                $this->load->library("email", parent::get_default_email_config());

                $this->email->from("admin@lancarmotor.dnp-project.com", "Admin Lancar Motor");
                $this->email->to($user_email);
                $this->email->subject("Email Verification");
                $this->email->message("Thank you for your registration. <br />Please click on the link below to verify your account at lancarmotor.com<br /><br />" . base_url("register/verify_email?verification_token=" . $result["verification_token"]));
                $this->email->send();

                $result = array(
                    "status" => "success",
                    "email" => $result["user_email"]
                );
            }

            echo json_encode($result);
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => "error"
            ));
        }
    }
    
    public function thank_you() {
        $email = $this->input->get("email");
        if ($email == null || $email == "") {
            redirect(base_url("login"));
        } else {
            parent::set_header_additional_class("hide");
            $data = array(
                "title" => "Thank You &mdash; Lancar Motor",
                "email" => $email
            );
            
            parent::view("register_thank_you", $data);
        }
    }

    public function verify_email() {
        $verification_token = $this->input->get("verification_token");
        $valid = false;
        if (trim($verification_token) != "") {
            $result = $this->Register_model->verify_email($verification_token);
            $valid = $result;
        }

        parent::set_header_additional_class("hide");
        $data = array(
            "title" => "Thank You &mdash; Lancar Motor",
            "valid" => $valid
        );
        
        parent::view("verify_email", $data);
    }
}
