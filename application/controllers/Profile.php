<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('MProfile', 'MProfile');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
    }

    public function index() {
        $id = $this->session->userdata('id');
        $data['user'] = $this->MProfile->get_user_by_id($id);
        $this->load->view('profile', $data);
    }

    public function update() {
        $id = $this->session->userdata('id');
        $data = array(
            'username' => $this->input->post('username'),
            // 'password' => $this->input->post('password') ? hash('sha224', $this->input->post('password')) : $this->input->post('current_password'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp')
            // 'status' => $this->input->post('status'),
            // 'akses' => $this->input->post('akses')
        );

        $update = $this->MProfile->update_user($id, $data);

        if ($update) {
            $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Berhasil!</h3>
                <p>Profil berhasil diperbarui.</p>');
            redirect('profile');
        } else {
            $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Oops!</h3>
                <p>Terjadi kesalahan saat memperbarui profil.</p>');
            redirect('profile');
        }
    }
}
