<?php

class M_barang extends CI_Model{
	
	function list_barang(){
		// mengambil data dari tabel barang
		$barang = $this->db->get('barang');
		return $barang;
	}
	
					//$parameter
	function get_edit($kode_barang){
		//return $this->db->get_where('nama tabel',array('kunci edit'=>$parameter))
		return $this->db->get_where('barang',array('kode_barang'=>$kode_barang));
	}
	
}
?>