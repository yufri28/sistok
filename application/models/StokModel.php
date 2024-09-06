<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokModel extends CI_Model {

    public function getAllMahasiswa() {
        $this->db->select('stok_mahasiswa.*, typestok.nama_typestok, prodi.nama_prodi, ukuran.nama_ukuran');
        $this->db->from('stok_mahasiswa');
        $this->db->join('typestok', 'typestok.id_typestok = stok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('prodi', 'prodi.id_prodi = stok_mahasiswa.fk_prodi', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_mahasiswa.fk_ukuran', 'inner');
        $this->db->order_by('stok_mahasiswa.id_stok_mhs', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getByIdMahasiswa($id) {
        $this->db->select('stok_mahasiswa.*, typestok.nama_typestok, prodi.nama_prodi, ukuran.nama_ukuran');
        $this->db->from('stok_mahasiswa');
        $this->db->join('typestok', 'typestok.id_typestok = stok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('prodi', 'prodi.id_prodi = stok_mahasiswa.fk_prodi', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_mahasiswa.fk_ukuran', 'inner');
        $this->db->order_by('stok_mahasiswa.id_stok_mhs', 'DESC');
        $query = $this->db->get();
        return $query->row_array(); // Jika hanya mengharapkan satu baris
    }

    public function delete_mahasiswa($id) {
        $this->db->where('id_stok_mhs', $id);
        return $this->db->delete('stok_mahasiswa');
    }

    public function getAllSiswa() {
        $this->db->select('stok_siswa.*, typestok.nama_typestok, unit.nama_unit, ukuran.nama_ukuran');
        $this->db->from('stok_siswa');
        $this->db->join('typestok', 'typestok.id_typestok = stok_siswa.fk_typestok', 'inner');
        $this->db->join('unit', 'unit.id_unit = stok_siswa.fk_unit', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_siswa.fk_ukuran', 'inner');
        $this->db->order_by('stok_siswa.id_stok_siswa', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getByIdSiswa($id) {
        $this->db->select('stok_siswa.*, typestok.nama_typestok, unit.nama_unit, ukuran.nama_ukuran');
        $this->db->from('stok_siswa');
        $this->db->join('typestok', 'typestok.id_typestok = stok_siswa.fk_typestok', 'inner');
        $this->db->join('unit', 'unit.id_unit = stok_siswa.fk_unit', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_siswa.fk_ukuran', 'inner');
        $this->db->order_by('stok_siswa.id_stok_siswa', 'DESC');
        $query = $this->db->get();
        return $query->row_array(); // Jika hanya mengharapkan satu baris
    }

    public function delete_siswa($id) {
        $this->db->where('id_stok_siswa', $id);
        return $this->db->delete('stok_siswa');
    }
}