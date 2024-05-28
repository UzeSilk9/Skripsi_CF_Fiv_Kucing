<?php

/**
 * 
 */
class Admin_konsultasi extends Ci_Controller
{


    var $folder =   "admin_konsultasi";


    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_konsultasi");
        $user = $this->session->userdata('user');
        $controller = $this->uri->segment(1);
        $this->akses = $this->M_login->cekakses($user, $controller);
        if ($this->session->userdata('groupnama') == 'none')
            redirect('Login');
    }

    public function index()
    {
        $data['daftar'] = $this->M_konsultasi->get_gejala();
        $data['pemelihara'] = $this->M_konsultasi->get_pemelihara();
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/view', $data);
        $this->load->view('v_admin_footer');
    }



    public function proses()
    {
        $kar = "K-";
        $query = $this->M_konsultasi->get_kode();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->idmax) + 1;
                if ($tmp > 99 && $tmp <= 999) {
                    $riwayat_id = $kar . $tmp;
                } elseif ($tmp > 9 && $tmp <= 99) {
                    $riwayat_id = $kar . "0" . $tmp;
                } else {
                    $riwayat_id = $kar . "00" . $tmp;
                }
            }
        } else {
            $riwayat_id = $kar . "001";
        }

        $pemelihara = $this->M_konsultasi->get_pemelihara();
        $this->M_konsultasi->simpan(array('id_konsultasi' => $riwayat_id, 'id' =>   $pemelihara->id, 'nama' => $pemelihara->nama, 'umur' => $pemelihara->umur, 'jk' => $pemelihara->jk, 'alamat' => $pemelihara->alamat, 'tgl' => date('Y-m-d')));

        $gejala_pilihan = [];
        //Gejala yang dialami
        $gejala_pilih = $this->M_konsultasi->get_gejala();
        foreach ($gejala_pilih as $pilih) {
            if ($_POST[$pilih->id_gejala] != "") {
                $this->M_konsultasi->simpan_detail(array('id_konsultasi' =>  $riwayat_id, 'id_gejala' => $pilih->id_gejala, 'detail_cf' => $_POST[$pilih->id_gejala]));
                array_push($gejala_pilihan, array('nama_gejala' => $pilih->nama_gejala, 'nilai' => $_POST[$pilih->id_gejala]));
            }
        }


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
            // echo json_encode($gejala);
            foreach ($gejala as $gej) {
                if ($_POST[$gej->id_gejala] != "") {

                    //CF[H,E]
                    // echo $_POST[$gej->id_gejala];
                    $CFHE = $gej->rule_cf * floatval($_POST[$gej->id_gejala]);
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
        $data['gejala'] = $gejala_pilihan;
        $data['riwayat_id'] = $riwayat_id;
        $data['pemelihara'] = $this->M_konsultasi->get_pemelihara();

        if (count($data['penyakit']) > 0) {
            $this->M_konsultasi->update($riwayat_id, $data['penyakit'][0]->id_penyakit, $data['penyakit'][0]->nama_penyakit, $total);

            $this->load->view('v_admin_header');
            $this->load->view($this->folder . '/view_hasil', $data);
            $this->load->view('v_admin_footer');
        } else {
            $this->M_konsultasi->hapus($riwayat_id);
            $this->session->set_flashdata('pesan', 'Tidak ada gejala yang di pilih !');
            redirect('Admin_konsultasi');
        }
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

        $this->load->view($this->folder . '/cetak_hasil', $data);
    }
}
