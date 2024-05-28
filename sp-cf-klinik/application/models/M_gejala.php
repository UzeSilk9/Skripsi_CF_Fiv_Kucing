<?php

class M_gejala extends Ci_Model
{

    function get_data()
    {
        $query = $this->db->query("SELECT * FROM gejala 
		ORDER BY id_gejala ASC");
        return $query->result();
    }


    public function get_penyakit()
    {
        $query = $this->db->query("SELECT * FROM penyakit");
        return $query->result();
    }


    function get_kode()
    {
        $query = $this->db->query("SELECT MAX(RIGHT(id_gejala,3)) AS idmax FROM gejala");
        return $query;
    }

    function simpan($id_gejala, $nama_gejala)
    {
        $this->db->query("INSERT INTO gejala (id_gejala,nama_gejala) values ('$id_gejala','$nama_gejala')");
    }


    function cek_password($password, $user)
    {
        $query = $this->db->query("SELECT * FROM pemelihara WHERE password=MD5('$password') AND username='$user'");
        return $query;
    }


    public function hapus($id_gejala)
    {
        $this->db->query("DELETE FROM gejala WHERE id_gejala='$id_gejala'");
    }


    public function getdataedit($id)
    {
        $query = $this->db->query("SELECT * from gejala 
		where id_gejala='$id'");
        return $query->row();
    }


    function simpanedit($id_gejala, $nama_gejala)
    {
        $this->db->query("UPDATE gejala set 
					nama_gejala='$nama_gejala'
					WHERE id_gejala='$id_gejala'");
    }
}
