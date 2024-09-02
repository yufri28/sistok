<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FakultasModel extends CI_Model {

    public function getAll() {
        return $this->db->get('fakultas')->result_array();
    }
    
    public function getById($id) {
        $this->db->where('id_fakultas', $id);
        $query = $this->db->get('fakultas');
        return $query->result_array();
    }

    public function getByKode($kode) {
        $this->db->where('kode_fakultas', $kode);
        $query = $this->db->get('fakultas');
        return $query->result_array();
    }

    public function getByIdKode($id, $kode) {
        $this->db->where('id_fakultas', $id);
        $this->db->where('kode_fakultas !=', $kode);
        $query = $this->db->get('fakultas');
        return $query->result_array();
    }

    public function add($data) {
       $insert = $this->db->insert('fakultas', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_fakultas', $id);
        return $this->db->update('fakultas', $data);
    }

    public function delete($id) {
        $this->db->where('id_fakultas', $id);
        return $this->db->delete('fakultas');
    }
}