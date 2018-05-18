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

    public function delete_satuan($data) {
        $this->db->where("satuan_id", $data["satuan_id"]);
        $this->db->set("status", 0);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("modified_by", $data["user_id"]);
        $this->db->update("satuan");
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
