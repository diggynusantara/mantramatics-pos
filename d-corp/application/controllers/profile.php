<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct(){
	parent::__construct();
		##########Security Login##########
		$this->simple_login->cek_login();
		##################################
		$this->load->model('m_profile'); //load model m_useradd yang berada di folder model
        $this->load->helper(array('url')); //load helper url 
	}
	
	function index() {
        $this->template->load('template','profile_list');
    }
	
	function edit(){
		$this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$path   = './assets/img/'; //path folder
		$config['upload_path'] = $path; //variabel path untuk config upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '2048'; //maksimum besar file 2M
		$config['max_width']  = '1288'; //lebar maksimum 1288 px
		$config['max_height']  = '768'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
 
		$this->upload->initialize($config);
 
		$idgbr      = $this->input->post('kode'); /* variabel id gambar */
		$filelama   = $this->input->post('filelama'); /* variabel file gambar lama */
 
		if($_FILES['filefoto']['name']) {
			
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				$data = array(
					//'nm_gbr' =>$gbr['file_name'],
					//'tipe_gbr' =>$gbr['file_type'],
					//'ket_gbr' =>$this->input->post('textket')
					'photo' =>$gbr['file_name'],
					'username' =>$this->input->post('username'),
					'nama' =>$this->input->post('nama'),
					'email' =>$this->input->post('email')
				);
 
				@unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
 
				$where =array('username'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
				$this->m_profile->get_update($data,$where); //akses model untuk menyimpan ke database
 
				$this->session->set_flashdata("pesan", "
					<center><div class=\"alert alert-success alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Edit dan Upload foto profile berhasil<a class=\"alert-link\"></a>.
						</div>
						<div class=\"alert alert-danger alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Silahkan Logout dan Login kembali untuk melihat perubahan<a class=\"alert-link\"></a>.
						</div>
					</center> ");
				redirect('profile'); //jika berhasil maka akan ditampilkan view vupload
			}
			else {  /* jika upload gambar gagal maka akan menjalankan skrip ini */
				$er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
				//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
				$this->session->set_flashdata("pesan", "
					<center>
						<div class=\"alert alert-danger alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Gagal edit profile dan upload foto profile !".$er_upload."<a class=\"alert-link\"></a>.
						</div>
					</center>");
				redirect('profile/edit'); //jika gagal maka akan ditampilkan form upload
			}
		}
		else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */
			$data = array(
				'username' =>$this->input->post('username'),
				'nama' =>$this->input->post('nama'),
				'email' =>$this->input->post('email')
			);
 
			$where =array('username'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
			$this->m_profile->get_update($data,$where); //akses model untuk menyimpan ke database
 
			$this->session->set_flashdata("pesan", "
				<center>
					<div class=\"alert alert-success alert-dismissable\">
						<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
						Berhasil edit profile, Foto profile tidak ada yang diupload<a class=\"alert-link\"></a>.
					</div>
					<div class=\"alert alert-danger alert-dismissable\">
						<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
						Silahkan Logout dan Login kembali untuk melihat perubahan<a class=\"alert-link\"></a>.
					</div>
				</center>");
			redirect('profile'); /* jika berhasil maka akan kembali ke home upload */
		}
	}
	
	function save_password() { 
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata("error", "
					<center><div class=\"alert alert-danger alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Konfirmasi password tidak sama !!. Silahkan coba lagi<a class=\"alert-link\"></a>.
						</div>
					</center> ");
			redirect ('profile');
		}	
		else{
			$cek_old = $this->m_profile->cek_oldpass();
			//var_dump($cek_oldpass); die;
			if ($cek_old == False){
				$this->session->set_flashdata("error", "
					<center><div class=\"alert alert-danger alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Password lama salah !!. Silahkan coba lagi<a class=\"alert-link\"></a>.
						</div>
					</center> ");
				redirect ('profile');
			}	
			else{
				$this->m_profile->savepass();
				//$this->session->sess_destroy();
				$this->session->set_flashdata("error", "
					<center><div class=\"alert alert-success alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Berhasil ubah password. Silahkan login kembali<a class=\"alert-link\"></a>.
						</div>
					</center> ");
				
				redirect ('profile');
			}
		}
	}
	
}