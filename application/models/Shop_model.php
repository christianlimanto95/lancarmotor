<?php

class Shop_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_brands() {
        $this->db->where("status", 1);
        $this->db->order_by("brand_name", "asc");
        return $this->db->get("brand")->result();
    }

    public function get_categories() {
        $this->db->where("status", 1);
        $this->db->order_by("category_name", "asc");
        return $this->db->get("category")->result();
    }

    public function get_items() {
        $this->db->select("item_id, item_name, item_image_extension, item_price, modified_date");
        $this->db->where("status", 1);
        return $this->db->get("item")->result();
    }

    public function get_item_by_id($id) {
        $query = $this->db->query("
            SELECT *
            FROM item
            WHERE item_id = '" . $id . "'
            LIMIT 1
        ");
        return $query->result();
    }
}
