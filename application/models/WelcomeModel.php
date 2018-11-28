<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeModel extends CI_Model {

    public function createUserEntry($data){
        
        $email = $data['email'];
        $phone_number = $data['phone_number'];

        $duplicateCheck = $this->db->query("SELECT * FROM tbl_users WHERE email ='$email' OR phone_number ='$phone_number'");
        if ($duplicateCheck->num_rows() == 0)
		{
            $query=$this->db->insert("tbl_users",$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }else{
            return 0;
        }
    }
    
}