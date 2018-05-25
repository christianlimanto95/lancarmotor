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
                "table_name" => "satuan",
                "id" => $satuan_id,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->delete_from_table($data);
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

    public function master_brand() {
        $data = array(
			"title" => "Admin &mdash; Master Brand",
			"menu_active" => parent::set_admin_menu_active("master_brand"),
            "menu_title" => "Master Brand"
		);
		
		parent::adminview("admin_master_brand", $data);
    }

    function brand_get() {
        parent::show_404_if_not_ajax();
        $brand = $this->Admin_model->get_brand();
        echo json_encode(array(
            "status" => "success",
            "data" => $brand
        ));
    }

    function brand_insert() {
        parent::show_404_if_not_ajax();

        $brand_name = trim($this->input->post("brand_name"));
        
        if ($brand_name != "") {
            $brand_image = $this->input->post("brand_image");
            $brand_image_extension = "";
            if ($brand_image != "") {
                if (preg_match('/^data:image\/(\w+);base64,/', $brand_image, $type)) {
                    $type = strtolower($type[1]); // jpg, png, gif
                    $brand_image_extension = $type;
                }
            }

            $data = array(
                "brand_name" => $brand_name,
                "brand_image_extension" => $brand_image_extension,
                "user_id" => parent::is_admin_logged_in()
            );

            $result = $this->Admin_model->insert_brand($data);
            if ($result["affected_rows"] > 0) {
                if (preg_match('/^data:image\/(\w+);base64,/', $brand_image, $type)) {
                    $data = substr($brand_image, strpos($brand_image, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif
                
                    $data = base64_decode($data);
                    file_put_contents("assets/images/brands/brands_" . $result["id"] . "." . $type, $data);
                }

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

    function brand_delete() {
        parent::show_404_if_not_ajax();

        $brand_id = $this->input->post("brand_id", true);
        
        if ($brand_id) {
            $data = array(
                "table_name" => "brand",
                "id" => $brand_id,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->delete_from_table($data);
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

    function master_brand_edit() {
        $id = $this->uri->segment(3);
        $detail = $this->Admin_model->get_brand_by_id($id);
        if (sizeof($detail) > 0) {
            $detail = $detail[0];
            $data = array(
                "title" => "Admin &mdash; Master Brand Edit",
                "menu_active" => parent::set_admin_menu_active("master_brand"),
                "menu_title" => "Master Brand > Edit Brand " . $detail->brand_name,
                "data" => $detail
            );
            
            parent::adminview("admin_master_brand_edit", $data);
        } else {
            redirect(base_url("admin/master_satuan"));
        }
    }

    function brand_update() {
        parent::show_404_if_not_ajax();

        $brand_id = $this->input->post("brand_id", true);
        $brand_name = trim($this->input->post("brand_name"));
        
        if ($brand_id && $brand_name != "") {
            $brand_image = $this->input->post("brand_image");
            $brand_image_extension = "";
            if ($brand_image != "") {
                if (preg_match('/^data:image\/(\w+);base64,/', $brand_image, $type)) {
                    $type = strtolower($type[1]); // jpg, png, gif
                    $brand_image_extension = $type;
                }
            }

            $data = array(
                "brand_id" => $brand_id,
                "brand_name" => $brand_name,
                "brand_image_extension" => $brand_image_extension,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->update_brand($data);
            if ($affected_rows > 0) {
                if (preg_match('/^data:image\/(\w+);base64,/', $brand_image, $type)) {
                    $data = substr($brand_image, strpos($brand_image, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif
                
                    $data = base64_decode($data);
                    file_put_contents("assets/images/brands/brands_" . $brand_id . "." . $type, $data);
                }

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

    function category_get() {
        parent::show_404_if_not_ajax();
        $category = $this->Admin_model->get_category();
        echo json_encode(array(
            "status" => "success",
            "data" => $category
        ));
    }

    function category_insert() {
        parent::show_404_if_not_ajax();

        $category_name = trim($this->input->post("category_name"));
        
        if ($category_name != "") {
            $data = array(
                "category_name" => $category_name,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->insert_category($data);
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

    function category_delete() {
        parent::show_404_if_not_ajax();

        $category_id = $this->input->post("category_id", true);
        
        if ($category_id) {
            $data = array(
                "table_name" => "category",
                "id" => $category_id,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->delete_from_table($data);
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

    function master_category_edit() {
        $id = $this->uri->segment(3);
        $detail = $this->Admin_model->get_category_by_id($id);
        if (sizeof($detail) > 0) {
            $detail = $detail[0];
            $data = array(
                "title" => "Admin &mdash; Master Kategori Edit",
                "menu_active" => parent::set_admin_menu_active("master_kategori"),
                "menu_title" => "Master Kategori > Edit Kategori " . $detail->category_name,
                "data" => $detail
            );
            
            parent::adminview("admin_master_category_edit", $data);
        } else {
            redirect(base_url("admin/master_satuan"));
        }
    }

    function category_update() {
        parent::show_404_if_not_ajax();

        $category_id = $this->input->post("category_id", true);
        $category_name = trim($this->input->post("category_name"));
        
        if ($category_id && $category_name != "") {
            $data = array(
                "category_id" => $category_id,
                "category_name" => $category_name,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->update_category($data);
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

    function item_get() {
        parent::show_404_if_not_ajax();
        $item = $this->Admin_model->get_item();
        echo json_encode(array(
            "status" => "success",
            "data" => $item
        ));
    }

    public function master_barang() {
        $category = $this->Admin_model->get_category();
        $brand = $this->Admin_model->get_brand();
        $satuan = $this->Admin_model->get_satuan();
        $data = array(
			"title" => "Admin &mdash; Master Barang",
			"menu_active" => parent::set_admin_menu_active("master_barang"),
            "menu_title" => "Master Barang",
            "category" => $category,
            "brand" => $brand,
            "satuan" => $satuan
		);
		
		parent::adminview("admin_master_barang", $data);
    }

    function item_insert() {
        parent::show_404_if_not_ajax();

        $category_id = $this->input->post("category_id");
        $brand_id = $this->input->post("brand_id");
        $item_name = trim($this->input->post("item_name"));
        $item_image = $this->input->post("item_image");
        $item_price = $this->input->post("item_price");
        $item_satuan = $this->input->post("item_satuan");
        $item_qty = $this->input->post("item_qty");
        $item_description = $this->input->post("item_description");
        $item_dimensi_satuan = $this->input->post("item_dimensi_satuan");
        $item_panjang = $this->input->post("item_panjang");
        $item_lebar = $this->input->post("item_lebar");
        $item_tinggi = $this->input->post("item_tinggi");
        $item_berat = $this->input->post("item_berat");
        $item_berat_satuan = $this->input->post("item_berat_satuan");
        
        if ($category_id && $brand_id && $item_name != "" && $item_panjang != "" && $item_lebar != "" && $item_tinggi != "" && $item_berat != "") {
            $item_image_extension = "";
            if ($item_image != "") {
                if (preg_match('/^data:image\/(\w+);base64,/', $item_image, $type)) {
                    $type = strtolower($type[1]); // jpg, png, gif
                    $item_image_extension = $type;
                }
            }

            $data = array(
                "category_id" => $category_id,
                "brand_id" => $brand_id,
                "item_name" => $item_name,
                "item_image_extension" => $item_image_extension,
                "item_price" => intval($item_price),
                "item_satuan" => $item_satuan,
                "item_qty" => intval($item_qty),
                "item_description" => $item_description,
                "item_dimensi_satuan" => $item_dimensi_satuan,
                "item_panjang" => intval($item_panjang),
                "item_lebar" => intval($item_lebar),
                "item_tinggi" => intval($item_tinggi),
                "item_berat" => intval($item_berat),
                "item_berat_satuan" => $item_berat_satuan,
                "user_id" => parent::is_admin_logged_in()
            );

            $result = $this->Admin_model->insert_item($data);
            if ($result["affected_rows"] > 0) {
                if (preg_match('/^data:image\/(\w+);base64,/', $item_image, $type)) {
                    $data = substr($item_image, strpos($item_image, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif
                
                    $data = base64_decode($data);
                    file_put_contents("assets/images/item/item_" . $result["id"] . "." . $type, $data);
                }

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

    function item_delete() {
        parent::show_404_if_not_ajax();

        $item_id = $this->input->post("item_id", true);
        
        if ($item_id) {
            $data = array(
                "table_name" => "item",
                "id" => $item_id,
                "user_id" => parent::is_admin_logged_in()
            );

            $affected_rows = $this->Admin_model->delete_from_table($data);
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

    function master_item_edit() {
        $id = $this->uri->segment(3);
        $detail = $this->Admin_model->get_item_by_id($id);
        if (sizeof($detail) > 0) {
            $detail = $detail[0];
            $category = $this->Admin_model->get_category();
            $brand = $this->Admin_model->get_brand();
            $satuan = $this->Admin_model->get_satuan();
            $data = array(
                "title" => "Admin &mdash; Master Barang Edit",
                "menu_active" => parent::set_admin_menu_active("master_barang"),
                "menu_title" => "Master Barang > Edit Barang " . $detail->item_name,
                "data" => $detail,
                "category" => $category,
                "brand" => $brand,
                "satuan" => $satuan
            );
            
            parent::adminview("admin_master_barang_edit", $data);
        } else {
            redirect(base_url("admin/master_satuan"));
        }
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
