<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
	//var $limit=10;
	//var $offset=10;

    public function __construct() {
	parent::__construct();
		##########Security Login##########
		$this->simple_login->cek_login();
		##################################
		$this->load->model('m_user'); //load model m_user yang berada di folder model
		$this->load->helper(array('url')); //load helper url 
	}
	
	//public function index($page=NULL,$offset='',$key=NULL) {
	public function index() {
		$data['query'] = $this->m_user->get_allimage(); //query dari model
		$this->template->load('template','user_list',$data);
	}
    
	public function add() {
	    $this->template->load('template','user_add');
    }
	
    public function insert(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '6144'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name']) {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
					//'nm_gbr' =>$gbr['file_name'],
					'photo' =>$gbr['file_name'],
					//'tipe_gbr' =>$gbr['file_type'],
					//'ket_gbr' =>$this->input->post('textket')
					'username' =>$this->input->post('username'),
					'nama' =>$this->input->post('nama'),
					'email' =>$this->input->post('email'),
					'level' =>$this->input->post('level'),
					#####
					'password' => md5($this->input->post('password')),
					####
					'is_active' =>$this->input->post('is_active')
                );

                $this->m_user->get_insert($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "
						<center><div class=\"alert alert-success alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							User berhasil ditambahkan<a class=\"alert-link\"></a>.
						</div></center>
					");
				redirect('user'); //jika berhasil maka akan ditampilkan view vupload
            
			}
			
			else {
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "
					<center><div class=\"alert alert-danger alert-dismissable\">
						<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
						Gagal menambahkan user user<a class=\"alert-link\"></a>.
						</div></center>
					");
				
				redirect('user/add'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }
	
	// untuk menangani edit gambar
	public function edit() {
		$idgbr=$this->input->get('idgbr'); //mengambil variabel get idgbr dari url
		$where=array('username'=>$idgbr); //array where query untuk menampilkan gambar per id
		$data['row'] = $this->m_user->get_byimage($where);   //query dari model ambil per id
 
		$this->template->load('template','user_edit',$data);
	}
	
	//untuk menangani proses upload gambar yang di edit
	public function update(){
 
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
					'photo' =>$gbr['file_name'],
					'username' =>$this->input->post('username'),
					'nama' =>$this->input->post('nama'),
					'email' =>$this->input->post('email'),
					'level' =>$this->input->post('level'),
					//'password' => md5($this->input->post('password')),
					'is_active' =>$this->input->post('is_active')
				);
 
				@unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
 
				$where =array('username'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
				$this->m_user->get_update($data,$where); //akses model untuk menyimpan ke database
 				//pesan yang muncul jika berhasil diupload pada session flashdata
				$this->session->set_flashdata("pesan", "
						<center><div class=\"alert alert-success alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Edit user dan upload foto profile berhasil<a class=\"alert-link\"></a>.
						</div></center>
					"); 
				redirect('user'); //jika berhasil maka akan ditampilkan view vupload
 
			}
			else {  /* jika upload gambar gagal maka akan menjalankan skrip ini */
				$er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
               
				//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
				$this->session->set_flashdata("pesan", "
						<center><div class=\"alert alert-danger alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Gagal edit dan upload gambar !! ".$er_upload."<a class=\"alert-link\"></a>.
						</div></center>
					");
				redirect('user/edit'); //jika gagal maka akan ditampilkan form upload
           }
		}
		else {
			$data = array(
				'username' =>$this->input->post('username'),
				'nama' =>$this->input->post('nama'),
				'email' =>$this->input->post('email'),
				'level' =>$this->input->post('level'),
				'is_active' =>$this->input->post('is_active')
				//'password' => md5($this->input->post('password'))
			);
 
			$where =array('username'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
			$this->m_user->get_update($data,$where); //akses model untuk menyimpan ke database
 
			$this->session->set_flashdata("pesan", "<center>
				<div class=\"alert alert-success alert-dismissable\">
					<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
					Berhasil edit, Gambar tidak ada yang diupload !!<a class=\"alert-link\"></a>.
				</div></center>
			");
			redirect('user'); /* jika berhasil maka akan kembali ke home upload */
		}

	}
 
	public function delete($id) {
		$query = $this->db->query("Select * from users where username = '{$id}' ");
		foreach($query->result() as $row) {
			unlink('./assets/img/'.$row->photo);
			//unlink('./assets/img/thumb/'.$row->photo);
		
		}
		$this->db->where('username',$id);
		$this->db->delete('users');
		$this->session->set_flashdata("pesan", "
				<center><div class=\"alert alert-success alert-dismissable\">
					<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
					Berhasil hapus data user<a class=\"alert-link\"></a>.
				</div></center>
			");
		redirect('user');
	}
	
	public function resetpass() {
		//v_parameter	= $this->urisegmen 3 atau /barang/edit/BR002
		$username 	= $this->uri->segment(3);
		
		//$data['variabel terserah']= $this->nama file model->function di file model($v_parameter)->row_array()
		$data['row'] 			= $this->m_user->get_editpass($username)->row_array();
		
		$this->template->load('template', 'user_resetpass', $data);
	}
	
	function save_resetpass() {
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata("error", "
					<center><div class=\"alert alert-danger alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Gagal! Konfirmasi password tidak sama !!. Silahkan coba lagi<a class=\"alert-link\"></a>.
						</div>
					</center> ");
			redirect (user);
		}	
		else {
			$id 		= $this->input->post('id');
			$datauser = array (
				//nama table				//form_input(name)
				'password' 	=> md5($this->input->post('re_new'))
			);
			$this->db->where('username',$id);
			$this->db->update('users',$datauser);
			$this->session->set_flashdata("pesan", "
					<center><div class=\"alert alert-success alert-dismissable\">
						<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
						Password sukses di reset<a class=\"alert-link\"></a>.
					</div></center>
				");
			redirect ('user');
		}
	}

	/* fungsi untuk menangani proses hapus */
	/*public function hapus(){
	   
		//variabel di deklarasikan 
		$idgbr  = $this->input->post('kode'); // variabel id gambar 
      
		//query menampilkan gambar dibuat dulu agar gambarnya dihapus sebelum dihapus dari database
		$path= './assets/img/';
		$ardel  = array('username'=>$idgbr);
		$rowdel = $this->m_user->get_byimage($ardel);
 
		//file gambar dihapus dari folder 
		@unlink($path.$rowdel->photo);
 
		//query hapus dilanjutkan ke model get_delete
		$this->m_user->get_delete($ardel); //karna array where querynya sama, maka saya langsung include saja $ardel
 
		$this->session->set_flashdata("pesan", "
				<center><div class=\"alert alert-success alert-dismissable\">
					<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
					Berhasil hapus data user<a class=\"alert-link\"></a>.
				</div></center>
			");
		redirect('user'); // jika berhasil maka akan kembali ke home upload 
	}*/ 

}
