<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form_model extends CI_Model {

    private $_table = "t_details";

    // Load data
    public function getDataForm() {
        $this->db->order_by('id');    
        $query = $this->db->get('t_details');
    
        return $query->result();
    }

    // Create data
    public function insertDataForm($data) {
        $this->db->insert('t_details', $data);

    }

    // Edit Data
    public function getDataFormEdit($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('t_details');

        return $query->row();
    }

    public function editDataForm($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('t_details', $data);
    }

    // Hapus data
    public function hapusDataForm($id) {
        $this->db->where('id', $id);
        $this->db->delete('t_details');

    }

}