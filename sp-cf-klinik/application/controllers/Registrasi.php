<?php

/**
 * 
 */
class Registrasi extends Ci_Controller
{

    var $folder =   "registrasi";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_registrasi");
    }

    public function index()
    {
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/input');
        $this->load->view('v_admin_footer');
    }


    function cekkode($kode)
    {
        $data = $this->M_registrasi->cekkode($kode);
        echo json_encode($data);
    }


    function simpan()
    {

        $user_nama = addslashes($_POST['user_nama']);
        $user_alamat = addslashes($_POST['user_alamat']);
        $user_umur = addslashes($_POST['user_umur']);
        $user_jk = addslashes($_POST['user_jk']);
        $user_email = addslashes($_POST['user_email']);
        $user_username = addslashes($_POST['user_username']);
        $user_pass = addslashes($_POST['user_pass']);


        $this->M_registrasi->simpan($user_nama, $user_alamat, $user_umur, $user_jk, $user_email, $user_username, $user_pass);

        echo json_encode(array('status' => true));
    }
}
