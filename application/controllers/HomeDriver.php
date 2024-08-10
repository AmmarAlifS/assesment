<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeDriver extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('MAntar', 'MAntar');
        $this->load->model('MJemput', 'MJemput');
        $this->load->model('MTracking');
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    public function index()
	{
		$this->load->view('home_driver');
	}

    public function antar() {
        // Mendapatkan data dari model
        $data['antar_data'] = $this->MAntar->get_all_antar();

        // Menampilkan view dengan data
        $this->load->view('driver_antar', $data);
    }

    public function jemput() {
        // Mendapatkan data dari model
        $data['jemput_data'] = $this->MJemput->get_all_jemput();

        // Menampilkan view dengan data
        $this->load->view('driver_jemput', $data);
    }

    public function tracking() {
        $this->load->view('menu_driver_tracking');
    }
    function lokasi_antar() {
        $data['tracking_data'] = $this->MTracking->get_antar_data();
        $this->load->view('driver_lokasi_antar', $data);
    }

    function lokasi_jemput() {
        $data['tracking_data'] = $this->MTracking->get_jemput_data();
        $this->load->view('driver_lokasi_jemput', $data);
    }
	
}