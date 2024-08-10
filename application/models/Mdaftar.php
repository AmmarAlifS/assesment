<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDaftar extends CI_Model{

    function insert_akun($data){
        return $this->db->insert('user', $data);
    }

} 