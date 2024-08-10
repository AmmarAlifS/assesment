<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTracking extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_antar_data() {
        $this->db->select('username, dari, destination ,start_lat, end_lat, start_lng, end_lng');
        $this->db->from('antar');
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan hasil sebagai array
    }

    public function get_jemput_data() {
        $this->db->select('username, dari, destination ,start_lat, end_lat, start_lng, end_lng');
        $this->db->from('jemput');
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan hasil sebagai array
    }

    public function insert_tracking($data) {
        return $this->db->insert('tracking', $data);
    }

    public function Trackingusernameantar($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('antar'); 
        return $query->result_array();
    }

    public function Trackingusernamejemput($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('jemput'); 
        return $query->result_array();
    }

}

