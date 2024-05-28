<?php

/**
 * 
 */
class Admin_rule extends Ci_Controller
{

    var $folder =   "admin_rule";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_rule");
        $user = $this->session->userdata('user');
        $controller = $this->uri->segment(1);
        $this->akses = $this->M_login->cekakses($user, $controller);
        if ($this->session->userdata('groupnama') == 'none')
            redirect('Login');
    }

    public function index()
    {
        $data['daftar'] = $this->M_rule->get_data();
        $data['penyakit'] = $this->M_rule->get_penyakit();
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/view', $data);
        $this->load->view('v_admin_footer');
    }


    function simpan()
    {
        $rule_id_penyakit = addslashes($_POST['rule_id_penyakit']);


        $kar = "R-";
        $query = $this->M_rule->get_kode();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->idmax) + 1;
                if ($tmp > 99 && $tmp <= 999) {
                    $rule_id = $kar . $tmp;
                } elseif ($tmp > 9 && $tmp <= 99) {
                    $rule_id = $kar . "0" . $tmp;
                } else {
                    $rule_id = $kar . "00" . $tmp;
                }
            }
        } else {
            $rule_id = $kar . "001";
        }

        $this->M_rule->simpan($rule_id, $rule_id_penyakit);
        echo json_encode(array("status" => true));
    }



    public function edit($id)
    {
        $data = $this->M_rule->getdataedit($id);
        echo json_encode($data);
    }



    function simpanedit()
    {
        $rule_id = addslashes($_POST['kode']);
        $rule_id_penyakit = addslashes($_POST['rule_id_penyakit']);

        $this->M_rule->simpanedit($rule_id, $rule_id_penyakit);
        echo json_encode(array("status" => true));
    }


    function hapus()
    {
        $rule_id = addslashes($_POST['rule_id']);
        $password = addslashes($_POST['password']);

        $user = $this->session->userdata('user');
        $query = $this->M_rule->cek_password($password, $user);
        if ($query->num_rows() > 0) {
            $this->M_rule->hapus($rule_id);
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }



    public function download()
    {
        $data['daftar'] = $this->M_rule->get_data_download();
        $this->load->view($this->folder . '/download', $data);
    }



    public function cetak()
    {
        $data['daftar'] = $this->M_rule->get_data_download();
        $this->load->view($this->folder . '/cetak', $data);
    }










    public function gejala($rule_id)
    {
        $data['daftar'] = $this->M_rule->get_data_gejala($rule_id);
        $data['gejala'] = $this->M_rule->get_gejala($rule_id);
        $data['rule_id'] = $rule_id;
        $this->load->view('v_admin_header');
        $this->load->view($this->folder . '/view_gejala', $data);
        $this->load->view('v_admin_footer');
    }


    function simpan_gejala()
    {
        $rule_gejala_id_gejala = addslashes($_POST['rule_gejala_id_gejala']);
        $rule_id = addslashes($_POST['rule_id']);
        $rule_mb = addslashes($_POST['rule_mb']);
        $rule_md = addslashes($_POST['rule_md']);
        $rule_gejala_cf = addslashes($_POST['rule_gejala_cf']);

        $this->M_rule->simpan_gejala($rule_id, $rule_gejala_id_gejala, $rule_mb, $rule_md, $rule_gejala_cf);
        echo json_encode(array("status" => true));
    }




    function hapus_gejala()
    {
        $rule_id = addslashes($_POST['rule_id_gejala']);
        $password = addslashes($_POST['password']);

        $user = $this->session->userdata('user');
        $query = $this->M_rule->cek_password($password, $user);
        if ($query->num_rows() > 0) {
            $this->M_rule->hapus_gejala($rule_id);
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }
}
