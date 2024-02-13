<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    public function getDataUser() {
        $query = $this->db->get('t_users');
    
        return $query->result();
    }

    public function insertDataUser($data) {
        $this->db->insert('t_users', $data);


    }
}