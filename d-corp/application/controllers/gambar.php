<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller
{
    var $limit=10;
	var $offset=10;

    public function __construct() {
        parent::__construct();
		##########Security Login##########
    	$this->simple_login->cek_login();
		##################################
        $this->load->model('m_gambar'); //load model m_gambar yang berada di folder model
        $this->load->helper(array('url')); //load helper url 
    }
    
	public function index($page=NULL,$offset='',$key=NULL) {
		$data['query'] = $this->m_gambar->get_allimage(); //query dari model
        $this->template->load('template','gambar/gambar_list',$data);
    }
    
    public function add() {
	    $this->template->load('template','gambar/gambar_add',$data);
    }
	
    public function insert(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|JPG|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 5M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'nama_gambar' =>$gbr['file_name'],
                  'tipe_gambar' =>$gbr['file_type'],
                  'ket_gambar' =>$this->input->post('textket')
                  
                );

                $this->m_gambar->get_insert($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('gambar'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('gambar/add'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }
	
	/* untuk menangani edit gambar */
	public function edit(){
		$idgbr=$this->input->get('idgbr'); //mengambil variabel get idgbr dari url
		$where=array('id'=>$idgbr); //array where query untuk menampilkan gambar per id
		$data['row'] = $this->m_gambar->get_byimage($where);   //query dari model ambil per id
 
		//utk form edit nya, saya tambahkan sebuah view bernama feupload.php
		//$this->load->view('feupload',$data);
		$this->template->load('template','gambar/gambar_edit',$data);
	}
 
	//untuk menangani proses upload gambar yang di edit
	public function update(){
 
	   $this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
	   $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	   $path   = './assets/uploads/'; //path folder
	   $config['upload_path'] = $path; //variabel path untuk config upload
	   $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	   $config['max_size'] = '2048'; //maksimum besar file 2M
	   $config['max_width']  = '1288'; //lebar maksimum 1288 px
	   $config['max_height']  = '768'; //tinggi maksimu 768 px
	   $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
	   $this->upload->initialize($config);
 
	   $idgbr      = $this->input->post('kode'); /* variabel id gambar */
	   $filelama   = $this->input->post('filelama'); /* variabel file gambar lama */
 
		   if($_FILES['filefoto']['name'])
		   {
			   if ($this->upload->do_upload('filefoto'))
			   {
				   $gbr = $this->upload->data();
				   $data = array(
					 'nama_gambar' =>$gbr['file_name'],
					 'tipe_gambar' =>$gbr['file_type'],
					 'ket_gambar' =>$this->input->post('textket')
	 
				   );
	 
				   @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form
	 
				   $where =array('id'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
				   $this->m_gambar->get_update($data,$where); //akses model untuk menyimpan ke database
	 
				   $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Edit dan Upload gambar berhasil !!</div></div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
				   redirect('gambar'); //jika berhasil maka akan ditampilkan view vupload
	 
			   }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
				   $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
				   //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
				   $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal edit dan upload gambar !! ".$er_upload."</div></div>");
				   redirect('gambar/edit'); //jika gagal maka akan ditampilkan form upload
			   }
			}else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */
	 
			   $data = array(
				   'ket_gambar' =>$this->input->post('textket')
			   );
	 
			   $where =array('id'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
			   $this->m_gambar->get_update($data,$where); //akses model untuk menyimpan ke database
	 
			   $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Berhasil edit, Gambar tidak ada diupload !!</div></div>");
			   redirect('gambar'); /* jika berhasil maka akan kembali ke home upload */
		}
	}
 
	// fungsi untuk menangani proses hapus 
	/*public function delete(){
		// variabel di deklarasikan 
		$idgbr  = $this->input->post('kode'); // variabel id gambar 
			
		// query menampilkan gambar dibuat dulu agar gambarnya dihapus sebelum dihapus dari database 
		$path= './assets/uploads/';
		$ardel  = array('id'=>$idgbr);
		$rowdel = $this->m_gambar->get_byimage($ardel);
 
		// file gambar dihapus dari folder 
		@unlink($path.$rowdel->nama_gambar);
 
		// query hapus dilanjutkan ke model get_delete 
		$this->m_gambar->get_delete($ardel); //karna array where querynya sama, maka saya langsung include saja $ardel
 
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Berhasil hapus data Gambar dan file gambar dari folder !!</div></div>");
		redirect('gambar'); // jika berhasil maka akan kembali ke home upload 
	}*/
	
}
