<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Admin extends General_controller {
	public function __construct() {
        parent::__construct();
        parent::redirect_if_not_admin();
		$this->load->model("Admin_model");
	}
	
	public function index()
	{
        $data = array(
			"title" => "Admin &mdash; Home",
			"menu_active" => parent::set_admin_menu_active("home"),
            "menu_title" => "Home"
		);
		
		parent::adminview("admin", $data);
    }

    public function master_satuan() {
        $data = array(
			"title" => "Admin &mdash; Master Satuan",
			"menu_active" => parent::set_admin_menu_active("master_satuan"),
            "menu_title" => "Master Satuan"
		);
		
		parent::adminview("admin_master_satuan", $data);
    }

    public function master_kategori() {
        $data = array(
			"title" => "Admin &mdash; Master Kategori",
			"menu_active" => parent::set_admin_menu_active("master_kategori"),
            "menu_title" => "Master Kategori"
		);
		
		parent::adminview("admin_master_kategori", $data);
    }

    public function master_barang() {
        $data = array(
			"title" => "Admin &mdash; Master Barang",
			"menu_active" => parent::set_admin_menu_active("master_barang"),
            "menu_title" => "Master Barang"
		);
		
		parent::adminview("admin_master_barang", $data);
    }

    public function konfirmasi_pembayaran() {
        $data = array(
			"title" => "Admin &mdash; Konfirmasi Pembayaran",
			"menu_active" => parent::set_admin_menu_active("konfirmasi_pembayaran"),
            "menu_title" => "Konfirmasi Pembayaran"
		);
		
		parent::adminview("admin_konfirmasi_pembayaran", $data);
    }

    public function update_status_pesanan() {
        $data = array(
			"title" => "Admin &mdash; Update Status Pesanan",
			"menu_active" => parent::set_admin_menu_active("update_status_pesanan"),
            "menu_title" => "Update Status Pesanan"
		);
		
		parent::adminview("admin_update_status_pesanan", $data);
    }

    public function laporan() {
        $data = array(
			"title" => "Admin &mdash; Laporan",
			"menu_active" => parent::set_admin_menu_active("laporan"),
            "menu_title" => "Laporan"
		);
		
		parent::adminview("admin_update_status_pesanan", $data);
    }
    
    public function settings()
	{
		$data = array(
            "title" => "Admin &mdash; Settings",
            "menu_active" => parent::set_admin_menu_active("about_us"),
			"menu_title" => "Settings"
		);
		
		parent::adminview("admin_settings", $data);
    }
    
    public function do_change_password() {
        $oldPassword = $this->input->post("old-password", true);
		$newPassword = $this->input->post("new-password", true);

		$stored_password = $this->Admin_model->get_password()->admin_password;
		if (password_verify($oldPassword, $stored_password)) {
			$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
			$this->Admin_model->update_password($newPassword);
			$this->session->set_flashdata("success_message", "Sukses ganti password");
			redirect(base_url("admin/settings"));
		} else {
			$this->session->set_flashdata("error_message", "Password lama salah");
			redirect(base_url("admin/settings"));
		}
    }
}
