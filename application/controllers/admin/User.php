<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
  //       $this->simple_login->cek_login();
		// if($this->session->userdata('level')!="admin"){
		// 	redirect('login');
		// }
    }

    // Data sa
    public function index()
    {
        $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
        $user = $this->user_model->listing();

        $data = array('title'   => 'DATA USER',
                        'user' => $user,
                        'setting'   => $setting);
        $this->load->view('admin/user/create', $data, FALSE);
        // $this->load->view('user',$data,FALSE);
    }

    // Tambah user
    public function create()
    {   
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama','Nama  ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()){
            $config['upload_path'] ='./assets/upload/gambar/';
            $config['allowed_types'] ='|jpg|pdf|doc|docx';

            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('gambar')){
                $id_setting = '11';
                $setting = $this->setting_model->detail($id_setting);
                $data['setting']    = $setting;
            //End Validasi
                $data = array('title'   => 'Tambah user',
                            'error'   => $this->upload->display_errors(),
                            'setting'   => $setting,
                            'isi'     => 'admin/user/create');
                $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
                $upload_file = array('upload_data' => $this->upload->data());
                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/gambar/'.$upload_file['upload_data']['file_name'];
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
            $data = array(  'id_user'=> $i->post('id_user'),
                    'nama'=> $i->post('nama'),
                    'email'=> $i->post('email'),
                    'no_hp'=>$i->post('no_hp'),
                    'gambar' => $upload_file['upload_data']['file_name'],
                    'username'=>$i->post('username'),
                    'password'=> SHA1($i->post('password')),
                    'level'=>$i->post('level')
                        );
            $this->user_model->create($data);
            $this->session->set_flashdata('sukses', 'Create Account Success!');
            redirect(base_url('login'),'refresh');

        }}
        $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
        //End masuk database
        $data = array('title'   => 'Tambah Data User',
            'setting'   => $setting,
            // 'error'   => $this->upload->display_errors(),
                        'isi'     => 'login');
        $this->load->view('admin/layout/wrapper2', $data, FALSE);
    }

    // Edit user
    public function edit($id_user)
    {   
        $user = $this->user_model->detail($id_user);
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama','nama  ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()){
            // cek  jika file di ganti
            if(!empty($_FILES['gambar']['name'])){

            $config['upload_path'] ='./assets/upload/gambar/';
            $config['allowed_types'] ='png|jpg|pdf|doc|jpeg';


            $this->load->library('upload',$config);

            if ( ! $this->upload->do_upload('gambar')){
                $id_setting = '11';
                $setting = $this->setting_model->detail($id_setting);
                $data['setting']    = $setting;
        //End Validasi
                $data = array('title'   => 'Edit user',
                                'error'   => $this->upload->display_errors(),
                                'user' => $user,
                                'setting'   => $setting,
                                'isi'     => 'admin/user/edit');
                $this->load->view('admin/layout/wrapper2', $data, FALSE);
        //Masuk database
        }else{

                $upload_file = array('upload_data' => $this->upload->data());
                //create thumbnail gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/gambar/'.$upload_file['upload_data']['file_name'];
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
            $data = array(  'id_user'=> $id_user,
                            'nama'=> $i->post('nama'),
                            'email'=>$i->post('email'),
                            'no_hp'=>$i->post('no_hp'),
                            'gambar' => $upload_file['upload_data']['file_name'],
                            'username'=>$i->post('username'),
                            'password'=> SHA1($i->post('password')),
                            'level'=>$i->post('level')
                            );

            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/user'),'refresh');
        }}else{
            $i = $this->input;
            $data = array(  'id_user'=> $id_user,
                            'nama'=> $i->post('nama'),
                            // 'gambar' => $upload_file['upload_data']['file_name'],
                            'email'=>$i->post('email'),
                            'no_hp'=>$i->post('no_hp'),
                             'username'=>$i->post('username'),
                            'password'=> SHA1($i->post('password')),
                            'level'=> $i->post('level')
                            );

            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/user'),'refresh');  
        }}
        $id_setting = '11';
            $setting = $this->setting_model->detail($id_setting);
            $data['setting']    = $setting;
        //End masuk database
        $data = array('title'   => 'Edit Data user',
                        //'error'   => $this->upload->display_errors(),
                        'user' => $user,
                        'setting'   => $setting,
                        'isi'     => 'admin/user/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    //Delete data user
    public function delete($id_user)
    {
        $user = $this->user_model->detail($id_user);
        // unlink('./assets/upload/gambar/'.$user->gambar);
        $data = array('id_user' => $id_user);
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'),'refresh');
    }

    // public function download($id_sa)
    // {
    //     $data = $this->db->get_where('sa',['id_sa'=>$id_sa])->row();
    //     force_download('assets/upload/berkas/'.$data->filesurat,NULL);
    // }
}