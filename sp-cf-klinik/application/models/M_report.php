<?php

class M_report extends Ci_Model
{

	public function get_info()
	{
		$data = $this->db->query("SELECT * FROM setting");
		return $data->row();
	}


	public function tahun_pelajaran()
	{
		$data = $this->db->query("SELECT DISTINCT LEFT(no_pend,4) AS tahun FROM USER");
		return $data->result();
	}


	public function data_pendafataran($tahun)
	{
		$query = $this->db->query("SELECT * FROM user LEFT JOIN sekolah ON user.kd_sekolah=sekolah.npsn
		WHERE LEFT(no_pend,4) = '$tahun'
	ORDER BY no_pend ASC");
		return $query->result();
	}


	function hasil_seleksi($tahun)
	{
		$query = $this->db->query("SELECT * FROM seleksi 
        JOIN user ON seleksi.no_pend=user.no_pend
		JOIN ref_hasil ON hasil_id=hasil_seleksi
		LEFT JOIN sekolah ON user.kd_sekolah=sekolah.npsn
        WHERE LEFT(user.no_pend,4) = '$tahun'
		ORDER BY hasil_id ASC,(nilai_rapor_ipa+nilai_rapor_mtk+nilai_rapor_bindo) DESC");
		return $query->result();
	}



	public function hasil_seleksi_kategori($tahun, $kategori)
	{
		if ($kategori == 'Lulus') {
			$query = $this->db->query("SELECT * FROM seleksi 
        JOIN user ON seleksi.no_pend=user.no_pend
		JOIN ref_hasil ON hasil_id=hasil_seleksi
        LEFT JOIN sekolah ON user.kd_sekolah=sekolah.npsn
        WHERE LEFT(user.no_pend,4) = '$tahun' AND hasil_seleksi='1'
		ORDER BY user.no_pend ASC");
			return $query->result();
		} elseif ($kategori == 'Cadangan') {
			$query = $this->db->query("SELECT * FROM seleksi 
			JOIN user ON seleksi.no_pend=user.no_pend
			JOIN ref_hasil ON hasil_id=hasil_seleksi
			LEFT JOIN sekolah ON user.kd_sekolah=sekolah.npsn
			WHERE LEFT(user.no_pend,4) = '$tahun' AND hasil_seleksi='2'
		ORDER BY user.no_pend ASC");
			return $query->result();
		} else {
			$query = $this->db->query("SELECT * FROM seleksi 
			JOIN user ON seleksi.no_pend=user.no_pend
			JOIN ref_hasil ON hasil_id=hasil_seleksi
			LEFT JOIN sekolah ON user.kd_sekolah=sekolah.npsn
			WHERE LEFT(user.no_pend,4) = '$tahun' AND hasil_seleksi <> '1' AND hasil_seleksi <> '2'
		ORDER BY user.no_pend ASC");
			return $query->result();
		}
	}
}
