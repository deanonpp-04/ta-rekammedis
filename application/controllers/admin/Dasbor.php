<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Dasbor extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		
		//proteksi halaman
		$this->simple_login->cek_login();
		if($this->session->userdata('level')!="admin"){
			redirect('login');
		}
		$this->load->model('setting_model');
		$this->load->model('pemeriksaan_model');
	}
	public function index()
	{
		$id_setting = '11';
		$setting = $this->setting_model->detail($id_setting);
		$bulan		= date('m');
		$year = 2020;
        $jum		= $this->pemeriksaan_model->getJumPasien($bulan,$year);
		
		$temp_jum = [];
		for ($i =1; $i<= 31; $i++){
			if($i < 10){
				$tgl = "0".$i;
			}else{
				$tgl = $i;
			}
			for ($j = 0; $j < sizeof($jum); $j++){
				$tanggal = $year.'-'.$bulan.'-'.$tgl;
				if ($jum[$j]['tanggal'] == $tanggal){
					$temp_jum[$i]['tanggal'] 	= $tgl;
					$temp_jum[$i]['jum']		= $jum[$j]['jum'];
					// unset($jum[$j]);
					break;
				}else{
					$temp_jum[$i]['tanggal'] 	= $tgl;
					$temp_jum[$i]['jum']		= 0;
					
				}
			}
		}
		$jum = $temp_jum;
		
        
        $pendapatan	= $this->pemeriksaan_model->getPendapatan($year);
        $temp_pendapatan = [];
        $i=0;
        foreach ($pendapatan as $row ){
				$monthNum  = $row->bulan;
				$dateObj   = DateTime::createFromFormat('!m', $monthNum);
				$monthName = $dateObj->format('F');
				$temp_pendapatan[$i]['bulan']	= $monthName;
				$temp_pendapatan[$i]['pendapatan'] = $row->pendapatan;
				$i++;
        }

        $pendapatan = $temp_pendapatan;

       

		$data=array('title'=>'DASHBOARD',
			'setting'	=> $setting,
			'jum'		=> $jum,
			'pendapatan'	=> $pendapatan,
			'isi' =>'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper',$data,FALSE);
	}
}