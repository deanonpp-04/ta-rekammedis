<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pemeriksaan extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_pemeriksaan_model');
        //$this->load->model('anggota_model');
        if($this->session->userdata('level')!="dokter" ){
			redirect('login');
		}
    }
    public function index()
    {
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data = array(
            'title' => 'DATA LAPORAN',
            'isi'    => 'dokter/laporan/lap_pemeriksaan',
            'setting'   => $setting
        );
        $data['tahun'] = '';
        $data['bulan'] = '';

        $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('Mypdf');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan'); 
        
        $data = array(
            'isi'    => 'dokter/laporan/lap_pemeriksaan'
        );
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['detail'] = $this->lap_pemeriksaan_model->getDetailPemeriksaan();
        
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        // $file = 'admin/laporan/cetak_pasien';
        // $this->load->view($file, $data);
        $this->mypdf->generate('dokter/laporan/cetak_pemeriksaan', $data, 'A4', 'landscape');

    }


}