<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_brands() {
        $this->db->where("status", 1);
        $this->db->limit(5);
        return $this->db->get("brand")->result();
    }

    public function get_categories() {
        $this->db->where("status", 1);
        $this->db->limit(24);
        return $this->db->get("category")->result();
    }

    public function get_items() {
        $this->db->select("item_id, item_name, item_image_extension, item_price, modified_date");
        $this->db->where("status", 1);
        $this->db->limit(7);
        return $this->db->get("item")->result();
    }
}
