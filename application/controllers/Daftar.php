<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('MDaftar','MDaftar');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	function index(){
        $this->load->view('daftar');
    }

    public function daftar_akun() {

        // Debugging session data
    print_r($this->session->all_userdata());

    // Check if session data exists
    if (!$this->session->userdata('username')) {
        echo "Username not set in session!";
        return;
    }
        // Ambil data dari form
        $data = array(
            'username' => $this->input->post('username'),
            'password' => hash('sha224', $this->input->post('password')), // Menggunakan SHA-224 untuk menghasilkan hash 56 karakter
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
            'status' => '1', // Sesuaikan dengan status yang sesuai dengan kebutuhan
            'akses' => $this->input->post('akses') // Sesuaikan dengan akses yang sesuai dengan kebutuhan
        );
    
        // Panggil model untuk menyimpan data ke dalam database
        $insert = $this->MDaftar->insert_akun($data);
    
        if ($insert) {
            $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Selamat!</h3>
                <p>Akun berhasil didaftarkan.</p>');
            redirect('login');
        } else {
            $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Oops!</h3>
                <p>Terjadi kesalahan saat mendaftarkan akun.</p>');
            redirect('login');
        }
    }
    
    

}