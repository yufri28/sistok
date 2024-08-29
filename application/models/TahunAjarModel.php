<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjarModel extends CI_Model {

    public function getAll() {
        return $this->db->get('tahun_ajar')->result_array();
    }
    
    public function getById($id) {
        $this->db->where('id_ta', $id);
        $query = $this->db->get('tahun_ajar');
        return $query->result_array();
    }

    public function getByKode($kode) {
        $this->db->where('kode_ta', $kode);
        $query = $this->db->get('tahun_ajar');
        return $query->result_array();
    }

    public function getByIdKode($id, $kode) {
        $this->db->where('id_ta', $id);
        $this->db->where('kode_ta !=', $kode);
        $query = $this->db->get('tahun_ajar');
        return $query->result_array();
    }

    public function add($data) {
       $insert = $this->db->insert('tahun_ajar', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_ta', $id);
        return $this->db->update('tahun_ajar', $data);
    }

    public function delete($id) {
        $this->db->where('id_ta', $id);
        return $this->db->delete('tahun_ajar');
    }
}