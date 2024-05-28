<?php

class M_gantifoto extends Ci_Model
{



	function ganti_password($user, $p_baru1)
	{
		$this->db->query("update user set userpassword=MD5('$p_baru1') where username='$user'");
	}
}
