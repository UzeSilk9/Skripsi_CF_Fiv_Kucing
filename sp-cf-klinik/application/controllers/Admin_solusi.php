<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_solusi extends CI_Controller
{

	var $folder =   "admin_solusi";

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_solusi");
		$user = $this->session->userdata('user');
		$controller = $this->uri->segment(1);
		$this->akses = $this->M_login->cekakses($user, $controller);
		if ($this->session->userdata('groupnama') == 'none')
			redirect('Login');
	}


	public function index()
	{
		$data['daftar'] = $this->M_solusi->get_data();
		//$data['penyakit'] = $this->M_solusi->get_penyakit();
		$this->load->view('v_admin_header');
		$this->load->view($this->folder . '/view', $data);
		$this->load->view('v_admin_footer');
	}



	public function simpan()
	{
		$id_penyakit = addslashes($_POST['id_penyakit']);
		$solusi = addslashes($_POST['solusi']);

		$kar = "S-";
		$query = $this->M_solusi->get_kode();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $k) {
				$tmp = ((int)$k->idmax) + 1;
				if ($tmp > 99 && $tmp <= 999) {
					$solusi_id = $kar . $tmp;
				} elseif ($tmp > 9 && $tmp <= 99) {
					$solusi_id = $kar . "0" . $tmp;
				} else {
					$solusi_id = $kar . "00" . $tmp;
				}
			}
		} else {
			$solusi_id = $kar . "001";
		}

		$this->M_solusi->simpan($solusi_id, $id_penyakit, $solusi);
		echo json_encode(array("status" => true));
	}


	public function hapus()
	{
		$solusi_id = addslashes($_POST['solusi_id']);
		$password = addslashes($_POST['password']);

		$user = $this->session->userdata('user');
		$query = $this->M_solusi->cek_password($password, $user);
		if ($query->num_rows() > 0) {
			$this->M_solusi->hapus($solusi_id);
			echo json_encode(array("status" => true));
		} else {
			echo json_encode(array("status" => false));
		}
	}


	function edit($id)
	{
		$data = $this->M_solusi->getdataedit($id);
		echo json_encode($data);
	}


	public function simpanedit()
	{
		$solusi_id = addslashes($_POST['kode']);
		$id_penyakit = addslashes($_POST['id_penyakit']);
		$solusi = addslashes($_POST['solusi']);

		$this->M_solusi->simpanedit($solusi_id, $id_penyakit, $solusi);
		echo json_encode(array("status" => true));
	}


	function cekkode($kode)
	{
		$data = $this->M_solusi->cekkode($kode);
		echo json_encode($data);
	}



	public function download()
	{
		$data['daftar'] = $this->M_solusi->get_data();
		$this->load->view($this->folder . '/download', $data);
	}



	public function cetak()
	{
		$data['daftar'] = $this->M_solusi->get_data();
		$this->load->view($this->folder . '/cetak', $data);
	}
}
