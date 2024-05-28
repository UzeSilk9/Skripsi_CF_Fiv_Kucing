<?php

class M_konsultasi extends Ci_Model
{

	function get_gejala()
	{
		$query = $this->db->query("SELECT * FROM gejala ORDER BY id_gejala ASC");
		return $query->result();
	}


	function get_pemelihara()
	{
		$user = $this->session->userdata('user');
		$query = $this->db->query("SELECT * FROM pemelihara WHERE username='$user'");
		return $query->row();
	}


	public function get_rule()
	{
		$query = $this->db->query("SELECT rule_id,rule.id_penyakit,nama_penyakit FROM rule JOIN penyakit ON rule.id_penyakit=penyakit.id_penyakit GROUP BY penyakit.id_penyakit ORDER BY rule_id ASC");
		return $query->result();
	}


	function get_rule_gejala($rule_id)
	{
		$query = $this->db->query("SELECT * FROM rule 
		JOIN gejala ON gejala.id_gejala=rule.id_gejala WHERE rule.id_penyakit='$rule_id' ORDER BY rule.id_gejala ASC");
		return $query->result();
	}


	public function get_tb_interpretasi_cf($id_interpretasi)
	{
		$query = $this->db->query("SELECT * FROM tb_interpretasi_cf WHERE id_interpretasi='$id_interpretasi'");
		return $query->result();
	}


	public function get_diagnosa($diagnosa)
	{
		$query = $this->db->query("SELECT * FROM penyakit 
		WHERE penyakit.id_penyakit='$diagnosa'");
		return $query->result();
	}


	public function get_kode()
	{
		$query = $this->db->query("SELECT MAX(RIGHT(id_konsultasi,3)) AS idmax FROM konsultasi");
		return $query;
	}

	public function simpan($konsultasi)
	{
		$this->db->insert('konsultasi', $konsultasi);
	}


	public function simpan_detail($konsultasi_detail)
	{
		$this->db->insert('riwayat_detail', $konsultasi_detail);
	}


	public function get_konsultasi($konsultasi_id)
	{
		$query = $this->db->query("SELECT * FROM konsultasi
		JOIN riwayat_detail ON riwayat_detail.id_konsultasi=konsultasi.id_konsultasi
		JOIN gejala ON gejala.id_gejala=riwayat_detail.id_gejala 
		WHERE konsultasi.id_konsultasi='$konsultasi_id'");
		return $query->result();
	}


	public function update($riwayat_id, $id_penyakit, $nama_penyakit, $total)
	{
		$this->db->query("UPDATE konsultasi SET id_penyakit='$id_penyakit',nm_penyakit='$nama_penyakit', hasil_max='$total' WHERE id_konsultasi='$riwayat_id'");
	}


	public function hapus($riwayat_id)
	{
		$this->db->query("DELETE FROM konsultasi WHERE id='$riwayat_id'");
	}
}
