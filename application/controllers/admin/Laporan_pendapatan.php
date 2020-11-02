<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendapatan extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_pendapatan_model');
        //$this->load->model('anggota_model');
    }
    public function index()
    {
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data = array(
            'title' => 'DATA LAPORAN',
            'isi'    => 'admin/laporan/lap_pendapatan',
            'setting'   => $setting
        );
        $data['tahun'] = '';
        $data['bulan'] = '';
       
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function pendapatan()
    {
        $this->load->library('Mypdf');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan'); 
        
        $data = array(
            'isi'    => 'admin/laporan/lap_pendapatan'
        );
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['detail'] = $this->lap_pendapatan_model->getDetailPemeriksaan();
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        // $file = 'admin/laporan/cetak_pendapatan';
        // $this->load->view($file, $data);
        $this->mypdf->generate('admin/laporan/cetak_pendapatan', $data, 'A4', 'landscape');

        // $this->load->library('dompdf_gen');
        // $tahun = $this->input->post('tahun');
        // $bulan = $this->input->post('bulan'); 
        // $data = array(
        //     'isi'    => 'admin/laporan/lap_pendapatan'
        // );
        // $data['tahun'] = $tahun;
        // $data['bulan'] = $bulan;
        // $data['detail'] = $this->lap_pendapatan_model->getDetailPemeriksaan ($tahun,$bulan);
        // $id_setting = '11';
        // $setting = $this->setting_model->detail($id_setting);
        // $data['setting']    = $setting;
        // $file = 'admin/laporan/cetak_pendapatan';
        // $this->load->view($file, $data);

        // $paper_size ='A4';
        // $orientation = 'potrait';
        // $html = $this->output->get_output();
        // $this->dompdf->set_paper($paper_size,$orientation);

        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("Laporan_pendapatan.pdf", array('Attachment' => 0));

        // $this->load->view('admin/layout/wrapper', $data, FALSE);

    }


}