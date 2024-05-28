<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_beranda extends CI_Model
{


	function get_user()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM pemelihara WHERE level='2'");
		return $query;
	}


	function get_rule()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM (SELECT * FROM rule GROUP BY id_penyakit) AS T");
		return $query;
	}


	function get_penyakit()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM penyakit");
		return $query;
	}


	function get_gejala()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM gejala");
		return $query;
	}



	public function laporan($bulan)
	{
		$bulan_pecah = explode("-", $bulan);
		$jumHari = cal_days_in_month(CAL_GREGORIAN, $bulan_pecah[1], $bulan_pecah[0]);
		$query = $this->db->query("SELECT * FROM konsultasi
		JOIN riwayat_detail ON riwayat_detail.id_konsultasi=konsultasi.id_konsultasi
		WHERE tgl BETWEEN '$bulan-01' AND '$bulan-$jumHari'
		GROUP BY konsultasi.id_konsultasi ORDER BY konsultasi.id_konsultasi DESC");
		return $query->result();
	}
}
