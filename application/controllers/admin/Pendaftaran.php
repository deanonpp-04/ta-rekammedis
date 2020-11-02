<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pendaftaran extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pemeriksaan_model');
		$this->load->model('antrian_model');
		$this->load->model('pasien_model');
		
		// proteksi halaman
		$this->simple_login->cek_login();
		if($this->session->userdata('level')!="admin"){
			redirect('login');
		}
	}
	public function index()
	{
		$id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
		$pemeriksaan = $this->pemeriksaan_model->search_hari_ini();
		$antrian 	= $this->antrian_model->getData();
		$jumPasien = $this->pemeriksaan_model->getJumPasien();
		$pasien=$this->pasien_model->listing();
		$data=array('title'=>'PENDAFTARAN',
			'isi' =>'admin/pendaftaran/list',
			'pemeriksaan' => $pemeriksaan,
			'jum_pasien' => $jumPasien,
			'antrian' => $antrian,
			'setting'   => $setting,
			'pasien' => $pasien);
		$this->load->view('admin/layout/wrapper',$data,FALSE);
	}

	// public function data_antrian(){
	// 	$antrian 	= $this->antrian_model->getData();
	// 	echo json_encode($antrian);
	// }

	public function daftar(){
		$i = $this->input;
		 //Validasi input
		$id_pasien = $i->post('id_pasien');
		if ($id_pasien == "--Pilih Data--") {
			$this->session->set_flashdata('sukses', 'Silahkan pilih pasien');
			redirect(base_url('admin/pendaftaran'));

		}
		//memasukkan nomor antrian
        $antrian = $this->antrian_model->generate_antrian();
        if($antrian != null){
            $no_antrian = ++$antrian->nomor ;
            
        }else{
            $no_antrian = 1;
            
        }
        $data = null;
        $data = array('tgl_antrian' => date('Y-m-d'),
						'id_pasien'  => $id_pasien,
						'nomor'       => $no_antrian);
        $this->antrian_model->create($data);

        redirect(base_url('admin/pendaftaran'));
	}

	public function cetak($no_antrian, $id_pasien){
		
		$pasien = $this->pasien_model->detail($id_pasien);
		$data=array('title'=>'Dashboard',
			'isi' =>'admin/pendaftaran/list',
			'pasien' => $pasien,
			'no_antrian'=> $no_antrian);
			$id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
		$this->load->view('admin/pendaftaran/bukti',$data,FALSE);
	}
	
}