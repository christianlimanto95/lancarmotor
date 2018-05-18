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

    function satuan_get() {
        parent::show_404_if_not_ajax();
        $satuan = $this->Admin_model->get_satuan();
        echo json_encode(array(
            "status" => "success",
            "data" => $satuan
        ));
    }

    function satuan_insert() {
        parent::show_404_if_not_ajax();

        $satuan_nama = trim($this->input->post("satuan_nama"));
        $satuan_type = $this->input->post("satuan_type");
        
        if ($satuan_nama != "" && $satuan_type != "") {
            $data = array(
                "satuan_nama" => $satuan_nama,
                "satuan_type" => $satuan_type,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->insert_satuan($data);
            if ($affected_rows > 0) {
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
    }

    function master_satuan_edit() {
        $id = $this->uri->segment(3);
        $detail = $this->Admin_model->get_satuan_by_id($id);
        if (sizeof($detail) > 0) {
            $detail = $detail[0];
            $data = array(
                "title" => "Admin &mdash; Master Satuan Edit",
                "menu_active" => parent::set_admin_menu_active("master_satuan"),
                "menu_title" => "Master Satuan > Edit Satuan " . $detail->satuan_nama,
                "data" => $detail
            );
            
            parent::adminview("admin_master_satuan_edit", $data);
        } else {
            redirect(base_url("admin/master_satuan"));
        }
    }

    function satuan_update() {
        parent::show_404_if_not_ajax();

        $satuan_id = $this->input->post("satuan_id", true);
        $satuan_nama = trim($this->input->post("satuan_nama"));
        $satuan_type = $this->input->post("satuan_type");
        
        if ($satuan_id && $satuan_nama != "" && $satuan_type != "") {
            $data = array(
                "satuan_id" => $satuan_id,
                "satuan_nama" => $satuan_nama,
                "satuan_type" => $satuan_type,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->update_satuan($data);
            if ($affected_rows > 0) {
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
    }

    function satuan_delete() {
        parent::show_404_if_not_ajax();

        $satuan_id = $this->input->post("satuan_id", true);
        
        if ($satuan_id) {
            $data = array(
                "satuan_id" => $satuan_id,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->delete_satuan($data);
            if ($affected_rows > 0) {
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
