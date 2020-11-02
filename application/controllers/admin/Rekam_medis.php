<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Rekam_medis extends CI_Controller
{
	//load model
    public function __construct()
	{
		parent::__construct();
		$this->load->model('pemeriksaan_model');
        $this->load->model('pasien_model');
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
        $pasien = $this->pasien_model->listing();
        $data=array('title'=>'DATA REKAM MEDIS',
            'pasien' => $pasien,
            'rekam_medis' => null,
            'setting'   => $setting,
			'isi' =>'admin/rekam_medis/list');
		$this->load->view('admin/layout/wrapper',$data,FALSE);
    }

    public function search(){
        $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
        $i = $this->input;
        
        $id_pasien = $i->post('id_pasien');
        $pasien = $this->pasien_model->listing();
        $nama_pasien = $this->pasien_model->detail($id_pasien);
        $rekam_medis = $this->pemeriksaan_model->rekam_medis($id_pasien);


        $data=array('title'=>'REKAM MEDIS',
            'pasien' => $pasien,
            'umur'      => $this->hitung_umur($nama_pasien->tgl_lahir),
            'nama_pasien' => $nama_pasien,
            'rekam_medis' => $rekam_medis,
            'setting'   => $setting,
            'isi' => 'admin/rekam_medis/list');
        $this->load->view('admin/layout/wrapper',$data,FALSE);

    }
    function hitung_umur($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y." tahun ";
    }
    

    public function cetak($id_pasien){

        $this->load->library('Mypdf');
        $id_pasien = $id_pasien;
        $pasien = $this->pasien_model->listing();
        $nama_pasien = $this->pasien_model->detail($id_pasien);
        // $rekam_medis = $this->pemeriksaan_model->rekam_medis($id_pasien);
        $dataobat = $this->pemeriksaan_model->getDataObat($id_pasien);
        $datapasien = $this->pemeriksaan_model->getDataPasien($id_pasien);

        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);

        $data=['title'=>'DATA REKAM MEDIS',
        'pasien' => $pasien,
        'umur'      => $this->hitung_umur($nama_pasien->tgl_lahir),
        'nama_pasien' => $nama_pasien,
        // 'rekam_medis' => $rekam_medis,
        'dataobat' => $dataobat,
        'datapasien' => $datapasien,
        'setting'   => $setting]; 

        // var_dump($data); die();
        // return view('admin/laporan/cetak_pasien2', $data);
        $this->mypdf->generate('admin/laporan/cetak_pasien2', $data, 'A4', 'landscape');
    }
    
}