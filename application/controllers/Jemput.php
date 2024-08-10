<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jemput extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('MJemput', 'MJemput');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

	public function index() {
        $username = $this->session->userdata('username');
        $data['profile'] = $this->MJemput->get_user_profile($username);
        $this->load->view('menu_jemput', $data);
    }
    
    public function pesan() {
        // Ambil data dari form
        $dari = $this->input->post('dari');
        $destination = $this->input->post('destination');

        // Ambil data profil dari session
        $username = $this->session->userdata('username');
        $profile = $this->MJemput->get_user_profile($username);

        // Siapkan data untuk disimpan
        $data = array(
            'username' => $username,
            'alamat' => $profile['alamat'],
            'nohp' => $profile['nohp'],
            'dari' => $dari,
            'destination' => $destination,
        );

        // Panggil model untuk menyimpan data ke dalam tabel antar
        $insert = $this->MJemput->insert_antar($data);

        if($insert) {
            $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Success!</h3><p>Data berhasil disimpan.</p>');
            redirect('Jemput');
        } else {
            $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Oops!</h3><p>Terjadi kesalahan saat menyimpan data.</p>');
            redirect('Jemput');
        }
    }
}