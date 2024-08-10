<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('MTracking');
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
    }

    function index() {
        $this->load->view('menu_tracking');
    }

    function tracking_antar() {
        $username = $this->session->userdata('username');
        $data['tracking_data'] = $this->MTracking->Trackingusernameantar($username);
        $this->load->view('tracking_antar', $data);
    }

    function tracking_jemput() {
        $username = $this->session->userdata('username');
        $data['tracking_data'] = $this->MTracking->Trackingusernamejemput($username);
        $this->load->view('tracking_jemput', $data);
    }

    public function save() {

        $username = $this->session->userdata('username');
        $data = array(
            'username' => $username,
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
        );

        if ($this->MTracking->insert_tracking($data)) {
            $this->session->set_flashdata('msg', 'Data berhasil disimpan.');
        } else {
            $this->session->set_flashdata('msg', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect('Tracking');
    }
}
