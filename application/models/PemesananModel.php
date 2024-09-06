<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemesananModel extends CI_Model {

    public function getAllMahasiswa() {
        $this->db->select('restok_mahasiswa.*, typestok.nama_typestok, prodi.nama_prodi, ukuran.nama_ukuran');
        $this->db->from('restok_mahasiswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('prodi', 'prodi.id_prodi = restok_mahasiswa.fk_prodi', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_mahasiswa.fk_ukuran', 'inner');
        $this->db->where('restok_mahasiswa.status', 'PEM1');
        $this->db->or_where('restok_mahasiswa.status', 'Selesai');
        $this->db->order_by('restok_mahasiswa.id_restok', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getByIdMahasiswa($id) {
        $this->db->select('restok_mahasiswa.*, typestok.nama_typestok, prodi.nama_prodi, ukuran.nama_ukuran');
        $this->db->from('restok_mahasiswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('prodi', 'prodi.id_prodi = restok_mahasiswa.fk_prodi', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_mahasiswa.fk_ukuran', 'inner');
        $this->db->where('restok_mahasiswa.id_restok', $id);
        $this->db->where('restok_mahasiswa.status', 'PEM1');
        $this->db->order_by('restok_mahasiswa.id_restok', 'DESC');
        $query = $this->db->get();
        return $query->row_array(); // Jika hanya mengharapkan satu baris
    }

    public function cekByFk($fk_typestok, $fk_prodi, $fk_ukuran) {
        $this->db->select('stok_mahasiswa.*');
        $this->db->from('stok_mahasiswa');
        $this->db->where('stok_mahasiswa.fk_typestok', $fk_typestok);
        $this->db->where('stok_mahasiswa.fk_prodi', $fk_prodi);
        $this->db->where('stok_mahasiswa.fk_ukuran', $fk_ukuran);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris
    }

    public function cekRestok($fk_typestok, $fk_prodi, $fk_ukuran)
    {
        $this->db->select('restok_mahasiswa.*, typestok.nama_typestok, prodi.nama_prodi, ukuran.nama_ukuran');
        $this->db->from('restok_mahasiswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('prodi', 'prodi.id_prodi = restok_mahasiswa.fk_prodi', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_mahasiswa.fk_ukuran', 'inner');
        $this->db->where('restok_mahasiswa.fk_typestok', $fk_typestok);
        $this->db->where('restok_mahasiswa.fk_prodi', $fk_prodi);
        $this->db->where('restok_mahasiswa.fk_ukuran', $fk_ukuran);
        $this->db->group_start(); // Memulai grup kondisi untuk OR
        $this->db->where('restok_mahasiswa.status', 'PER0');
        $this->db->or_where('restok_mahasiswa.status', 'PER1');
        $this->db->group_end(); // Menutup grup kondisi
        $query = $this->db->get();
        return $query->row();
    }

    public function add_mahasiswa($data) {
        $insert = $this->db->insert('stok_mahasiswa', $data);
        return $insert;
    }
    
    public function update_mahasiswa($id, $data) {
        // Pisahkan data untuk increment jumlah_stok dari data lain
        if (isset($data['jumlah_stok'])) {
            $this->db->set('jumlah_stok', 'jumlah_stok + ' . (int)$data['jumlah_stok'], FALSE);
            unset($data['jumlah_stok']);
        }
    
        // Update data lainnya
        $this->db->where('id_stok_mhs', $id); // Pastikan menggunakan kolom yang benar
        return $this->db->update('stok_mahasiswa', $data);
    }
    

    public function delete_mahasiswa($id) {
        $this->db->where('id_restok', $id);
        return $this->db->delete('restok_mahasiswa');
    }

    // ======================= Siswa ====================================
    public function getAllSiswa() {
        $this->db->select('restok_siswa.*, typestok.nama_typestok, unit.nama_unit, ukuran.nama_ukuran');
        $this->db->from('restok_siswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_siswa.fk_typestok', 'inner');
        $this->db->join('unit', 'unit.id_unit = restok_siswa.fk_unit', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_siswa.fk_ukuran', 'inner');
        $this->db->where('restok_siswa.status', 'PEM1');
        $this->db->or_where('restok_siswa.status', 'Selesai');
        $this->db->order_by('restok_siswa.id_restok', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getByIdSiswa($id) {
        $this->db->select('restok_siswa.*, typestok.nama_typestok, unit.nama_unit, ukuran.nama_ukuran');
        $this->db->from('restok_siswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_siswa.fk_typestok', 'inner');
        $this->db->join('unit', 'unit.id_unit = restok_siswa.fk_unit', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_siswa.fk_ukuran', 'inner');
        $this->db->where('restok_siswa.id_restok', $id);
        $this->db->where('restok_siswa.status', 'PEM1');
        $this->db->order_by('restok_siswa.id_restok', 'DESC');
        $query = $this->db->get();
        return $query->row_array(); // Jika hanya mengharapkan satu baris
    }

    public function cekByFkSiswa($fk_typestok, $fk_unit, $fk_ukuran) {
        $this->db->select('stok_siswa.*');
        $this->db->from('stok_siswa');
        $this->db->where('stok_siswa.fk_typestok', $fk_typestok);
        $this->db->where('stok_siswa.fk_unit', $fk_unit);
        $this->db->where('stok_siswa.fk_ukuran', $fk_ukuran);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris
    }

    public function cekRestokSiswa($fk_typestok, $fk_unit, $fk_ukuran)
    {
        $this->db->select('restok_siswa.*, typestok.nama_typestok, unit.nama_unit, ukuran.nama_ukuran');
        $this->db->from('restok_siswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_siswa.fk_typestok', 'inner');
        $this->db->join('unit', 'unit.id_unit = restok_siswa.fk_unit', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_siswa.fk_ukuran', 'inner');
        $this->db->where('restok_siswa.fk_typestok', $fk_typestok);
        $this->db->where('restok_siswa.fk_unit', $fk_unit);
        $this->db->where('restok_siswa.fk_ukuran', $fk_ukuran);
        $this->db->group_start(); // Memulai grup kondisi untuk OR
        $this->db->where('restok_siswa.status', 'PER0');
        $this->db->or_where('restok_siswa.status', 'PER1');
        $this->db->group_end(); // Menutup grup kondisi
        $query = $this->db->get();
        return $query->row();
    }

    public function add_siswa($data) {
        $insert = $this->db->insert('stok_siswa', $data);
        return $insert;
    }
    
    public function update_siswa($id, $data) {
        // Pisahkan data untuk increment jumlah_stok dari data lain
        if (isset($data['jumlah_stok'])) {
            $this->db->set('jumlah_stok', 'jumlah_stok + ' . (int)$data['jumlah_stok'], FALSE);
            unset($data['jumlah_stok']);
        }
    
        // Update data lainnya
        $this->db->where('id_stok_siswa', $id); // Pastikan menggunakan kolom yang benar
        return $this->db->update('stok_siswa', $data);
    }
    

    public function delete_siswa($id) {
        $this->db->where('id_restok', $id);
        return $this->db->delete('restok_siswa');
    }

}