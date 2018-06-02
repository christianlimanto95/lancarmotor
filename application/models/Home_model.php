<?php

class Home_model extends CI_Model
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

    public function add_to_cart($data) {
        $query = $this->db->query("
            SELECT item_name, item_satuan, item_price
            FROM item
            WHERE item_id = '" . $data["item_id"] . "'
            LIMIT 1
        ");
        $item = $query->result();
        if (sizeof($item) > 0) {
            $item = $item[0];
            $item_subtotal = intval($data["item_qty"]) * intval($item->item_price);

            $query = $this->db->query("
                SELECT hcart_id
                FROM hcart
                WHERE user_id = '" . $data["user_id"] . "'
                LIMIT 1
            ");
            $hcart = $query->result();
            $hcart_id = $hcart[0]->hcart_id;

            $this->db->trans_start();

            $query = $this->db->query("
                SELECT d.dcart_id, d.item_qty
                FROM dcart d, hcart h
                WHERE h.user_id = '" . $data["user_id"] . "' AND h.hcart_id = d.hcart_id AND d.item_id = '" . $data["item_id"] . "'
                LIMIT 1
            ");
            $dcart = $query->result();
            if (sizeof($dcart) > 0) {
                $dcart_id = $dcart[0]->dcart_id;
                $current_qty = $dcart[0]->item_qty;
                $dcart_subtotal = (intval($current_qty) + intval($data["item_qty"])) * intval($item->item_price);

                $this->db->where("dcart_id", $dcart_id);
                $this->db->set("item_qty", "item_qty + " . $data["item_qty"], false);
                $this->db->set("item_price", $item->item_price);
                $this->db->set("dcart_subtotal", $dcart_subtotal);
                $this->db->set("modified_date", "NOW()", false);
                $this->db->update("dcart");
            } else {
                $insertData = array(
                    "hcart_id" => $hcart_id,
                    "item_id" => $data["item_id"],
                    "item_name" => $item->item_name,
                    "item_satuan" => $item->item_satuan,
                    "item_price" => $item->item_price,
                    "item_qty" => $data["item_qty"],
                    "dcart_subtotal" => $item_subtotal
                );
                $this->db->insert("dcart", $insertData);
            }

            $this->db->where("hcart_id", $hcart_id);
            $this->db->set("hcart_total_price", "hcart_total_price + " . $item_subtotal, false);
            $this->db->set("hcart_total_qty", "hcart_total_qty + " . $data["item_qty"], false);
            $this->db->set("modified_date", "NOW()", false);
            $this->db->update("hcart");

            $this->db->trans_complete();

            return true;
        } else {
            return false;
        }
    }

    public function delete_from_cart($data) {
        if ($data["dcart_id"] != "") {
            $this->db->trans_start();

            $query = $this->db->query("
                SELECT item_qty, dcart_subtotal
                FROM dcart
                WHERE dcart_id = '" . $data["dcart_id"] . "'
                LIMIT 1
            ");
            $dcart = $query->result();
            if (sizeof($dcart) > 0) {
                $dcart = $dcart[0];
                $qty = $dcart->item_qty;
                $subtotal = $dcart->dcart_subtotal;

                $this->db->where("dcart_id", $data["dcart_id"]);
                $this->db->delete("dcart");

                $this->db->where("user_id", $data["user_id"]);
                $this->db->set("hcart_total_qty", "hcart_total_qty - " . $qty, false);
                $this->db->set("hcart_total_price", "hcart_total_price - " . $subtotal, false);
                $this->db->set("modified_date", "NOW()", false);
                $this->db->update("hcart");

                $this->db->trans_complete();
                return true;
            }
        }
        return false;
    }

    public function get_data($email) {
        $this->db->where("user_email", $email);
        $this->db->select("user_id, user_password, status");
        $this->db->limit(1);
        return $this->db->get("user")->result();
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
        $this->db->select("item_id, item_name, item_image_extension, item_price, item_satuan, modified_date");
        $this->db->where("status", 1);
        $this->db->limit(7);
        return $this->db->get("item")->result();
    }
}
