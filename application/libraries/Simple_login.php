<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class Simple_login
{
	protected$CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		// load data model user
		$this->CI->load->model('user_model');
	}

	// fungi login 
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		if ($check) {
			# code...
			$id_user  =$check->id_user;
			
			//$nama =$check->nama;
			$level =$check->level;

			$this->CI->session->set_userdata('id_user',$id_user);
			//$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('level',$level);

			// redirek
			if($level=='admin')
			{
				redirect(base_url('admin/dasbor'),'refresh');
			}
			else{
				redirect(base_url('dokter/dasbor'),'refresh');
			}
			

		}else{
			
			$this->CI->session->set_flashdata('warning',' Username atau Password Salah ! ');
			redirect(base_url('login'),'refresh');
 
			
		}

	}

	// fungsi cek login 
	public function cek_login()
	{
		// memeriksa appakah seseion sudah ada atau belum jika belum maka ke dasbor
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','Anda Belum Log In ');
			redirect(base_url('login'),'refresh');

			# code...
		}
	}

	
	//  fungsi log out 
	public function logout(){
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('username');
		//$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('level');
		// setelah di buang redirec
		$this->CI->session->set_flashdata('sukses','Log Out Berhasil ');
			redirect(base_url('login'),'refresh');

	}

}