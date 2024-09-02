<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypestokModel extends CI_Model {

    public function getAll() {
        return $this->db->get('typestok')->result_array();
    }
    
    public function getById($id) {
        $this->db->where('id_typestok', $id);
        $query = $this->db->get('typestok');
        return $query->result_array();
    }

    public function add($data) {
       $insert = $this->db->insert('typestok', $data);
        return $insert;
    }

    public function update($id, $data) {
        $this->db->where('id_typestok', $id);
        return $this->db->update('typestok', $data);
    }

    public function delete($id) {
        $this->db->where('id_typestok', $id);
        return $this->db->delete('typestok');
    }
}