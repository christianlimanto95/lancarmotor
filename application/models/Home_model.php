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
}
