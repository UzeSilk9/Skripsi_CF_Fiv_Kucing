<?php

class M_penyakit extends Ci_Model
{

    function get_data()
    {
        $query = $this->db->query("SELECT * FROM penyakit ORDER BY id_penyakit ASC");
        return $query->result();
    }


    function get_kode()
    {
        $query = $this->db->query("SELECT MAX(RIGHT(id_penyakit,3)) AS idmax FROM penyakit");
        return $query;
    }

    function simpan($id_penyakit, $nama_penyakit, $ket, $solusi)
    {
        $this->db->query("INSERT INTO penyakit (id_penyakit,nama_penyakit,ket,solusi) values ('$id_penyakit','$nama_penyakit','$ket','$solusi')");
    }


    function cek_password($password, $user)
    {
        $query = $this->db->query("SELECT * FROM pemelihara WHERE password=MD5('$password') AND username='$user'");
        return $query;
    }


    public function hapus($id_penyakit)
    {
        $this->db->query("DELETE FROM penyakit WHERE id_penyakit='$id_penyakit'");
    }


    public function getdataedit($id)
    {
        $query = $this->db->query("SELECT * from penyakit where id_penyakit='$id'");
        return $query->row();
    }


    function simpanedit($id_penyakit, $nama_penyakit, $ket, $solusi)
    {
        $this->db->query("UPDATE penyakit set 
				nama_penyakit='$nama_penyakit',
                ket='$ket',
                solusi='$solusi'
				WHERE id_penyakit='$id_penyakit'");
    }
}
