<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{



	public function cekuser($user, $pwd)
	{
		$data = $this->db->query("SELECT *
		FROM pemelihara JOIN acces_grup ON level=groupid JOIN acces_groupmenu ON hakgroupid=groupid JOIN acces_menu ON hakmenuid=menuid 
		WHERE password=MD5('$pwd') AND username='$user'");
		return $data;
	}






	public function cekakses($userid, $controller)
	{
		$data = $this->db->query("SELECT * FROM pemelihara JOIN acces_grup 
		ON level=groupid JOIN acces_groupmenu ON hakgroupid=groupid WHERE username='$userid' AND hakmenuid='$controller' ");
		if ($data->num_rows() > 0) {
			$x = $data->row();
			return $x->hakakses;
		} else {

			redirect('login');
		}
	}
}
