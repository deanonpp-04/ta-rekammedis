<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
    
        $this->db->select('*');
        $this->db->from('diagnosa');
        $this->db->order_by('id_diagnosa', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


    public function detail($id_diagnosa)
    {
        $this->db->select('*');
        $this->db->from('diagnosa');
        $this->db->where('id_diagnosa', $id_diagnosa);
        $this->db->order_by('id_diagnosa', 'asc');
        $query = $this->db->get();
        return $query->row();
    }
    
    //Tambah
    public function create($data)
    {
        $this->db->insert('diagnosa', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_diagnosa', $data['id_diagnosa']);
        $this->db->update('diagnosa',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_diagnosa', $data['id_diagnosa']);
        $this->db->delete('diagnosa',$data);
    }

}