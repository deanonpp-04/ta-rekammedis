<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function generate_code(){
        $this->db->select('*')
                ->like('kd_pasien',date('mY'))
                ->order_by('kd_pasien',"desc")
                ->limit(1);    
        
        $query = $this->db->get('pasien');  
        if($query->num_rows() <> 0){
            $data = $query->row();  
            $nomor = explode("-", $data->kd_pasien);    
            $kode = intval($nomor[1]) + 1; 
        }else{
            $kode = 1;    
        }

        $kodemax = date('mY').'-'.str_pad($kode,4, "0", STR_PAD_LEFT);
        $code = $kodemax;
        return $code;
}

//     public function generate_code(){
//     $this->db->select('*')
//             ->like('kd_pasien',date('mY'))
//             ->limit(1);    

//         $query = $this->db->get('pasien');  
//         if($query->num_rows() <> 0){
//             $data = $query->row();  
//             $nomor = explode("-", $data->kd_pasien);    
//             $kode = intval($nomor[1]) + 1; 
//         }else{
//             $kode = 1;    
//         }

//         $kodemax = date('mY').'-'.str_pad($kode,4, "0", STR_PAD_LEFT);
//         $code = $kodemax;
//         return $code;
// }
    
    public function listing()
    {
    
        $this->db->select('* ');
        $this->db->from('pasien');
        $this->db->order_by('id_pasien', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail buat tambah
    public function detail($id_pasien)
    {
        $this->db->select('*  ');
        $this->db->from('pasien');
        $this->db->where('id_pasien', $id_pasien);
        $this->db->order_by('id_pasien', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    
    // public function detail_data($id_pasien = NULL){
    //     $this->db->join
    // }
    //Tambah
    public function create($data)
    {
        $this->db->insert('pasien', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_pasien', $data['id_pasien']);
        $this->db->update('pasien',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_pasien', $data['id_pasien']);
        $this->db->delete('pasien',$data);
    }

}