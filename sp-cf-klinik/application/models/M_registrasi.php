<?php

class M_registrasi extends Ci_Model
{



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
        $query = $this->db->query("SELECT COUNT(username) AS user FROM pemelihara where username='$kode'");
        return $query->row();
    }
}
