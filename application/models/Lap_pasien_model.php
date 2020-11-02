<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pasien_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getDetailPasien($bulan, $tahun)
    {
    
        $sql = "
            SELECT 
                pasien.*,
                cast(substring(pasien.kd_pasien, 1, 2) as int) as bulan,
                cast(substring(pasien.kd_pasien, 3, 4) as int) as tahun
            From pasien
            having bulan='{$bulan}' and tahun='{$tahun}'
        ";
        $query = $this->db->query($sql, array());
        return $query->result_array();
    
    }



}