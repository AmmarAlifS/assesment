<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('MPassword', 'MPassword');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index(){
        $user_id = $this->session->userdata('id');
        $data['user'] = $this->MPassword->get_user_by_id($user_id);
        $this->load->view('ubah_password', $data);
    }

    public function update_password(){
        $user_id = $this->session->userdata('id'); 
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        
        // Validasi form
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $user = $this->MPassword->get_user_by_id($user_id);
            if (hash('sha224', $current_password) === $user['password']) {
                $update_data = array(
                    'password' => hash('sha224', $new_password)
                );
                $update = $this->MPassword->update_password($user_id, $update_data);
                
                if ($update) {
                    $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Success!</h3><p>Password Berhasil Di Ganti</p>');
                } else {
                    $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Oops!</h3><p>Gagal Merubah Passowrd.</p>');
                }
                redirect('Password/index');
            } else {
                $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span><h3>Oops!</h3><p>Password Anda Yang Sekarang Salah</p>');
                $this->index();
            }
        }
    }
}
?>
