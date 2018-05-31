<?php

class Checkout_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_cart($user_id) {
        $query = $this->db->query("
            SELECT h.hcart_total_price, h.hcart_total_qty, d.dcart_id, d.hcart_id, d.item_id, d.item_name, d.item_satuan, d.item_price, d.item_qty, d.dcart_subtotal, d.dcart_notes, i.item_image_extension, i.modified_date
            FROM hcart h, dcart d, item i
            WHERE h.user_id = '" . $user_id . "' AND h.hcart_id = d.hcart_id AND d.item_id = i.item_id
        ");
        return $query->result();
    }
}
