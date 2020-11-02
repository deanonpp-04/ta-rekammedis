<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
    
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->order_by('id_obat', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_obat)
    {
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->where('id_obat', $id_obat);
        $this->db->order_by('id_obat', 'asc');
        $query = $this->db->get();
        return $query->row();
    }
    
    //Tambah
    public function create($data)
    {
        $this->db->insert('obat', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_obat', $data['id_obat']);
        $this->db->update('obat',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_obat', $data['id_obat']);
        $this->db->delete('obat',$data);
    }

}