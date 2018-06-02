<?php

class General_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_temp_user() {
        $this->db->trans_start();

        $insertData = array(
            "status" => 1
        );
        $this->db->insert("temp_user", $insertData);
        $temp_user_id = $this->db->insert_id();

        $insertData = array(
            "temp_user_id" => $temp_user_id
        );
        $this->db->insert("temp_hcart", $insertData);

        $this->db->trans_complete();
        return $temp_user_id;
    }
}
