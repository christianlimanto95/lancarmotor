<?php

class Register_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function do_register($data) {
        $query = $this->db->query("
            SELECT user_email
            FROM user
            WHERE user_email = '" . $data["user_email"] . "' AND status = '2'
            LIMIT 1
        ");
        $email = $query->result();
        if (sizeof($email) > 0) {
            return array(
                "status" => "error",
                "message" => "duplicate_email"
            );
        } else {
            $this->db->trans_start();

            $data["user_password"] = password_hash($data["user_password"], PASSWORD_DEFAULT);
            $insertData = array(
                "user_password" => $data["user_password"],
                "user_email" => $data["user_email"],
                "user_name" => $data["user_name"],
                "user_handphone" => $data["user_handphone"]
            );
            $this->db->insert("user", $insertData);
            $user_id = $this->db->insert_id();

            $verification_token = $this->random_str(60);

            $insertVerification = array(
                "user_id" => $user_id,
                "user_email" => $data["user_email"],
                "verification_token" => $verification_token,
                "verification_status" => 1
            );
            $this->db->insert("verification", $insertVerification);

            $this->db->trans_complete();
            return array(
                "status" => "success",
                "user_email" => $data["user_email"],
                "verification_token" => $verification_token
            );
        }
    }

    public function verify_email($verification_token) {
        $query = $this->db->query("
            SELECT user_id
            FROM verification
            WHERE verification_token = '" . $verification_token . "' AND verification_status = 1
            LIMIT 1
        ");
        $result = $query->result();
        if (sizeof($result) > 0) {
            $this->db->trans_start();
            $result = $result[0];
            
            $this->db->where("user_id", $result->user_id);
            $this->db->set("verification_status", 0, false);
            $this->db->set("modified_date", "NOW()", false);
            $this->db->update("verification");

            $this->db->where("user_id", $result->user_id);
            $this->db->set("status", 2, false);
            $this->db->set("modified_date", "NOW()", false);
            $this->db->update("user");

            $this->db->trans_complete();
            return true;
        } else {
            return false;
        }
    }

    function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyz') {
		$str = '';
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$str .= $keyspace[mt_rand(0, $max)];
		}
		return $str;
    }
}
