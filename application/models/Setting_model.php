<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
    
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->order_by('id_setting', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail setting
    public function detail($id_setting)
    {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('id_setting', $id_setting);
        $this->db->order_by('id_setting', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    
    //Tambah
    public function create($data)
    {
        $this->db->insert('setting', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_setting', $data['id_setting']);
        $this->db->update('setting',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_setting', $data['id_setting']);
        $this->db->delete('setting',$data);
    }

} 