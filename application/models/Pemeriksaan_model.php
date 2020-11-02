<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // Listing all Pemeriksaan
    public function listing()
    {
        $this->db->select('pemeriksaan.*,pasien.nama_pasien,dokter.nama_dokter,diagnosa.nama_diagnosa');
        $this->db->from('pemeriksaan');
        $this->db->join('pasien','pasien.id_pasien=pemeriksaan.id_pasien', 'left');
        $this->db->join('dokter','dokter.id_dokter=pemeriksaan.id_dokter', 'left');
        $this->db->join('diagnosa','diagnosa.id_diagnosa=pemeriksaan.id_diagnosa', 'left');
        $this->db->order_by('id_periksa', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_ongoing(){
        $this->db->select('pemeriksaan.*,pasien.nama_pasien,dokter.nama_dokter,diagnosa.nama_diagnosa');
        $this->db->from('pemeriksaan');
        $this->db->join('pasien','pasien.id_pasien=pemeriksaan.id_pasien', 'left');
        $this->db->join('dokter','dokter.id_dokter=pemeriksaan.id_dokter', 'left');
        $this->db->join('diagnosa','diagnosa.id_diagnosa=pemeriksaan.id_diagnosa', 'left');
        $this->db->order_by('id_periksa', 'asc');
        $this->db->where('pemeriksaan.status', 'ongoing');
        $query = $this->db->get();
        return $query->result();
    }


    public function search($data){

        $this->db->join('pasien','pasien.id_pasien=pemeriksaan.id_pasien', 'left');
        $this->db->join('dokter','dokter.id_dokter=pemeriksaan.id_dokter', 'left');
        $this->db->join('diagnosa','diagnosa.id_diagnosa=pemeriksaan.id_diagnosa', 'left');
        
        // $this->db->join('detail_obat_pemeriksaan', 'detail_obat_pemeriksaan.id_periksa = pemeriksaan.id_periksa');
        // $this->db->join('obat', 'detail_obat_pemeriksaan.id_obat=obat.id_obat');
        $query = $this->db->like('pemeriksaan', $data)->result();
        return $query;
    }
  

    public function search_hari_ini(){

        $this->db->join('pasien','pasien.id_pasien=pemeriksaan.id_pasien');
        $this->db->where('tanggal', date('Y-m-d'));;
        // $this->db->join('detail_obat_pemeriksaan', 'detail_obat_pemeriksaan.id_periksa = pemeriksaan.id_periksa');
        // $this->db->join('obat', 'detail_obat_pemeriksaan.id_obat=obat.id_obat');
        $query = $this->db->get('pemeriksaan')->result();
        return $query;
    }

    public function rekam_medis($id_pasien){

        $this->db->join('pasien','pasien.id_pasien=pemeriksaan.id_pasien', 'left');
        $this->db->join('dokter','dokter.id_dokter=pemeriksaan.id_dokter', 'left');
        $this->db->join('diagnosa','diagnosa.id_diagnosa = pemeriksaan.id_diagnosa', 'left');
        $this->db->where('pemeriksaan.id_pasien', $id_pasien);
        $this->db->join('detail_obat', 'detail_obat.id_periksa = pemeriksaan.id_periksa');
        $this->db->join('obat', 'detail_obat.id_obat=obat.id_obat');
        $this->db->order_by('tanggal','desc');
        $query = $this->db->get('pemeriksaan')->result_array();
        // var_dump($query); die();
        return $query;
    }
    
    // Detail Pemeriksaan
    public function detail($id_periksa)
    {
        $this->db->select('*');
        $this->db->from('pemeriksaan');
        $this->db->where('id_periksa', $id_periksa);
        $this->db->order_by('id_periksa', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Function Detail
    public function detail_data($id_periksa = NULL){

        $this->db->join('pasien','pasien.id_pasien=pemeriksaan.id_pasien', 'left');
        $this->db->join('dokter','dokter.id_dokter=pemeriksaan.id_dokter', 'left');
        $this->db->join('diagnosa','diagnosa.id_diagnosa=pemeriksaan.id_diagnosa', 'left');
        // $this->db->join('detail_obat_pemeriksaan', 'detail_obat_pemeriksaan.id_periksa = pemeriksaan.id_periksa');
        // $this->db->join('obat', 'detail_obat_pemeriksaan.id_obat=obat.id_obat');
        $query = $this->db->get_where('pemeriksaan', array('id_periksa' =>$id_periksa))->row();
        return $query;
    }
    //Tambah
    public function create($data)
    {
        $this->db->insert('pemeriksaan', $data);
    }

    //Edit 
    public function edit($data)
    {
        $this->db->where('id_periksa', $data['id_periksa']);
        $this->db->update('pemeriksaan',$data);
    }
    //Delete
    public function delete($data)
    {
        $this->db->where('id_periksa', $data['id_periksa']);
        $this->db->delete('pemeriksaan',$data);
    }

    public function getJumPasien($month = null, $year =null){
        $this->db->select("tanggal,count(*) as jum");
        $this->db->from('pemeriksaan');
        if($month != null){
            $this->db->where('month(tanggal)', $month);
            $this->db->where('year(tanggal)', $year);
        }
        
        $this->db->group_by('tanggal');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPendapatan($year){
        $this->db->select('sum(total_biaya) as pendapatan , month(tanggal) as bulan');
        $this->db->from('pemeriksaan');
        $this->db->where('year(tanggal)', $year);
        $this->db->group_by('month(tanggal)');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataObat($id_pasien){
        $sql ="select pemeriksaan.tgl_periksa, obat.nama_obat as nama_obat
        from detail_obat
        left join obat on obat.id_obat = detail_obat.id_obat
        left join pemeriksaan on pemeriksaan.id_periksa = detail_obat.id_periksa
        where pemeriksaan.id_pasien = '{$id_pasien}'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getDatapasien($id_pasien){
        $sql = "select pemeriksaan.tgl_periksa as tgl_periksa, pemeriksaan.keluhan as keluhan,
         pasien.nama_pasien, pemeriksaan.nama_tindakan as nama_tindakan, diagnosa.nama_diagnosa as nama_diagnosa, 
         pemeriksaan.total_biaya as total_biaya, pemeriksaan.biaya_periksa
        from pemeriksaan
        left join pasien on pasien.id_pasien = pemeriksaan.id_pasien
        left join diagnosa on diagnosa.id_diagnosa = pemeriksaan.id_diagnosa
        where pemeriksaan.id_pasien = '{$id_pasien}'";
        // $this->db->order_by('tgl_periksa','desc');
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
}
