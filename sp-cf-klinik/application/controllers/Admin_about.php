<?php

/**
 * 
 */
class Admin_about extends Ci_Controller
{




    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('user');
    }

    public function index()
    {
        $this->load->view('v_admin_header');
        $this->load->view('v_admin_about');
        $this->load->view('v_admin_footer');
    }
}
