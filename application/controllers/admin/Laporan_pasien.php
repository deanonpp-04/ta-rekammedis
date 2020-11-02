<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pasien extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_pasien_model');
        //$this->load->model('anggota_model');
        if($this->session->userdata('level')!="admin" ){
			redirect('login');
		}
    }
    public function index()
    {
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data = array(
            'title' => 'DATA LAPORAN',
            'isi'    => 'admin/laporan/lap_pasien',
            'setting'   => $setting
        );
        $data['tahun'] = '';
        $data['bulan'] = '';
        // $data['jenis_pasien'] = ''; 
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function pasien()
    {
        $this->load->library('Mypdf');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan'); 
        
        $data = array(
            'isi'    => 'admin/laporan/lap_pasien'
        );
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['detail'] = $this->lap_pasien_model->getDetailPasien($bulan, $tahun);
        
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->mypdf->generate('admin/laporan/cetak_pasien', $data, 'A4', 'landscape');

    }


}