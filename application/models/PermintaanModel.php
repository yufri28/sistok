<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanModel extends CI_Model {

    public function getAllMahasiswa($role) {
        $this->db->select('restok_mahasiswa.*, typestok.nama_typestok, prodi.nama_prodi, ukuran.nama_ukuran');
        $this->db->from('restok_mahasiswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('prodi', 'prodi.id_prodi = restok_mahasiswa.fk_prodi', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_mahasiswa.fk_ukuran', 'inner');
        $this->db->group_start();
        if($role == 'admin'){    
            $this->db->where('restok_mahasiswa.status', 'PER0');
            $this->db->or_where('restok_mahasiswa.status', 'PER1');
        }elseif($role == 'admin_m'){    
            $this->db->where('restok_mahasiswa.status', 'PER0');
            $this->db->or_where('restok_mahasiswa.status', 'PER1');
        }elseif($role == 'logistik'){
            $this->db->where('restok_mahasiswa.status', 'PER1');
            $this->db->or_where('restok_mahasiswa.status', 'PEM0');
        }elseif($role == 'keuangan'){
            $this->db->where('restok_mahasiswa.status', 'PEM0');
        }else{
            $this->db->where('restok_mahasiswa.status', 'PER0');
            $this->db->or_where('restok_mahasiswa.status', 'PER1');
        }
        $this->db->group_end();
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
        $this->db->group_start();
        $this->db->where('restok_mahasiswa.status', 'PER0');
        $this->db->or_where('restok_mahasiswa.status', 'PER1');
        $this->db->or_where('restok_mahasiswa.status', 'PEM0');
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result_array();
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
       $insert = $this->db->insert('restok_mahasiswa', $data);
        return $insert;
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('id_restok', $id);
        return $this->db->update('restok_mahasiswa', $data);
    }

    public function delete_mahasiswa($id) {
        $this->db->where('id_restok', $id);
        return $this->db->delete('restok_mahasiswa');
    }

    // ========================= Siswa ==========================================
    public function getAllSiswa($role) {
        $this->db->select('restok_siswa.*, typestok.nama_typestok, unit.nama_unit, ukuran.nama_ukuran');
        $this->db->from('restok_siswa');
        $this->db->join('typestok', 'typestok.id_typestok = restok_siswa.fk_typestok', 'inner');
        $this->db->join('unit', 'unit.id_unit = restok_siswa.fk_unit', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = restok_siswa.fk_ukuran', 'inner');
        $this->db->group_start();
        if($role == 'admin'){    
            $this->db->where('restok_siswa.status', 'PER0');
            $this->db->or_where('restok_siswa.status', 'PER1');
        }elseif($role == 'admin_s'){    
            $this->db->where('restok_siswa.status', 'PER0');
            $this->db->or_where('restok_siswa.status', 'PER1');
        }elseif($role == 'logistik'){
            $this->db->where('restok_siswa.status', 'PER1');
            $this->db->or_where('restok_siswa.status', 'PEM0');
        }elseif($role == 'keuangan'){
            $this->db->where('restok_siswa.status', 'PEM0');
        }else{
            $this->db->where('restok_siswa.status', 'PER0');
            $this->db->or_where('restok_siswa.status', 'PER1');
        }
        $this->db->group_end();
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
        $this->db->group_start();
        $this->db->where('restok_siswa.status', 'PER0');
        $this->db->or_where('restok_siswa.status', 'PER1');
        $this->db->or_where('restok_siswa.status', 'PEM0');
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result_array();
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
       $insert = $this->db->insert('restok_siswa', $data);
        return $insert;
    }

    public function update_siswa($id, $data) {
        $this->db->where('id_restok', $id);
        return $this->db->update('restok_siswa', $data);
    }

    public function delete_siswa($id) {
        $this->db->where('id_restok', $id);
        return $this->db->delete('restok_siswa');
    }
}