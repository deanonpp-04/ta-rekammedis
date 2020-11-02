<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('setting_model');
        $this->simple_login->cek_login();
		if($this->session->userdata('level')!="admin"){
			redirect('login');
		}
    }

    // Data sa
    public function index()
    {
        $setting = $this->setting_model->listing();

        $data = array('title'   => 'SETTING',
                        'setting' => $setting,
                        'isi'     => 'admin/setting/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah setting
    public function create()
    {   
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_praktik','Nama Praktik ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()){
            $config['upload_path'] ='./assets/upload/logo/';
            $config['allowed_types'] ='|jpg|pdf|doc|docx';

            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('logo')){
        //End Validasi
        $data = array('title'   => 'Tambah Setting',
                    'error'   => $this->upload->display_errors(),
                    'isi'     => 'admin/setting/create');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
                $upload_file = array('upload_data' => $this->upload->data());
                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/logo/'.$upload_file['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    // $config['new_image'] = './assets/upload/image/thumbs/';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['encrypt_name']            = TRUE;
                    $config['max_size']         = 100;
                    $config['width']         = 250;
                    $config['height']       = 250;
                    $config['thumb_marker'] = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
             //end create thumbnail
            $i = $this->input;
            $data = array(  'id_setting'=> $i->post('id_setting'),
                    'nama_praktik'=> $i->post('nama_praktik'),
                    'logo' => $upload_file['upload_data']['file_name'],
                    'no_telp'=>$i->post('no_telp'),
                    'email'=>$i->post('email'),
                    'alamat'=> $i->post('alamat'),
                    'keterangan'=> $i->post('keterangan')
                        );
            $this->setting_model->create($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/setting'),'refresh');

        }}
        //End masuk database
        $data = array('title'   => 'Tambah Data Praktik',
            // 'error'   => $this->upload->display_errors(),
                        'isi'     => 'admin/setting/create');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Edit setting
    public function edit()
    {       
        $id_setting = '11';
        $setting = $this->setting_model->detail($id_setting);
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_praktik','nama_praktik  ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()){
            // cek  jika file di ganti
            if(!empty($_FILES['logo']['name'])){

            $config['upload_path'] ='./assets/upload/logo/';
            $config['allowed_types'] ='png|jpg|pdf|doc|jpeg';


            $this->load->library('upload',$config);

            if ( ! $this->upload->do_upload('logo')){
        //End Validasi
        $data = array('title'   => 'Edit Setting',
                        'error'   => $this->upload->display_errors(),
                        'setting' => $setting,
                        'isi'     => 'admin/setting/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{

                $upload_file = array('upload_data' => $this->upload->data());
                //create thumbnail gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/logo/'.$upload_file['upload_data']['file_name'];
                //lokasi folder thumbnail
                //$config['new_image'] = './assets/upload/image/thumbs/';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 250;
                $config['height']       = 250;
                $config['thumb_marker'] = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
             //end create thumbnail
            $i = $this->input;
            $data = array(  'id_setting'=> $id_setting,
                            'nama_praktik'=> $i->post('nama_praktik'),
                            'logo' => $upload_file['upload_data']['file_name'],
                            'no_telp'=>$i->post('no_telp'),
                            'email'=>$i->post('email'),
                            'alamat'=> $i->post('alamat'),
                            'keterangan'=> $i->post('keterangan')
                            );

            $this->setting_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/setting/edit'),'refresh');
        }}else{
            $i = $this->input;
            $data = array(  'id_setting'=> $id_setting,
                            'nama_praktik'=> $i->post('nama_praktik'),
                            // 'logo' => $upload_file['upload_data']['file_name'],
                            'no_telp'=>$i->post('no_telp'),
                            'email'=>$i->post('email'),
                            'alamat'=> $i->post('alamat'),
                            'keterangan'=> $i->post('keterangan')
                            );

            $this->setting_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/setting/edit'),'refresh');
        }}

        //End masuk database
        $data = array('title'   => 'Edit Data Setting',
                        //'error'   => $this->upload->display_errors(),
                        'setting' => $setting,
                        'isi'     => 'admin/setting/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
// fungsi untuk detail 
    public function detail2($id_setting){
        $setting = $this->setting_model->detail_data($id_setting);
        $this->load->model('po_model');

       // $data = $this->po_model->detail_data($id_po);
        $data = array('title'   => 'Detail Data  PURCHASE ORDER',
                        'setting'=>$setting,
                        'isi'     => 'admin/setting/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }

    //Delete data surat
    public function delete($id_setting)
    {
        $setting = $this->setting_model->detail($id_setting);
        unlink('./assets/upload/logo/'.$setting->logo);
        $data = array('id_setting' => $id_setting);
        $this->setting_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/setting'),'refresh');
    }

    // public function download($id_sa)
    // {
    //     $data = $this->db->get_where('sa',['id_sa'=>$id_sa])->row();
    //     force_download('assets/upload/berkas/'.$data->filesurat,NULL);
    // }
}