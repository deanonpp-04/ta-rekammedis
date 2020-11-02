<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function generate_antrian(){
       $this->db->select('nomor');
        $this->db->from('antrian');
        $this->db->order_by('nomor', 'desc');
        $this->db->where('tgl_antrian' , date('Y-m-d'));
        $query = $this->db->get();
        return $query->row();

    }

    public function getData(){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->where('tgl_antrian', date('Y-m-d'));

        $query = $this->db->get();
        return $query->result();
    }
    
    public function listing()
    {
    
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->where('status_pendaftaran', 'ongoing');
        $this->db->order_by('id_antrian', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    // Detail antrian
    public function detail($id_antrian)
    {
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->where('id_antrian', $id_antrian);
        $this->db->order_by('id_antrian', 'asc');
        $query = $this->db->get();
        return $query->row();
    }
    
    //Tambah
    public function create($data)
    {
        $this->db->insert('antrian', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_antrian', $data['id_antrian']);
        $this->db->update('antrian',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_antrian', $data['id_antrian']);
        $this->db->delete('antrian',$data);
    }

}