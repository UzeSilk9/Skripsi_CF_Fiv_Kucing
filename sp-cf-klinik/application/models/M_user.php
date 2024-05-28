<?php

class M_user extends Ci_Model
{

	function get_data()
	{
		$query = $this->db->query("SELECT * FROM pemelihara WHERE level = '2'");
		return $query->result();
	}



	function simpan($user_nama, $user_alamat, $user_umur, $user_jk, $user_email, $user_username, $user_pass)
	{
		$this->db->query("INSERT INTO pemelihara 
            (
                nama,
            alamat,
            umur,
            jk,
            email,
            username,
            password) VALUES 
            (
            '$user_nama',
             '$user_alamat',
              '$user_umur',
              '$user_jk',
               '$user_email',
                '$user_username',
                md5('$user_pass')
                )");
	}


	function cekkode($kode)
	{
		$query = $this->db->query("SELECT COUNT(username) AS admin FROM pemelihara where username='$kode'");
		return $query->row();
	}


	public function hapus($id)
	{
		$this->db->query("delete from pemelihara where username='$id'");
	}


	public function getdataedit($id)
	{
		$query = $this->db->query("SELECT * from pemelihara where username='$id'");
		return $query->row();
	}


	function simpanedit($user_nama, $user_alamat, $user_umur, $user_jk, $user_email, $user_username, $user_pass)
	{

		$this->db->query("update pemelihara set nama='$user_nama',alamat='$user_alamat',umur='$user_umur',jk='$user_jk',email='$user_email', password=md5('$user_pass') where username='$user_username'");
	}
}
