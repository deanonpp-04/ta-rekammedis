<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pasien extends CI_Controller
{
	//load model
    public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model');
		//proteksi halaman
        $this->simple_login->cek_login();
        if($this->session->userdata('level')!="dokter"){
			redirect('login');
		}
	}
	public function index()
	{
        $pasien = $this->pasien_model->listing();

        $data=array(    'title'=>'Data Pasien',
                    'pasien' => $pasien,
                    'isi' =>'dokter/pasien/list');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
		$this->load->view('dokter/layout/wrapper',$data,FALSE);
    }
    public function create()
    {
         //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('kd_pasien','Kd Pasien','required',
        array('required' => '%s harus diisi'));

        if($valid->run()==FALSE){
         //End Validasi
        $data = array(  'title'   => 'Tambah Pasien',
                        'isi'     => 'dokter/pasien/create');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
         //Masuk database
        }else{
            $i = $this->input;
            $data = array(  
                            'kd_pasien'=> $i->post('kd_pasien'),
                            'nama_pasien'=>$i->post('nama_pasien'),
                            'jenis_kelamin'=>$i->post('jenis_kelamin'),
                            'tgl_lahir'=>$i->post('tgl_lahir'),
                            'usia'=>$i->post('usia'),
                            'goldar'=>$i->post('goldar'),
                            'no_hp'=>$i->post('no_hp'),
                            'pekerjaan'=>$i->post('pekerjaan'),
                            'alamat'=>$i->post('alamat')
                        );

            $this->pasien_model->create($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('dokter/pendaftaran'),'refresh');
        }
         //End masuk database
    }
    public function edit($id_pasien)
    {   
        $pasien = $this->pasien_model->detail($id_pasien);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('kd_pasien','Kode pasien ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()==FALSE){
        //End Validasi
        $data = array(  'title'   => 'Edit Pasien',
                        'pasien' => $pasien,
                        'isi'     => 'dokter/pasien/edit');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;
            $data = array(  'id_pasien'=> $id_pasien,
                            'kd_pasien'=> $i->post('kd_pasien'),
                            'nama_pasien'=>$i->post('nama_pasien'),
                            'jenis_kelamin'=>$i->post('jenis_kelamin'),
                            'tgl_lahir'=>$i->post('tgl_lahir'),
                            'usia'=>$i->post('usia'),
                            'goldar'=>$i->post('goldar'),
                            'no_hp'=>$i->post('no_hp'),
                            'pekerjaan'=>$i->post('pekerjaan'),
                            'alamat'=>$i->post('alamat')
                        );
            $this->pasien_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('dokter/pasien'),'refresh');
        }
        //End masuk database
    }

    //Delete data pasien
    public function delete($id_pasien)
    {
        $data = array('id_pasien' => $id_pasien);
        $this->pasien_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('dokter/pasien'),'refresh');
    }

    //Detail Pasien
    public function detail2($id_pasien){
        $pasien = $this->pasien_model->detail($id_pasien);
       // $data = $this->po_model->detail_data($id_po);
        $data = array('title'   => 'Detail Data  PASIEN',
                        'pasien'=>$pasien,
                        'isi'     => 'dokter/pasien/detail');
            $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $data['setting']    = $setting;
        $this->load->view('dokter/layout/wrapper', $data, FALSE);

    }

    
}