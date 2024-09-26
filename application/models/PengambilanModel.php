<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengambilanModel extends CI_Model {

    public function getPengambilanMahasiswa() {
        $this->db->select('pengambilan_mahasiswa.*, tahun_ajar.id_ta, typestok.nama_typestok, mahasiswa.nim, mahasiswa.nama_mahasiswa, tahun_ajar.nama_ta, ukuran.nama_ukuran');
        $this->db->from('pengambilan_mahasiswa');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengambilan_mahasiswa.fk_mahasiswa', 'inner');
        $this->db->join('stok_mahasiswa', 'stok_mahasiswa.id_stok_mhs = pengambilan_mahasiswa.fk_stok', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_mahasiswa.fk_ukuran', 'inner');
        $this->db->join('typestok', 'typestok.id_typestok = stok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('tahun_ajar', 'tahun_ajar.id_ta = pengambilan_mahasiswa.fk_ta', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getByIdMahasiswa($id_pengambilan) {
        $this->db->select('pengambilan_mahasiswa.*, tahun_ajar.id_ta, typestok.nama_typestok, mahasiswa.nim, mahasiswa.nama_mahasiswa, tahun_ajar.nama_ta, ukuran.nama_ukuran');
        $this->db->from('pengambilan_mahasiswa');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengambilan_mahasiswa.fk_mahasiswa', 'inner');
        $this->db->join('stok_mahasiswa', 'stok_mahasiswa.id_stok_mhs = pengambilan_mahasiswa.fk_stok', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_mahasiswa.fk_ukuran', 'inner');
        $this->db->join('typestok', 'typestok.id_typestok = stok_mahasiswa.fk_typestok', 'inner');
        $this->db->join('tahun_ajar', 'tahun_ajar.id_ta = pengambilan_mahasiswa.fk_ta', 'inner');
        $this->db->where('pengambilan_mahasiswa.id_pengambilan', $id_pengambilan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_mahasiswa($data) {
        // Insert data into 'pengambilan_mahasiswa' table
        $insert = $this->db->insert('pengambilan_mahasiswa', $data);
    
        if ($insert) {
            $this->db->set('jumlah_stok', 'jumlah_stok - 1', FALSE); 
            $this->db->where('id_stok_mhs', $data['fk_stok']);
            $update = $this->db->update('stok_mahasiswa');
    
            
            return $update;
        } else {
            return false;
        }
    }    

    public function update_mahasiswa($id, $data) {
        $this->db->where('id_pengambilan', $id);
        return $this->db->update('pengambilan_mahasiswa', $data);
    }

    public function delete_mahasiswa($id, $data) {
        $this->db->where('id_pengambilan', $id);
        $delete = $this->db->delete('pengambilan_mahasiswa');

        if ($delete) {
            if($data['kembalikan_stok'] == 'ya'){
                $this->db->set('jumlah_stok', 'jumlah_stok + 1', FALSE); 
                $this->db->where('id_stok_mhs', $data['fk_stok']);
                $update = $this->db->update('stok_mahasiswa');
            }
            return $delete;
        } else {
            return false;
        }
    }

    // ========================= Siswa ==========================================
    public function getAllSiswa() {
        $this->db->select('pengambilan_siswa.*, tahun_ajar.id_ta, typestok.nama_typestok, siswa.nis, siswa.nama_siswa, tahun_ajar.nama_ta, ukuran.nama_ukuran');
        $this->db->from('pengambilan_siswa');
        $this->db->join('siswa', 'siswa.id_siswa = pengambilan_siswa.fk_siswa', 'inner');
        $this->db->join('stok_siswa', 'stok_siswa.id_stok_siswa = pengambilan_siswa.fk_stok', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_siswa.fk_ukuran', 'inner');
        $this->db->join('typestok', 'typestok.id_typestok = stok_siswa.fk_typestok', 'inner');
        $this->db->join('tahun_ajar', 'tahun_ajar.id_ta = pengambilan_siswa.fk_ta', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getByIdSiswa($id_pengambilan) {
        $this->db->select('pengambilan_siswa.*, tahun_ajar.id_ta, typestok.nama_typestok, siswa.nis, siswa.nama_siswa, tahun_ajar.nama_ta, ukuran.nama_ukuran');
        $this->db->from('pengambilan_siswa');
        $this->db->join('siswa', 'siswa.id_siswa = pengambilan_siswa.fk_siswa', 'inner');
        $this->db->join('stok_siswa', 'stok_siswa.id_stok_siswa = pengambilan_siswa.fk_stok', 'inner');
        $this->db->join('ukuran', 'ukuran.id_ukuran = stok_siswa.fk_ukuran', 'inner');
        $this->db->join('typestok', 'typestok.id_typestok = stok_siswa.fk_typestok', 'inner');
        $this->db->join('tahun_ajar', 'tahun_ajar.id_ta = pengambilan_siswa.fk_ta', 'inner');
        $this->db->where('pengambilan_siswa.id_pengambilan', $id_pengambilan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_siswa($data) {
       $insert = $this->db->insert('pengambilan_siswa', $data);
    
       if ($insert) {
           $this->db->set('jumlah_stok', 'jumlah_stok - 1', FALSE); 
           $this->db->where('id_stok_siswa', $data['fk_stok']);
           $update = $this->db->update('stok_siswa');
   
           
           return $update;
       } else {
           return false;
       }
    }

    public function update_siswa($id, $data) {
        $this->db->where('id_pengambilan', $id);
        return $this->db->update('pengambilan_siswa', $data);
    }

    public function delete_siswa($id, $data) {
        $this->db->where('id_pengambilan', $id);
        $delete = $this->db->delete('pengambilan_siswa');

        if ($delete) {
            if($data['kembalikan_stok'] == 'ya'){
                $this->db->set('jumlah_stok', 'jumlah_stok + 1', FALSE); 
                $this->db->where('id_stok_siswa', $data['fk_stok']);
                $update = $this->db->update('stok_siswa');
            }
            return $delete;
        } else {
            return false;
        }
    }
}