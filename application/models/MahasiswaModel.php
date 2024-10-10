<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaModel extends CI_Model {

    public function getAll() {
        $this->db->select('mahasiswa.*, prodi.id_prodi, prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.fk_prodi', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getById($id) {
        $this->db->select('mahasiswa.*, prodi.id_prodi, prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.fk_prodi', 'inner');
        $this->db->where('mahasiswa.fk_prodi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByIdMhs($id) {
        $this->db->select('mahasiswa.*, prodi.id_prodi, prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.fk_prodi', 'inner');
        $this->db->where('mahasiswa.id_mahasiswa', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByNim($nim) {
        $this->db->where('nim', $nim);
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function getByIdNim($id, $nim) {
        $this->db->where('id_mahasiswa', $id);
        $this->db->where('nim !=', $nim);
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function add($data) {
       $insert = $this->db->insert('mahasiswa', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_mahasiswa', $id);
        return $this->db->update('mahasiswa', $data);
    }

    public function delete($id) {
        $this->db->where('id_mahasiswa', $id);
        return $this->db->delete('mahasiswa');
    }
}