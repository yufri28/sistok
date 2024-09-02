<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UkuranModel extends CI_Model {

    public function getAll() {
        return $this->db->get('ukuran')->result_array();
    }
    
    public function getById($id) {
        $this->db->where('id_ukuran', $id);
        $query = $this->db->get('ukuran');
        return $query->result_array();
    }

    public function getByName($nama_ukuran)
    {
        $this->db->where('nama_ukuran', $nama_ukuran);
        $query = $this->db->get('ukuran');
        return $query->row();
    }

    public function add($data) {
       $insert = $this->db->insert('ukuran', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_ukuran', $id);
        return $this->db->update('ukuran', $data);
    }

    public function delete($id) {
        $this->db->where('id_ukuran', $id);
        return $this->db->delete('ukuran');
    }
}