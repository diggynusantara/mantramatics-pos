<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 /*
  * Simple_login Class
  * Class ini digunakan untuk fitur login, proteksi halaman dan logout
  * @author  Gun Gun Priatna
  * @url    https://recodeku.blogspot.com
  */
 
 class Simple_login {
 
     // SET SUPER GLOBAL
     var $CI = NULL;
 
     /**
      * Class constructor
      *
      * @return   void
      */
     public function __construct() {
         $this->CI =& get_instance();
     }
 
     /*
     * cek username dan password pada table users, jika ada set session berdasar data user dari
     * table users.
     * @param string username dari input form
     * @param string password dari input form
     */
    public function login($username, $password) {
         
         //cek username dan password
        $query = $this->CI->db->get_where('users',array('username'=>$username,'password' => md5($password)));
 
        if($query->num_rows() == 1) {
            //ambil data user berdasar username
            $row  = $this->CI->db->query('SELECT id FROM users where username = "'.$username.'"');
            $admin     = $row->row();
            $id   = $admin->id;
			
			$row3  = $this->CI->db->query('SELECT nama FROM users where username = "'.$username.'"');
            $admin3     = $row3->row();
            $nama   = $admin3->nama;
			 
			$row4  = $this->CI->db->query('SELECT email FROM users where username = "'.$username.'"');
			$admin4     = $row4->row();
            $email   = $admin4->email;
			 
			$row5  = $this->CI->db->query('SELECT level FROM users where username = "'.$username.'"');
			$admin5     = $row5->row();
            $level   = $admin5->level;
			 
			$row6  = $this->CI->db->query('SELECT is_active FROM users where username = "'.$username.'"');
			$admin6     = $row6->row();
			$is_active   = $admin6->is_active;
 
			$row7  = $this->CI->db->query('SELECT photo FROM users where username = "'.$username.'"');
            $admin7     = $row7->row();
            $photo   = $admin7->photo;
 
            //set session user
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('id_login', uniqid(rand()));
            $this->CI->session->set_userdata('id', $id);
			$this->CI->session->set_userdata('nama', $nama);
			$this->CI->session->set_userdata('email', $email);
			$this->CI->session->set_userdata('level', $level);
			$this->CI->session->set_userdata('is_active', $is_active);
			$this->CI->session->set_userdata('photo', $photo);
			
			if ($this->CI->session->userdata('is_active') == '2'){
				$this->CI->session->set_flashdata('sukses','Maaf akun anda dinonaktifkan, silahkan hubungi administrator (dwikiahma@dcorp.com)');
 
				redirect(site_url('login'));
			}
			
            //redirect ke halaman dashboard
            redirect(site_url('dashboard'));
        }
		else {
			//jika tidak ada, set notifikasi dalam flashdata.
            $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi');
 
            //redirect ke halaman login
            redirect(site_url('login'));
        }
          return false;
      }
     
     /**
      * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
      * login
      */
     public function cek_login() {
 
         //cek session username
         if($this->CI->session->userdata('username') == '') {
 
             //set notifikasi
             $this->CI->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('login'));
         }
     }
 
     /**
      * Hapus session, lalu set notifikasi kemudian di alihkan
      * ke halaman login
      */
     public function logout() {
         $this->CI->session->unset_userdata('username');
         $this->CI->session->unset_userdata('id_login');
         $this->CI->session->unset_userdata('id');
         $this->CI->session->set_flashdata('sukseslogout','Anda berhasil logout');
         redirect(site_url('login'));
     }
 }