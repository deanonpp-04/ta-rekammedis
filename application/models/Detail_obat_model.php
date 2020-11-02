<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_obat_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
    
        $this->db->select('*');
        $this->db->from('detail_obat');
        $this->db->join('obat', 'detail_obat.id_obat = obat.id_obat');
        $this->db->order_by('id_detail', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


    public function detail($id_periksa)
    {
        $this->db->select('*');
        $this->db->from('detail_obat');
        $this->db->join('obat','obat.id_obat=detail_obat.id_obat');
        $this->db->where('id_periksa', $id_periksa);
        $this->db->order_by('id_detail', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    
    //Tambah
    public function create($data)
    {
        $this->db->insert('detail_obat', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_detail', $data['id_detail']);
        $this->db->update('detail_obat',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_periksa', $data['id_periksa']);
        $this->db->delete('detail_obat',$data);
    }

}