<?php
class M_gambar extends CI_Model {

    var $tabel = 'upload_image';

    function __construct() {
        parent::__construct();
    }
    
    //fungsi untuk menampilkan semua data dari tabel database
	function get_allimage() {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        //cek apakah ada data
        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}

    //fungsi insert ke database
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
	
	//fungsi update ke database
    function get_update($data,$where){
       $this->db->where($where);
       $this->db->update($this->tabel, $data);
       return TRUE;
    }
 
	//fungsi delete ke database
	function get_delete($where){
       $this->db->where($where);
       $this->db->delete($this->tabel);
       return TRUE;
    }
 
	//fungsi untuk menampilkan data per satuan dari tabel database
    function get_byimage($where) {
        $this->db->from($this->tabel);
        $this->db->where($where);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }
}