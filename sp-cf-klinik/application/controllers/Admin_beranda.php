<?php

/**
 * 
 */
class Admin_beranda extends Ci_Controller
{




    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_beranda");
    }

    public function index()
    {
        $user = $this->M_beranda->get_user()->row_array();
        $data['user'] = $user['jumlah'];

        $rule = $this->M_beranda->get_rule()->row_array();
        $data['rule'] = $rule['jumlah'];

        $penyakit = $this->M_beranda->get_penyakit()->row_array();
        $data['penyakit'] = $penyakit['jumlah'];

        $gejala = $this->M_beranda->get_gejala()->row_array();
        $data['gejala'] = $gejala['jumlah'];


        $this->load->view('v_admin_header');
        $this->load->view('v_admin_beranda', $data);
        $this->load->view('v_admin_footer');
    }



    public function laporan($bulan = null)
    {
        $data['bulan'] = $bulan;
        $data['data'] = $this->M_beranda->laporan($bulan);
        $this->load->view('cetak_laporan', $data);
    }
}
