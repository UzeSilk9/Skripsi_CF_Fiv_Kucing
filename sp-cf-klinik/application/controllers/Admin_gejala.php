<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_gejala extends CI_Controller
{

    var $folder =   "admin_gejala";

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_gejala");
        $user = $this->session->userdata('user');
        $controller = $this->uri->segment(1);
        $this->akses = $this->M_login->cekakses($user, $controller);
        if ($this->session->userdata('groupnama') == 'none')
            redirect('Login');
    }


    public function index()
    {
        $data['daftar'] = $this->M_gejala->get_data();
        $data['penyakit'] = $this->M_gejala->get_penyakit();
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/view', $data);
        $this->load->view('v_admin_footer');
    }



    public function simpan()
    {
        $gejala = addslashes($_POST['nama_gejala']);

        $kar = "G-";
        $query = $this->M_gejala->get_kode();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->idmax) + 1;
                if ($tmp > 99 && $tmp <= 999) {
                    $gejala_id = $kar . $tmp;
                } elseif ($tmp > 9 && $tmp <= 99) {
                    $gejala_id = $kar . "0" . $tmp;
                } else {
                    $gejala_id = $kar . "00" . $tmp;
                }
            }
        } else {
            $gejala_id = $kar . "001";
        }

        $this->M_gejala->simpan($gejala_id, $gejala);
        echo json_encode(array("status" => true));
    }


    public function hapus()
    {
        $gejala_id = addslashes($_POST['solusi_id']);
        $password = addslashes($_POST['password']);

        $user = $this->session->userdata('user');
        $query = $this->M_gejala->cek_password($password, $user);
        if ($query->num_rows() > 0) {
            $this->M_gejala->hapus($gejala_id);
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }


    function edit($id)
    {
        $data = $this->M_gejala->getdataedit($id);
        echo json_encode($data);
    }


    public function simpanedit()
    {
        $gejala_id = addslashes($_POST['kode']);
        $gejala = addslashes($_POST['nama_gejala']);

        $this->M_gejala->simpanedit($gejala_id, $gejala);
        echo json_encode(array("status" => true));
    }


    function cekkode($kode)
    {
        $data = $this->M_gejala->cekkode($kode);
        echo json_encode($data);
    }



    public function download()
    {
        $data['daftar'] = $this->M_gejala->get_data();
        $this->load->view($this->folder . '/download', $data);
    }



    public function cetak()
    {
        $data['daftar'] = $this->M_gejala->get_data();
        $this->load->view($this->folder . '/cetak', $data);
    }
}
