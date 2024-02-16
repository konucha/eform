<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    // Load data user
    public function getDataUser() {
        $query = $this->db->get('t_users');
    
        return $query->result();

    }

    // Insert data user
    public function insertDataUser($data) {
        $this->db->insert('t_users', $data);

    }
}