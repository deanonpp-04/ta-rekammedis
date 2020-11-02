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
            'isi'    => 'dokter/laporan/lap_pasien',
            'setting'   => $setting
        );
        $data['tahun'] = '';
        $data['bulan'] = '';
        // $data['jenis_pasien'] = ''; 
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }

    public function pasien()
    {
        $this->load->library('Mypdf');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan'); 
        
        $data = array(
            'isi'    => 'dokter/laporan/lap_pasien'
        );
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['detail'] = $this->lap_pasien_model->getDetailPasien($bulan, $tahun);
        
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        // $file = 'dokter/laporan/cetak_pasien';
        // $this->load->view($file, $data);
        $this->mypdf->generate('dokter/laporan/cetak_pasien', $data, 'A4', 'landscape');

        // $paper_size ='A4';
        // $orientation = 'landscape';
        // $html = $this->output->get_output();
        // $this->Mypdf->set_paper($paper_size,$orientation);

        // $this->Mypdf->load_html($html);
        // $this->Mypdf->render();
        // $this->Mypdf->stream("Laporan_pasien.pdf", array('Attachment' => 0));
        // $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }


}