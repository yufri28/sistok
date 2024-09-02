<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

    public function getAll() {
        $this->db->select('siswa.*, unit.id_unit, unit.nama_unit, map_unit.fk_unit, map_unit.id_map');
        $this->db->from('siswa');
        $this->db->join('map_unit', 'map_unit.fk_siswa = siswa.id_siswa', 'inner');
        $this->db->join('unit', 'unit.id_unit = map_unit.fk_unit', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getById($id) {
        $this->db->select('siswa.*, unit.id_unit, unit.nama_unit, map_unit.fk_unit, map_unit.id_map');
        $this->db->from('siswa');
        $this->db->join('map_unit', 'map_unit.fk_siswa = siswa.id_siswa', 'inner');
        $this->db->join('unit', 'unit.id_unit = map_unit.fk_unit', 'inner');
        $this->db->where('siswa.id_siswa', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByNis($nis) {
        $this->db->where('nis', $nis);
        $query = $this->db->get('siswa');
        return $query->result_array();
    }

    public function getByIdNis($id, $nis) {
        $this->db->where('id_siswa', $id);
        $this->db->where('nis !=', $nis);
        $query = $this->db->get('siswa');
        return $query->result_array();
    }

    public function add($data, $table) {
       $insert = $this->db->insert($table, $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_siswa', $id);
        return $this->db->update('siswa', $data);
    }

    public function update_map_unit($id, $data) {
        $this->db->where('id_map', $id);
        return $this->db->update('map_unit', $data);
    }

    public function delete($id) {
        $this->db->where('id_siswa', $id);
        return $this->db->delete('siswa');
    }
}