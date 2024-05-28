<?php /**
* 
*/
class Error_404 extends Ci_Controller
{

	


    public function __construct()
	{
		parent::__construct();
		$this->load->model("M_beranda");
		$user=$this->session->userdata('user');
	
			
	}

    public function index()
    {
        $this->load->view('v_admin_header');
        $this->load->view('v_error_404');
        $this->load->view('v_admin_footer');
    }












    

   

} 