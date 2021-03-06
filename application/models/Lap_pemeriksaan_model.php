<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pemeriksaan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getDetailPemeriksaan()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan'); 
        $sql = "SELECT *,pasien.nama_pasien,dokter.nama_dokter FROM pemeriksaan 
        LEFT JOIN pasien ON (pemeriksaan.id_pasien = pasien.id_pasien)
        LEFT JOIN dokter ON (pemeriksaan.id_dokter = dokter.id_dokter)
        WHERE YEAR(pemeriksaan.tgl_periksa) = '$tahun'
        AND MONTH(pemeriksaan.tgl_periksa) = '$bulan' ";   
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}