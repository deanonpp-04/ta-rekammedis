<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Obat extends CI_Controller
{
	//load model
    public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model');
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
        $obat = $this->obat_model->listing();

        $data=array('title'=>'DATA OBAT',
                    'obat' => $obat,
                    'setting'   => $setting,
                    'isi' =>'admin/obat/list');
		$this->load->view('admin/layout/wrapper',$data,FALSE);
    }
    public function create()
    {
         //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('kd_obat','Kode Obat','required',
        array('required' => '%s harus diisi'));

        if($valid->run()==FALSE){
            $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
             //End Validasi
            $data = array(  'title'   => 'Tambah Obat',
                            'setting'   => $setting,
                            'isi'     => 'admin/obat/create');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
             //Masuk database
        }else{
            $i = $this->input;
            $data = array(  
                            'kd_obat'=> $i->post('kd_obat'),
                            'nama_obat'=>$i->post('nama_obat'),
                            'harga'=>$i->post('harga'),
                            'satuan'=>$i->post('satuan'),
                        );
            $this->obat_model->create($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/obat'),'refresh');
        }
         //End masuk database
    }
    public function edit($id_obat)
    {   
        $obat = $this->obat_model->detail($id_obat);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('kd_obat','Kode Obat ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()==FALSE){
            $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
            //End Validasi
            $data = array(  'title'   => 'Edit Obat',
                            'setting'   => $setting,
                            'obat' => $obat,
                            'isi'     => 'admin/obat/edit');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;
            $data = array(  'id_obat'=> $id_obat,
                            'kd_obat'=> $i->post('kd_obat'),
                            'nama_obat'=>$i->post('nama_obat'),
                            'harga'=>$i->post('harga'),
                            'satuan'=>$i->post('satuan'),
                        );
            $this->obat_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/obat'),'refresh');
        }
        //End masuk database
    }

    //Delete data obat
    public function delete($id_obat)
    {
        $data = array('id_obat' => $id_obat);
        $this->obat_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/obat'),'refresh');
    }
}