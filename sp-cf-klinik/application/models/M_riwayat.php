<?php

class M_riwayat extends Ci_Model
{

    function get_data()
    {

        if ($this->session->userdata('groupnama') == 'Admin') {
            $query = $this->db->query("SELECT * FROM konsultasi
            JOIN riwayat_detail ON riwayat_detail.id_konsultasi=konsultasi.id_konsultasi
            GROUP BY konsultasi.id_konsultasi ORDER BY konsultasi.id_konsultasi DESC");
            return $query->result();
        } else {
            $user = $this->session->userdata('nama');
            $query = $this->db->query("SELECT * FROM konsultasi
            JOIN riwayat_detail ON riwayat_detail.id_konsultasi=konsultasi.id_konsultasi
            WHERE nama = '$user'
            GROUP BY konsultasi.id_konsultasi ORDER BY konsultasi.id_konsultasi DESC");
            return $query->result();
        }
    }
}
