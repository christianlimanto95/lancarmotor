<?php

class General_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_cart($user_id) {
        $query = $this->db->query("
            SELECT h.hcart_total_price, h.hcart_total_qty, d.*
            FROM hcart h, dcart d
            WHERE h.user_id = '" . $user_id . "' AND h.hcart_id = d.hcart_id
        ");
        return $query->result();
    }
}
