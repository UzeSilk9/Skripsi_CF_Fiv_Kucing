<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_riwayat extends CI_Controller
{

    var $folder =   "admin_riwayat";

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_riwayat");
        $this->load->model("M_konsultasi");
        $user = $this->session->userdata('user');
        $controller = $this->uri->segment(1);
        $this->akses = $this->M_login->cekakses($user, $controller);
        if ($this->session->userdata('groupnama') == 'none')
            redirect('Login');
    }


    public function index()
    {
        $data['daftar'] = $this->M_riwayat->get_data();
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/view', $data);
        $this->load->view('v_admin_footer');
    }






    public function cetak($konsultasi_id = null)
    {

        $datas = $this->M_konsultasi->get_konsultasi($konsultasi_id);



        $hasil = [];
        $diagnosa = '';
        $total = 0;
        $kerusakan = $this->M_konsultasi->get_rule();
        foreach ($kerusakan as $ker) {

            $jumlah_gejala_sama = 0;
            $jumlah_gejala_kasus = 0;
            $bobot_gejala_sama = 0;
            $bobot_gejala_kasus = 0;
            $CFHE = 0;
            $old = 0;
            $CFCombine = 0;
            $gejala = $this->M_konsultasi->get_rule_gejala($ker->id_penyakit);
            foreach ($gejala as $gej) {

                foreach ($datas as $dat) {
                    if ($dat->id_gejala == $gej->id_gejala) {

                        //CF[H,E]
                        $CFHE = $gej->rule_cf * $dat->detail_cf;
                        if ($old == 0) {
                            $old = $CFHE;
                        } else {
                            //CF Combine CF[H,E]
                            $CFCombine = $old + ($CFHE * (1 - $old));
                            $old = $CFCombine;
                        }
                        // echo $gej->rule_gejala_cf.' * '.$_POST[$gej->id_gejala].'='.$CFHE.'<br>';
                        // echo $CFCombine.' = '.$old.' + ('.$CFHE.' * (1 - '.$old.'))<br>';
                    }
                }
            }

            $CFpersentase = $CFCombine * 100;
            array_push($hasil, array('nama_penyakit' => $ker->nama_penyakit, 'hasil' => $CFpersentase));

            if ($total < ($CFpersentase)) {
                $total = $CFpersentase;
                $diagnosa = $ker->id_penyakit;
            }
        }

        $data['total'] = $total;
        $data['diagnosa'] = $diagnosa;
        $data['penyakit'] = $this->M_konsultasi->get_diagnosa($diagnosa);
        $data['daftar'] = $hasil;
        $data['gejala'] = $datas;

        $this->load->view('admin_konsultasi/cetak_hasil', $data);
    }
}
