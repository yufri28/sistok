<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdiModel extends CI_Model {

    public function getAll() {
        $this->db->select('prodi.*, fakultas.id_fakultas, fakultas.nama_fakultas');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.id_fakultas = prodi.fk_fakultas', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getById($id) {
        $this->db->select('prodi.*, fakultas.id_fakultas, fakultas.nama_fakultas');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.id_fakultas = prodi.fk_fakultas', 'inner');
        $this->db->where('prodi.id_prodi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByKode($kode) {
        $this->db->where('kode_prodi', $kode);
        $query = $this->db->get('prodi');
        return $query->result_array();
    }

    public function getByIdKode($id, $kode) {
        $this->db->where('id_prodi', $id);
        $this->db->where('kode_prodi !=', $kode);
        $query = $this->db->get('prodi');
        return $query->result_array();
    }

    public function add($data) {
       $insert = $this->db->insert('prodi', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_prodi', $id);
        return $this->db->update('prodi', $data);
    }

    public function delete($id) {
        $this->db->where('id_prodi', $id);
        return $this->db->delete('prodi');
    }
}