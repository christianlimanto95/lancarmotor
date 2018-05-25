<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_satuan() {
        $this->db->select("satuan_id, satuan_nama, satuan_type");
        $this->db->where("status", 1);
        return $this->db->get("satuan")->result();
    }

    public function get_satuan_by_id($satuan_id) {
        $this->db->where("satuan_id", $satuan_id);
        $this->db->where("status", 1);
        $this->db->limit(1);
        return $this->db->get("satuan")->result();
    }

    public function insert_satuan($data)  {
        $insertData = array(
            "satuan_nama" => $data["satuan_nama"],
            "satuan_type" => $data["satuan_type"],
            "created_by" => $data["user_id"],
            "modified_by" => $data["user_id"]
        );
        $this->db->insert("satuan", $insertData);
        return $this->db->affected_rows();
    }

    public function update_satuan($data) {
        $this->db->where("satuan_id", $data["satuan_id"]);
        $this->db->set("satuan_nama", $data["satuan_nama"]);
        $this->db->set("satuan_type", $data["satuan_type"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("modified_by", $data["user_id"]);
        $this->db->update("satuan");
        return $this->db->affected_rows();
    }

    public function get_brand() {
        $this->db->select("brand_id, brand_name, brand_image_extension, modified_date");
        $this->db->where("status", 1);
        return $this->db->get("brand")->result();
    }

    public function get_brand_by_id($brand_id) {
        $this->db->where("brand_id", $brand_id);
        $this->db->where("status", 1);
        $this->db->limit(1);
        return $this->db->get("brand")->result();
    }

    public function insert_brand($data)  {
        $insertData = array(
            "brand_name" => $data["brand_name"],
            "brand_image_extension" => $data["brand_image_extension"],
            "created_by" => $data["user_id"],
            "modified_by" => $data["user_id"]
        );
        $this->db->insert("brand", $insertData);
        $id = $this->db->insert_id();
        return array(
            "affected_rows" => $this->db->affected_rows(),
            "id" => $id
        );
    }

    public function update_brand($data) {
        $this->db->where("brand_id", $data["brand_id"]);
        $this->db->set("brand_name", $data["brand_name"]);
        $this->db->set("brand_image_extension", $data["brand_image_extension"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("modified_by", $data["user_id"]);
        $this->db->update("brand");
        return $this->db->affected_rows();
    }

    public function get_category() {
        $this->db->select("category_id, category_name");
        $this->db->where("status", 1);
        return $this->db->get("category")->result();
    }

    public function get_category_by_id($category_id) {
        $this->db->where("category_id", $category_id);
        $this->db->where("status", 1);
        $this->db->limit(1);
        return $this->db->get("category")->result();
    }

    public function insert_category($data)  {
        $insertData = array(
            "category_name" => $data["category_name"],
            "created_by" => $data["user_id"],
            "modified_by" => $data["user_id"]
        );
        $this->db->insert("category", $insertData);
        return $this->db->affected_rows();
    }

    public function update_category($data) {
        $this->db->where("category_id", $data["category_id"]);
        $this->db->set("category_name", $data["category_name"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("modified_by", $data["user_id"]);
        $this->db->update("category");
        return $this->db->affected_rows();
    }

    public function delete_from_table($data) {
        $this->db->where($data["table_name"] . "_id", $data["id"]);
        $this->db->set("status", 0);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("modified_by", $data["user_id"]);
        $this->db->update($data["table_name"]);
        return $this->db->affected_rows();
    }

    public function get_password() {
        $this->db->select("admin_password");
        return $this->db->get("admin")->result()[0];
    }

    public function update_password($password) {
        $this->db->set("admin_password", $password);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("admin");
    }
}
