<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Diagnosa extends CI_Controller
{
	//load model
    public function __construct()
	{
		parent::__construct();
		$this->load->model('diagnosa_model');
		//proteksi halaman
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
        $diagnosa = $this->diagnosa_model->listing();

        $data=array('title'=>'Data Diagnosa',
            'diagnosa' => $diagnosa,
            'setting'   => $setting,
			'isi' =>'admin/diagnosa/list');
		$this->load->view('admin/layout/wrapper',$data,FALSE);
    }
    public function create()
    {
         //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('kd_diagnosa','Kode diagnosa','required',
        array('required' => '%s harus diisi'));

        if($valid->run()==FALSE){
            $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            
             //End Validasi
            $data = array('title'   => 'Tambah Diagnosa',
                        'setting'   => $setting,
                        'isi'     => 'admin/diagnosa/create');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
         //Masuk database
        }else{
            $i = $this->input;
            $data = array(  
                            'kd_diagnosa'=> $i->post('kd_diagnosa'),
                            'nama_diagnosa'=>$i->post('nama_diagnosa'),
                        
                        );
            $this->diagnosa_model->create($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/diagnosa'),'refresh');
        }
         //End masuk database
    }
    public function edit($id_diagnosa)
    {   
        $diagnosa = $this->diagnosa_model->detail($id_diagnosa);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('kd_diagnosa','Kode diagnosa ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()==FALSE){
            $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
            //End Validasi
            $data = array('title'   => 'Edit Diagnosa',
                        'diagnosa' => $diagnosa,
                        'setting'   => $setting,
                        'isi'     => 'admin/diagnosa/edit');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        }else{
            $i = $this->input;
            $data = array(  'id_diagnosa'=>$id_diagnosa,
                            'kd_diagnosa'=> $i->post('kd_diagnosa'),
                            'nama_diagnosa'=>$i->post('nama_diagnosa'),
                            
                        );
            $this->diagnosa_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/diagnosa'),'refresh');
        }
        //End masuk database
    }

    //Delete data diagnosa
    public function delete($id_diagnosa)
    {
        $data = array('id_diagnosa' => $id_diagnosa);
        $this->diagnosa_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/diagnosa'),'refresh');
    }
}