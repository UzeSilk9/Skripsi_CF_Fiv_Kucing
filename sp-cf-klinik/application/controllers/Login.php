<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('v_login');
    }

    public function login_lagi()
    {
        $this->session->sess_destroy();
        $this->load->view('v_login');
    }


    public function cekuser()
    {
        $menukiri = '';
        $user = addslashes($this->input->post('user'));
        $pwd = addslashes($this->input->post('pass'));
        $cek = $this->M_login->cekuser($user, $pwd);
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $m) {
                $link = base_url() . $m->hakmenuid;
                $label = $m->menunama;
                $menukiri .= "<li class='nav-item'><a href='$link' class='nav-link'><i class='fas fa-sticky-note nav-icon'></i><p>$label</p></a></li>";
            }
            $this->session->set_userdata('list_menukiri', $menukiri);
            $this->session->set_userdata('user', $user);
            foreach ($cek->result() as $m) {
                $this->session->set_userdata('groupnama', $m->groupnama);
                $this->session->set_userdata('nama', $m->nama);
            }
            redirect('admin_beranda');
        } else {

            redirect('Login/login_lagi');
        }
    }


    public function tidakadahakakses()
    {
        redirect('Login/login_lagi');
    }






    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin_beranda');
    }
}
