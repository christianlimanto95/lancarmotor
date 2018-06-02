<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
NOTE
Just put general function which frequently used in this class
**/

class General_controller extends CI_Controller
{
    protected $additional_files = "";
    protected $additional_css = "";
    protected $additional_js = "";
    protected $header_additional_class = "";
    protected $header_menu = array(
        "home" => "",
        "shop" => "",
        "about" => "",
        "contact" => ""
    );

    protected $admin_menu_active = array(
        "home" => "",
        "master_satuan" => "",
        "master_kategori" => "",
        "master_brand" => "",
        "master_barang" => "",
        "konfirmasi_pembayaran" => "",
        "update_status_pesanan" => "",
        "laporan" => ""
    );

    protected $hide_cart = false;
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/General_model');
    }

    public function set_header_menu_active($menu) {
        $this->header_menu[$menu] = " active";
    }

    public function set_header_additional_class($class_name) {
        $this->header_additional_class = " " . $class_name;
    }

	public function load_module($module_name) {
		$this->load_additional_css($module_name);
		$this->load_additional_js($module_name);
	}
	
	public function load_additional_css($file_name) {
		$this->additional_css .= "<link href='" . base_url("assets/css/template/" . $file_name . ".css") . "' rel='stylesheet'>";
	}
	
	public function load_additional_js($file_name) {
		$this->additional_js .= "<script src='" . base_url("assets/js/template/" . $file_name . ".js") . "' defer></script>";
    }
    
    public function do_hide_cart() {
        $this->hide_cart = true;
    }

    public function view($file, $data){
        $data["additional_css"] = $this->additional_css;
        $data["additional_js"] = $this->additional_js;
        $data["header_additional_class"] = $this->header_additional_class;
        $data["header_menu"] = $this->header_menu;
        $data["hide_cart"] = $this->hide_cart;
        $data["page_name"] = $file;
        $data["is_logged_in"] = $this->is_logged_in();
        if (!$data["is_logged_in"]) {
            if (!$this->input->cookie("temp_user", true)) {
                $temp_user_id = $this->General_model->add_temp_user();
                /*$cookie = array(
                    "name" => "temp_user",
                    "value" => $temp_user_id,
                    "expire" => "86400000"
                );*/
                setcookie("temp_user", $temp_user_id, time() + 86400000, '/', "lancarmotor.dnp-project.com", true, true);
                /*$cookie = array(
                    "name" => "temp_user",
                    "value" => $temp_user_id,
                    "expire" => "86400000",
                    "secure" => TRUE,
                    "domain" => "lancarmotor.dnp-project.com",
                    "path" => "/"
                );*/
                //$this->input->set_cookie($cookie);
            }
        }
		
        $this->load->view('common/header', $data);
        $this->load->view($file, $data);
        $this->load->view('common/footer');
    }

    public function adminview($file, $data){
        $data["additional_css"] = $this->additional_css;
        $data["additional_js"] = $this->additional_js;
		$data["page_name"] = $file;
		
        $this->load->view('common/adminheader', $data);
        $this->load->view($file, $data);
        $this->load->view('common/adminfooter');
    }

	public function redirect_if_not_logged_in($redirect) {
        if (!$this->session->userdata('user_id', true)) {
            redirect(base_url("login" . $redirect));
        }
    }

    public function redirect_if_not_admin() {
        if (!$this->session->userdata('admin_id', true)) {
            redirect(base_url("admin_login"));
        }
    }

    public function get_temp_user() {
        return $this->input->cookie("temp_user", true);
    }
    
    public function is_logged_in() {
        return $this->session->userdata('user_id', true);
    }

    public function is_admin_logged_in() {
        return $this->session->userdata('admin_id', true);
    }
    
    function show_404_if_not_ajax() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
            return true;
        } else {
            show_404();
        }
    }

    public function get_default_email_config() {
        $config["protocol"] = "smtp";
		$config["smtp_host"] = "lancarmotor.dnp-project.com";
		$config["smtp_user"] = "admin@lancarmotor.dnp-project.com";
        $config["smtp_pass"] = "admin";
		$config["smtp_port"] = 465;
        $config["smtp_crypto"] = "ssl";
        $config["mailtype"] = "html";
        return $config;
    }

    public function upload_file_settings($path = '', $max_size = '', $file_name = "") {
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['max_size'] = $max_size;
        $config['remove_spaces'] = true;
        $config['overwrite'] = true;
        $config['encrypt_name'] = false;
        $config['max_width'] = '';
        $config['max_height'] = '';
        if ($file_name != "") {
            $config["file_name"] = $file_name;
        }
        $this->load->library('upload', $config);
    }

    public function set_admin_menu_active($menu) {
        $this->admin_menu_active[$menu] = " active";
        return $this->admin_menu_active;
    }
}