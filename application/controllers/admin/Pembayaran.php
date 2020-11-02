<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_model');
        $this->load->model('pasien_model');
        $this->load->model('dokter_model');
        $this->load->model('diagnosa_model');
        $this->load->model('obat_model');
        $this->load->model('detail_obat_model');
        date_default_timezone_set("Asia/Jakarta");
        $time =  Date('Y-m-d h:i:s');
        $this->simple_login->cek_login();
		if($this->session->userdata('level')!="admin"){
			redirect('login');
		}
    }

    // Data pemeriksaan
    public function index()
    {
        $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
        $pemeriksaan = $this->pemeriksaan_model->data_ongoing();

        $data = array('title'   => 'DATA PEMBAYARAN',
                    'pemeriksaan' => $pemeriksaan,
                    'setting'   => $setting,
                    'isi'     => 'admin/pembayaran/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


 
    public function detail_data($id_periksa){
   
        $pemeriksaan = $this->pemeriksaan_model->detail_data($id_periksa);
        $pasien = $this->pasien_model->listing();
        $dokter=$this->dokter_model->listing();
        $diagnosa=$this->diagnosa_model->listing();
        //memanggil obat yang dipilih untuk pemeriksaan
        $obat = $this->detail_obat_model->detail($id_periksa);

        $biaya = 0;
        //mendapatkan harga biaya obat
        foreach ($obat as $row) {
           $biaya += $row->harga;
        }
        $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;

        $data = array(  'title'   => 'Detail Pembayaran',
                        'pemeriksaan'=>$pemeriksaan,
                        'diagnosa' => $diagnosa,
                        'obat' => $obat,
                        'biaya'=> $biaya,
                        'setting'   => $setting,
                        'isi'     => 'admin/pembayaran/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }


    //Delete data surat
    public function bayar($id_periksa , $biaya_obat , $total_biaya)
    {
        $data = array('id_periksa' => $id_periksa, 
                      'status' => 'done',
                      'biaya_obat' => $biaya_obat,
                      'total_biaya' => $total_biaya);
        $this->pemeriksaan_model->edit($data);
        $this->session->set_flashdata('sukses', 'Pembayaran Berhasil');
        redirect(base_url('admin/pembayaran'),'refresh');
    }

    public function cetak($id_periksa){
        $pemeriksaan = $this->pemeriksaan_model->detail_data($id_periksa);
        $pasien = $this->pasien_model->listing();
        $dokter=$this->dokter_model->listing();
        $diagnosa=$this->diagnosa_model->listing();
        //memanggil obat yang dipilih untuk pemeriksaan
        $obat = $this->detail_obat_model->detail($id_periksa);

        $biaya = 0;
        //mendapatkan harga biaya obat
        foreach ($obat as $row) {
            $biaya += $row->harga;
        }


        $data = array(  'title'   => 'Detail Pembayaran',
                        'pemeriksaan'=>$pemeriksaan,
                        'diagnosa' => $diagnosa,
                        'obat' => $obat,
                        'biaya'=> $biaya,
                        'isi'     => 'admin/pembayaran/cetak');
                        $id_setting = '11';
                        $setting = $this->setting_model->detail($id_setting);
                        $data['setting']    = $setting;
        $this->load->view('admin/pembayaran/cetak' , $data);
    }

}