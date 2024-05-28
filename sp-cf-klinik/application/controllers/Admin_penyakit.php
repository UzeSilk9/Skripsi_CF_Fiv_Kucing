<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_penyakit extends CI_Controller
{

	var $folder =   "admin_penyakit";

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_penyakit");
		$user = $this->session->userdata('user');
		$controller = $this->uri->segment(1);
		$this->akses = $this->M_login->cekakses($user, $controller);
		if ($this->session->userdata('groupnama') == 'none')
			redirect('Login');
	}


	public function index()
	{
		$data['daftar'] = $this->M_penyakit->get_data();
		$this->load->view('v_admin_header');
		$this->load->view($this->folder . '/view', $data);
		$this->load->view('v_admin_footer');
	}



	public function simpan()
	{
		$nama_penyakit = addslashes($_POST['nama_penyakit']);
		$ket = addslashes($_POST['ket']);
		$solusi = addslashes($_POST['solusi']);

		$kar = "P-";
		$query = $this->M_penyakit->get_kode();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $k) {
				$tmp = ((int)$k->idmax) + 1;
				if ($tmp > 99 && $tmp <= 999) {
					$penyakit_id = $kar . $tmp;
				} elseif ($tmp > 9 && $tmp <= 99) {
					$penyakit_id = $kar . "0" . $tmp;
				} else {
					$penyakit_id = $kar . "00" . $tmp;
				}
			}
		} else {
			$penyakit_id = $kar . "001";
		}

		$this->M_penyakit->simpan($penyakit_id, $nama_penyakit, $ket, $solusi);
		echo json_encode(array("status" => true));
	}


	public function hapus()
	{
		$penyakit_id = addslashes($_POST['id_penyakit']);
		$password = addslashes($_POST['password']);

		$user = $this->session->userdata('user');
		$query = $this->M_penyakit->cek_password($password, $user);
		if ($query->num_rows() > 0) {
			$this->M_penyakit->hapus($penyakit_id);
			echo json_encode(array("status" => true));
		} else {
			echo json_encode(array("status" => false));
		}
	}


	function edit($id)
	{
		$data = $this->M_penyakit->getdataedit($id);
		echo json_encode($data);
	}


	public function simpanedit()
	{
		$penyakit_id = addslashes($_POST['kode']);
		$nama_penyakit = addslashes($_POST['nama_penyakit']);
		$ket = addslashes($_POST['ket']);
		$solusi = addslashes($_POST['solusi']);

		$this->M_penyakit->simpanedit($penyakit_id, $nama_penyakit, $ket, $solusi);
		echo json_encode(array("status" => true));
	}


	function cekkode($kode)
	{
		$data = $this->M_penyakit->cekkode($kode);
		echo json_encode($data);
	}



	public function download()
	{
		$data['daftar'] = $this->M_penyakit->get_data();
		$this->load->view($this->folder . '/download', $data);
	}



	public function cetak()
	{
		$data['daftar'] = $this->M_penyakit->get_data();
		$this->load->view($this->folder . '/cetak', $data);
	}
}
