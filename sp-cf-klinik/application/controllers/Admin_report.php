<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_report extends CI_Controller
{

    var $folder =   "admin_report";

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_report");
        $user = $this->session->userdata('user');
        $controller = $this->uri->segment(1);
        $this->akses = $this->M_login->cekakses($user, $controller);
        if ($this->session->userdata('groupnama') == 'none')
            redirect('Login');
    }


    public function index()
    {
        $data['tahun'] = $this->M_report->tahun_pelajaran();
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/view', $data);
        $this->load->view('v_admin_footer');
    }


    public function data_pendafataran($tahun = null)
    {
        $data['info'] = $this->M_report->get_info();
        $data['data'] = $this->M_report->data_pendafataran($tahun);
        $data['tahun'] = $tahun;
        $this->load->view($this->folder . '/data_pendafataran', $data);
    }



    public function hasil_seleksi($tahun = null)
    {
        $data['info'] = $this->M_report->get_info();
        $data['data'] = $this->M_report->hasil_seleksi($tahun);
        $data['tahun'] = $tahun;
        $this->load->view($this->folder . '/hasil_seleksi', $data);
    }




    public function hasil_seleksi_kategori($tahun = null)
    {
        $data['info'] = $this->M_report->get_info();
        $tahun = explode('z', $tahun);
        $data['data'] = $this->M_report->hasil_seleksi_kategori($tahun[0], $tahun[1]);
        $data['tahun'] = $tahun[0];
        $data['kategori'] = $tahun[1];
        $this->load->view($this->folder . '/hasil_seleksi_kategori', $data);
    }













    function kendraan()
    {
        $data['daftar'] = $this->M_report->kendraan();
        $this->load->view($this->folder . '/kendraan', $data);
    }


    function kendraan_terpakai()
    {
        $data['daftar'] = $this->M_report->kendraan_terpakai();
        $this->load->view($this->folder . '/kendraan_terpakai', $data);
    }


    function service($service)
    {
        $pecah = explode("z", $service);
        $data['daftar'] = $this->M_report->service($pecah[0], $pecah[1]);
        $data['pecah0'] = $pecah[0];
        $data['pecah1'] = $pecah[1];
        $this->load->view($this->folder . '/service', $data);
    }



    function peminjaman($peminjaman)
    {
        $pecah = explode("z", $peminjaman);
        $data['daftar'] = $this->M_report->peminjaman($pecah[0], $pecah[1]);
        $data['pecah0'] = $pecah[0];
        $data['pecah1'] = $pecah[1];
        $this->load->view($this->folder . '/peminjaman', $data);
    }



    function sparepart($sparepart)
    {
        $pecah = explode("z", $sparepart);
        $data['daftar'] = $this->M_report->sparepart($pecah[0], $pecah[1]);
        $data['pecah0'] = $pecah[0];
        $data['pecah1'] = $pecah[1];
        $this->load->view($this->folder . '/sparepart', $data);
    }


    function tanpa_pemakai()
    {
        $data['daftar'] = $this->M_report->tanpa_pemakai();
        $this->load->view($this->folder . '/tanpa_pemakai', $data);
    }


    function kelengkapan()
    {
        $data['daftar'] = $this->M_report->kelengkapan();
        $this->load->view($this->folder . '/kelengkapan', $data);
    }


    function realisasi_anggaran($anggaran_tahun)
    {
        $data['anggaran_tahun'] = $anggaran_tahun;
        $data['daftar'] = $this->M_report->realisasi_anggaran($anggaran_tahun);
        $this->load->view($this->folder . '/realisasi_anggaran', $data);
    }
}
