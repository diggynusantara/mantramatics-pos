<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
     
    function __construct(){
	parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('m_account'); //call model
    }
 
    public function index() {
		$this->form_validation->set_rules('name', 'NAME','required');
        $this->form_validation->set_rules('username', 'USERNAME','required');
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
		#####
		$this->form_validation->set_rules('level', 'LEVEL');
		$this->form_validation->set_rules('is_active', 'IS_ACTIVE');
        #####
		$this->form_validation->set_rules('password','PASSWORD','required');
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
        
		if($this->form_validation->run() == FALSE) {
            $this->load->view('account/v_register');
        }
		else{
			$data['nama']      =    $this->input->post('name');
			$data['username']  =    $this->input->post('username');
			$data['email']     =    $this->input->post('email');
			#####
			$data['level']     =    $this->input->post('level');
			$data['is_active'] =    $this->input->post('is_active');
			#####
			$data['password']  =    md5($this->input->post('password'));
 
			$this->m_account->daftar($data);
             
            $pesan['message'] =    "Pendaftaran Berhasil, Silahkan Login.";
             
            $this->load->view('account/v_success',$pesan);
        }
    }
	
}