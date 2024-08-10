<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
        $this->load->library('form_validation');
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}
	
	public function index()
	{
		$this->load->view('home');
	}

	// public function antar() {
    //     $username = $this->session->userdata('user');
    //     $data['profile'] = $this->MAntar->get_user_profile($username);
    //     $this->load->view('menu_antar', $data);
    // }
    
    // public function pesan() {
    //     // Ambil data dari form
    //     $dari = $this->input->post('dari');
    //     $destination = $this->input->post('destination');

    //     // Ambil data profil dari session
    //     $username = $this->session->userdata('user');
    //     $profile = $this->MAntar->get_user_profile($username);

    //     // Siapkan data untuk disimpan
    //     $data = array(
    //         'username' => $username,
    //         'alamat' => $profile['alamat'],
    //         'nohp' => $profile['nohp'],
    //         'dari' => $dari,
    //         'destination' => $destination,
    //     );

    //     // Panggil model untuk menyimpan data ke dalam tabel antar
    //     $insert = $this->MAntar->insert_antar($data);

    //     if($insert) {
    //         $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Success!</h3><p>Data berhasil disimpan.</p>');
    //         redirect('home');
    //     } else {
    //         $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Oops!</h3><p>Terjadi kesalahan saat menyimpan data.</p>');
    //         redirect('home');
    //     }
    // }
}