<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
    
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->order_by('id_dokter', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail dokter
    public function detail($id_dokter)
    {
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->where('id_dokter', $id_dokter);
        $this->db->order_by('id_dokter', 'asc');
        $query = $this->db->get();
        return $query->row();
    }
    
    //Tambah
    public function create($data)
    {
        $this->db->insert('dokter', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_dokter', $data['id_dokter']);
        $this->db->update('dokter',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_dokter', $data['id_dokter']);
        $this->db->delete('dokter',$data);
    }

}