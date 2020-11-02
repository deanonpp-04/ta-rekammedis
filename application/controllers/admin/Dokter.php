<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Dokter extends CI_Controller
{
	//load model
    public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model');
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
        $dokter = $this->dokter_model->listing();

        $data=array('title'=>'DATA DOKTER',
                    'dokter' => $dokter,
                    'setting'   => $setting,
                    'isi' =>'admin/dokter/list');
		$this->load->view('admin/layout/wrapper',$data,FALSE);
    }
    public function create()
    {
         //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nip','NIP','required',
        array('required' => '%s harus diisi'));

        if($valid->run()==FALSE){
            $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
         //End Validasi
            $data = array('title'   => 'Tambah Dokter',
                    'setting'   => $setting,
                        'isi'     => 'admin/dokter/create');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
         //Masuk database
        }else{
            $i = $this->input;
            $data = array(  
                            'nip'=> $i->post('nip'),
                            'nama_dokter'=>$i->post('nama_dokter'),
                            'jenis_kelamin'=>$i->post('jenis_kelamin'),
                            'email'=>$i->post('email'),
                            'no_telp'=>$i->post('no_telp'),
                            'alamat'=>$i->post('alamat')
                        );
            $this->dokter_model->create($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/dokter'),'refresh');
        }
         //End masuk database
    }
    
    public function edit($id_dokter)
    {   
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        $dokter = $this->dokter_model->detail($id_dokter);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nip','NIP ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()==FALSE){
            $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
        //End Validasi
            $data = array('title'   => 'Edit Dokter',
                        'dokter' => $dokter,
                        'setting'   => $setting,
                        'isi'     => 'admin/dokter/edit');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        }else{
            $i = $this->input;
            $data = array(  'id_dokter'=> $id_dokter,
                            'nip'=>$i->post('nip'),
                            'nama_dokter'=>$i->post('nama_dokter'),
                            'jenis_kelamin'=>$i->post('jenis_kelamin'),
                            'email'=>$i->post('email'),
                            'no_telp'=>$i->post('no_telp'),
                            'alamat'=>$i->post('alamat')
                        );
            $this->dokter_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/dokter'),'refresh');
        }
        //End masuk database
    }

    //Delete data obat
    public function delete($id_dokter)
    {
        $data = array('id_dokter' => $id_dokter);
        $this->dokter_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/dokter'),'refresh');
    }
    //Detail dokter
    public function detail2($id_dokter){
        
        $dokter = $this->dokter_model->detail($id_dokter);
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);

       // $data = $this->po_model->detail_data($id_po);
        $data = array('title'   => 'Detail Data  DOKTER',
                            'dokter'=>$dokter,
                            'setting'   => $setting,
                            'isi'     => 'admin/dokter/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}