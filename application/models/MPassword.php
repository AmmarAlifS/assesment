<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPassword extends CI_Model {
    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('user'); // Sesuaikan nama tabel dengan yang ada di database Anda
        return $query->row_array();
    }


    public function update_password($user_id, $data){
        $this->db->where('id', $user_id);
        return $this->db->update('user', $data); // Ganti 'users' dengan nama tabel Anda
    }
}
