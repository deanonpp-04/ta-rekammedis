<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pendapatan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getDetailPemeriksaan()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan'); 
        $sql ="SELECT *,pasien.nama_pasien FROM pemeriksaan 
        LEFT JOIN pasien ON (pemeriksaan.id_pasien = pasien.id_pasien)
        WHERE YEAR(pemeriksaan.tgl_periksa) ='$tahun'
        AND MONTH(pemeriksaan.tgl_periksa) = '$bulan' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}