<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_model');
        $this->load->model('pasien_model');
        $this->load->model('dokter_model');
        $this->load->model('diagnosa_model');
        $this->load->model('obat_model');
        $this->load->model('antrian_model');
        $this->load->model('detail_obat_model');
        date_default_timezone_set("Asia/Jakarta");
        $time =  Date('Y-m-d h:i:s');

        $this->simple_login->cek_login();
		if($this->session->userdata('level')!="dokter"){
			redirect('login');
		}
    }

    // Data pemeriksaan
    public function index()
    {
        $pemeriksaan = $this->pemeriksaan_model->listing();

        $data = array('title'   => 'Data Pemeriksaan',
                    'pemeriksaan' => $pemeriksaan,
                    'isi'     => 'dokter/pemeriksaan/list');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }

    // Tambah pemeriksaan
    public function create()
    {   
        //Validasi input
        $valid = $this->form_validation;
        $pasien=$this->antrian_model->listing();
        $dokter=$this->dokter_model->listing();
        $diagnosa=$this->diagnosa_model->listing();
        $obat=$this->obat_model->listing();

        

        $valid->set_rules('keluhan','Keluhan ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()==FALSE){
            //End Validasi
            $data = array('title'   => 'Tambah Pemeriksaan',
                        'pasien' => $pasien,
                        'id_pasien' => "",
                        'dokter' => $dokter,
                        'id_dokter' => "",
                        'diagnosa' => $diagnosa,
                        'id_diagnosa' => "",
                        'obat' => $obat,
                        'id_obat' => "",
                        'isi'     => 'dokter/pemeriksaan/create');
                $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
            $this->load->view('dokter/layout/wrapper', $data, FALSE);
            //Masuk database
        }else{
            $i = $this->input;
            $array_from_pasien = explode('-', $i->post('id_pasien'));
            $id_pasien = $array_from_pasien[0];
            $id_antrian = $array_from_pasien[1];

            // var_dump($array_from_pasien);

            $data = array(  
                            'tgl_periksa'=> date('Y-m-d H:i:s'),
                            'id_pasien'=> $id_pasien,
                            'id_dokter'=> $i->post('id_dokter'),
                            'keluhan'=> $i->post('keluhan'),
                            'id_diagnosa'=> $i->post('id_diagnosa'),
                            'nama_tindakan'=> $i->post('nama_tindakan'),
                            'biaya_periksa'=> $i->post('biaya_periksa'),
                            'keterangan'=> $i->post('keterangan'),
                            'tanggal' => date('Y-m-d')
                        );
            $this->pemeriksaan_model->create($data);

            if ($this->db->affected_rows()) {
                //input ke detail obat (1)
                $obat = $i->post('obat');
                $id_periksa = $this->db->insert_id();
                foreach ($obat as $row) {
                    $data = null;
                    $data = array('id_periksa' => $id_periksa ,
                                  'id_obat' => $row  );
                    $this->detail_obat_model->create($data);
                }
                
                $data = null;
                $data = array('id_antrian' => $id_antrian ,
                              'status_pendaftaran' => 'done' );
                $this->antrian_model->edit($data);
             
            }else{
                $this->db->_error_message(); 
            }

            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('dokter/pemeriksaan'),'refresh');
               
        }
        //End masuk database
        $data = array('title'   => 'Tambah Pemeriksaan',
                    'pasien' => $pasien,
                    'id_pasien' => "",
                    'dokter' => $dokter,
                    'id_dokter' => "",
                    'diagnosa' => $diagnosa,
                    'id_diagnosa' => "",
                    'obat' => $obat,
                    'id_obat' => "",
                    'isi'     => 'dokter/pemeriksaan/create');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }



    // Edit pemeriksaan
    public function edit($id_periksa)
    {   
    
        $pemeriksaan = $this->pemeriksaan_model->detail($id_periksa);

        //Validasi input
        $valid = $this->form_validation;
        $pasien=$this->pasien_model->listing();
        $dokter=$this->dokter_model->listing();
        $diagnosa=$this->diagnosa_model->listing();
        $obat=$this->obat_model->listing();
        $obat_pemeriksaan = $this->detail_obat_model->detail($id_periksa);

        $valid->set_rules('tgl_periksa','Tanggal Periksa ','required',
                array('required' => '%s harus diisi'
                ));

        if($valid->run()==FALSE){
        //End Validasi
            $data = array('title'   => 'Edit Pemeriksaan',
                        'pemeriksaan' => $pemeriksaan,
                        'pasien' => $pasien,
                        'id_pasien' => "",
                        'dokter' => $dokter,
                        'id_dokter' => "",
                        'diagnosa' => $diagnosa,
                        'id_diagnosa' => "",
                        'obat' => $obat,
                        'obat_pemeriksaan' => $obat_pemeriksaan,
                        'id_obat' => "",
                        'isi'     => 'dokter/pemeriksaan/edit');
                $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
            $this->load->view('dokter/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{ 
            

            $i = $this->input;
            $data = array(  'id_periksa'=> $id_periksa,
                    'tgl_periksa'=> $i->post('tgl_periksa'),
                    'id_pasien'=> $i->post('id_pasien'),
                    'id_dokter'=> $i->post('id_dokter'),
                    'keluhan'=> $i->post('keluhan'),
                    'id_diagnosa'=> $i->post('id_diagnosa'),
                    'nama_tindakan'=> $i->post('nama_tindakan'),
                    'biaya_periksa'=> $i->post('biaya_periksa'),
                    'keterangan'=> $i->post('keterangan'),        
                        );

            $this->pemeriksaan_model->edit($data);
            
            //-------------------------------------
            $data = null;
            $data = array('id_periksa' => $id_periksa);
            $this->detail_obat_model->delete($data);
            //-------------------------------------
            $obat = $i->post('obat');
                foreach ($obat as $row) {
                    $data = null;
                    $data = array('id_periksa' => $id_periksa ,
                                    'id_obat' => $row  );
                    $this->detail_obat_model->create($data);
                }

            //------------------------------------     
       

            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('dokter/pemeriksaan'),'refresh');
        }
        //End masuk database
        $data = array('title'   => 'Edit pemeriksaan',
                    'pasien' => $pasien,
                    'id_pasien' => "",
                    'dokter' => $dokter,
                    'id_dokter' => "",
                    'diagnosa' => $diagnosa,
                    'id_diagnosa' => "",
                    'obat' => $obat,
                    'id_obat' => "",
                     'obat_pemeriksaan' => $obat_pemeriksaan,
                    'isi'     => 'dokter/pemeriksaan/edit');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }

    public function detail_data($id_periksa){
   
    $this->load->model('pemeriksaan_model');

    
    $data = array('title'   => 'Detail Pemeriksaan',
                    'pasien' => $pasien,
                    'id_pasien' => "",
                    'dokter' => $dokter,
                    'id_dokter' => "",
                    'diagnosa' => $diagnosa,
                    'id_diagnosa' => "",
                    'isi'     => 'dokter/pemeriksaan/detail',
                    'obat' => $obat);
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
    }


    //Delete data surat
    public function delete($id_periksa)
    {
        $data = array('id_periksa' => $id_periksa);
        $this->pemeriksaan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('dokter/pemeriksaan'),'refresh');
    }

    public function detail2($id_periksa){
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


        $data = array(  'title'   => 'Detail Pemeriksaan',
                        'pemeriksaan'=>$pemeriksaan,
                        'diagnosa' => $diagnosa,
                        'obat' => $obat,
                        'biaya'=> $biaya,
                        'isi'     => 'dokter/pemeriksaan/detail');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
            $this->load->view('dokter/layout/wrapper', $data, FALSE);


    }
    // public function getNamaDiagnosadanTanggal(){
    //     $idPeriksa = $this->input->post('id');
    //     $idPasien = $this->pemeriksaan_model->getIdPassien($idPeriksa);
    //     $diagnosa = $this->pemeriksaan_model->getNamaDiagnosadanTanggal($idPasien);
    //     echo json_encode($diagnosa);
    // }
}