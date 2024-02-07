<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form_model extends CI_Model {

    public function getDataForm() {
        $query = $this->db->get('t_details');
    
        return $query->result();
    }

    public function insertDataForm($data) {
        $this->db->insert('t_details', $data);


    }
}