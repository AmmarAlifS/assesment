<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Mlogin','Mlogin');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	function index(){
        if($this->session->userdata('logged') !=TRUE){
            $this->load->view('login');
        }else{
            $url=base_url('home');
            redirect($url);
        };
    }
    
    function autentikasi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
                
        $validasi_username= $this->Mlogin->query_validasi_username($username);
        if($validasi_username->num_rows() > 0){
            $validate_ps=$this->Mlogin->query_validasi_password($username,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
                if($x['status']=='1'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('username',$username);
                    $id=$x['id'];
                    if($x['akses']=='1'){ //Orang Tua
                        $name = $x['username'];
                        $this->session->set_userdata('access','Orang Tua');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('username',$username);
                        redirect('home');
                    }else if($x['akses']=='2'){ //Driver
                        $name = $x['username'];
                        $this->session->set_userdata('access','Driver');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('username',$username);
                        redirect('homedriver');
                    }
                }else{
                    $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                        <h3>Uupps!</h3>
                        <p>Email atau  yang kamu masukan salah.</p>');
                    redirect('login');
                }
            }else{
                $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p> atau Password yang kamu masukan salah.</p>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Uupps!</h3>
                <p>Email atau Password yang kamu masukan salah.</p>');
            redirect('login');
        }
    }
    

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }

}