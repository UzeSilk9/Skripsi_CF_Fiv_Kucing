<?php

class M_solusi extends Ci_Model
{

	function get_data()
	{
		$query = $this->db->query("SELECT * FROM penyakit 
		ORDER BY id_penyakit ASC");
		return $query->result();
	}


	public function get_penyakit()
	{
		$query = $this->db->query("SELECT * FROM penyakit WHERE id_penyakit NOT IN (SELECT id_penyakit FROM solusi)");
		return $query->result();
	}


	function get_kode()
	{
		$query = $this->db->query("SELECT MAX(RIGHT(id_solusi,3)) AS idmax FROM solusi");
		return $query;
	}

	function simpan($id_solusi, $id_penyakit, $solusi_text)
	{
		$this->db->query("INSERT INTO solusi (id_solusi,id_penyakit,solusi) values ('$id_solusi','$id_penyakit','$solusi_text')");
	}


	function cek_password($password, $user)
	{
		$query = $this->db->query("SELECT * FROM pemelihara WHERE password=MD5('$password') AND username='$user'");
		return $query;
	}


	public function hapus($id_solusi)
	{
		$this->db->query("DELETE FROM solusi WHERE id_solusi='$id_solusi'");
	}


	public function getdataedit($id)
	{
		$query = $this->db->query("SELECT * from solusi 
		JOIN penyakit ON penyakit.id_penyakit=solusi.id_penyakit
		where id_solusi='$id'");
		return $query->row();
	}


	function simpanedit($id_solusi, $id_penyakit, $solusi_text)
	{
		if ($id_penyakit != "") {
			$user = $this->session->userdata('user');
			$this->db->query("UPDATE solusi set 
				id_penyakit='$id_penyakit',
				solusi='$solusi_text'
				WHERE id_solusi='$id_solusi'");
		} else {
			$user = $this->session->userdata('user');
			$this->db->query("UPDATE solusi set 
					solusi='$solusi_text'
					WHERE id_solusi='$id_solusi'");
		}
	}
}
