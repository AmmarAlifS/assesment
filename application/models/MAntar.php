<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAntar extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_antar($data) {
        return $this->db->insert('antar', $data); // Gantilah 'antar' dengan nama tabel Anda
    }

    public function get_user_profile($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user'); // Gantilah 'users' dengan nama tabel Anda
        return $query->row_array(); // Mengembalikan data dalam format array
    }

    public function get_all_antar() {
        $query = $this->db->get('antar'); // Mengambil semua data dari tabel antar
        return $query->result_array(); // Mengembalikan data sebagai array
    }
}
