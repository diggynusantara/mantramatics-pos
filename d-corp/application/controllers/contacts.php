<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
	
	public function __construct() {
	parent::__construct();
		##########Security Login##########
		$this->simple_login->cek_login();
		##################################
		$this->load->model('m_contacts'); //load model m_user yang berada di folder model
		$this->load->helper(array('url')); //load helper url 
	}
	
	//public function index($page=NULL,$offset='',$key=NULL) {
	public function index() {
		$data['query'] = $this->m_contacts->get_allimage(); //query dari model
		$this->template->load('template','contacts_list',$data);
	}
    
	
	
}