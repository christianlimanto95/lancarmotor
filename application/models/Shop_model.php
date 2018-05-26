<?php

class Shop_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_items() {
        $this->db->select("item_id, item_name, item_image_extension, item_price, modified_date");
        $this->db->where("status", 1);
        return $this->db->get("item")->result();
    }
}
