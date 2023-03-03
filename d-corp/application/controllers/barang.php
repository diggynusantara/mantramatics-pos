<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	
	public function __construct(){
	parent::__construct();
		##########Security Login##########
    	$this->simple_login->cek_login();
		##################################
		$this->load->model('m_barang');
    }
	
	public function index() {
    	$data['barang']	= $this->m_barang->list_barang()->result();
    	$this->template->load('template','barang_list',$data);
    }
	
	function input(){
        $this->template->load('template', 'barang_input');
	}
	
	function input_simpan(){
		$databarang = array (
			//nama table				//form_input(name)
			'kode_barang' 	=> $this->input->post('kode'),
			'nama_barang' 	=> $this->input->post('nama'),
			'harga'			=> $this->input->post('harga_barang')
		);
		$this->db->insert('barang',$databarang);
		$this->session->set_flashdata("pesan", "
						<center><div class=\"alert alert-success alert-dismissable\">
							<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
							Data barang berhasil ditambahkan<a class=\"alert-link\"></a>.
						</div></center>
					");
		redirect('barang');
	}
	
	function edit(){
		
		//v_parameter	= $this->urisegmen 3 atau /barang/edit/BR002
		$kode_barang 	= $this->uri->segment(3);
		
		//$data['variabel terserah']= $this->nama file model->function di file model($v_parameter)->row_array()
		$data['product'] 			= $this->m_barang->get_edit($kode_barang)->row_array();
		
		$this->template->load('template', 'barang_edit', $data);
	}
	
	function edit_simpan(){
		$id 		= $this->input->post('id');
		$databarang = array (
			//nama table				//form_input(name)
			'kode_barang' 	=> $this->input->post('kode'),
			'nama_barang' 	=> $this->input->post('nama'),
			'harga'			=> $this->input->post('harga_barang')
		);
		$this->db->where('kode_barang',$id);
		$this->db->update('barang',$databarang);
		$this->session->set_flashdata("pesan", "
				<center><div class=\"alert alert-success alert-dismissable\">
					<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
					Data barang berhasil diedit<a class=\"alert-link\"></a>.
				</div></center>
			");
		redirect('barang');
	}
	
	function delete(){
		$kode_barang 	= $this->uri->segment(3);
		$this->db->where('kode_barang',$kode_barang);
		$this->db->delete('barang');
		$this->session->set_flashdata("pesan", "
				<center><div class=\"alert alert-danger alert-dismissable\">
					<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
					Data barang berhasil dihapus<a class=\"alert-link\"></a>.
				</div></center>
			");
		redirect('barang');
	}
	
}