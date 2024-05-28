<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_user extends CI_Controller
{

	var $folder =   "admin_user";

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_user");
		$user = $this->session->userdata('user');
		$controller = $this->uri->segment(1);
		$this->akses = $this->M_login->cekakses($user, $controller);
		if ($this->session->userdata('groupnama') == 'none')
			redirect('Login');
	}


	public function index()
	{
		$data['daftar'] = $this->M_user->get_data();
		$this->load->view('v_admin_header');
		$this->load->view($this->folder . '/view', $data);
		$this->load->view('v_admin_footer');
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


		$this->M_user->simpan($user_nama, $user_alamat, $user_umur, $user_jk, $user_email, $user_username, $user_pass);

		echo json_encode(array('status' => true));
	}


	public function hapus($id)
	{
		$this->M_user->hapus($id);
		echo json_encode(array("status" => true));
	}


	function edit($id)
	{
		$data = $this->M_user->getdataedit($id);
		echo json_encode($data);
	}


	public function simpanedit()
	{
		$user_nama = addslashes($_POST['user_nama']);
		$user_alamat = addslashes($_POST['user_alamat']);
		$user_umur = addslashes($_POST['user_umur']);
		$user_jk = addslashes($_POST['user_jk']);
		$user_email = addslashes($_POST['user_email']);
		$user_username = addslashes($_POST['user_username']);
		$user_pass = addslashes($_POST['user_pass']);


		$this->M_user->simpanedit($user_nama, $user_alamat, $user_umur, $user_jk, $user_email, $user_username, $user_pass);

		echo json_encode(array('status' => true));
	}


	function cekkode($kode)
	{
		$data = $this->M_user->cekkode($kode);
		echo json_encode($data);
	}
}
