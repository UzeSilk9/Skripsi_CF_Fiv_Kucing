<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_gantifoto extends CI_Controller {

	var $folder =   "admin_gantifoto";

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_gantifoto");
		$user=$this->session->userdata('user');
		$controller=$this->uri->segment(1);
		$this->akses=$this->M_login->cekakses($user,$controller);
		if ($this->session->userdata('groupnama')=='none')
			 redirect('Login');
			
	}
 


	public function foto()
	{
		$data['alert'] = "";
		$this->load->view('v_admin_header');
		$this->load->view($this->folder.'/foto',$data);
		$this->load->view('v_admin_footer');
	}


	public function simpanfoto()
	{
		$idd=$this->session->userdata('user');
		$data = $_POST['image'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$imageName = $idd.'.jpg';
		
		file_put_contents('aset/dist/img/'.$imageName, $data);
		echo 'done';
		echo '<script>alert("Data yang bertanda * harus diisi...!")</script>';

	}

	public function simpan()
	{
		$pwd=addslashes($_POST['p_lama']);
		$p_baru1=addslashes($_POST['p_baru1']);
		$p_baru2=addslashes($_POST['p_baru2']);
		$user=$this->session->userdata('user');

		
        $cek=$this->M_login->cekuser($user,$pwd);
        if($cek->num_rows()>0)
        {          
            if($p_baru1==$p_baru2)
            {
            	if ($p_baru1=="")
            	{
            		$data['alert'] = "
            			<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Alert!</h4>Password tidak boleh kosong...!
                      </div>";
            		$this->load->view('v_admin_header');
					$this->load->view($this->folder.'/foto',$data);
					$this->load->view('v_admin_footer');
            		
            	}
            	else
            	{
            		$this->M_gantifoto->ganti_password($user,$p_baru1);
            		
            		$data['alert'] = "
            			<div class='alert alert-info alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Alert!</h4>Ganti Password Suksess...!
                        </div>";
                        
            		$this->load->view('v_admin_header');
					$this->load->view($this->folder.'/foto',$data);
					$this->load->view('v_admin_footer');
            	}
            }
            else
            {
            	$data['alert'] = "
            			<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Alert!</h4>Password Baru dan Konfirmasi Harus Sama...!
                      </div>";
            	$this->load->view('v_admin_header');
				$this->load->view($this->folder.'/foto',$data);
				$this->load->view('v_admin_footer');
            	
            }
        }
        else
        {
            redirect('Login/login_lagi');
        }
		
	}



	



}
