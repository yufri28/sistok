<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitModel extends CI_Model {

    public function getAll() {
        return $this->db->get('unit')->result_array();
    }
    
    public function getById($id) {
        $this->db->where('id_unit', $id);
        $query = $this->db->get('unit');
        return $query->result_array();
    }

    public function getByKode($kode) {
        $this->db->where('kode_unit', $kode);
        $query = $this->db->get('unit');
        return $query->result_array();
    }

    public function getByIdKode($id, $kode) {
        $this->db->where('id_unit', $id);
        $this->db->where('kode_unit !=', $kode);
        $query = $this->db->get('unit');
        return $query->result_array();
    }

    public function add($data) {
       $insert = $this->db->insert('unit', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_unit', $id);
        return $this->db->update('unit', $data);
    }

    public function delete($id) {
        $this->db->where('id_unit', $id);
        return $this->db->delete('unit');
    }
}