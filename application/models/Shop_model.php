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

    public function get_items_query($data) {
        $where_brand = "";
        if ($data["brand"] != "") {
            $where_brand = " AND (";
            $where_brand_detail = "";
            $brand = explode(",", $data["brand"]);
            $iLength = sizeof($brand);
            for ($i = 0; $i < $iLength; $i++) {
                if ($where_brand_detail != "") {
                    $where_brand_detail .= " OR ";
                }
                $where_brand_detail .= "brand_id = '" . $brand[$i] . "'";
            }
            $where_brand .= $where_brand_detail . ")";
        }

        $where_category = "";
        if ($data["category"] != "") {
            $where_category = " AND (";
            $where_category_detail = "";
            $category = explode(",", $data["category"]);
            $iLength = sizeof($category);
            for ($i = 0; $i < $iLength; $i++) {
                if ($where_category_detail != "") {
                    $where_category_detail .= " OR ";
                }
                $where_category_detail .= "category_id = '" . $category[$i] . "'";
            }
            $where_category .= $where_category_detail . ")";
        }

        $query = $this->db->query("
            SELECT item_id, item_name, item_image_extension, item_price, modified_date
            FROM item
            WHERE status = 1" . $where_brand . $where_category . "
        ");
        return $query->result();
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
