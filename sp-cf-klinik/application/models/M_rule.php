<?php

class M_rule extends Ci_Model
{



  function get_data()
  {
    $query = $this->db->query("SELECT *,COUNT(rule_id) AS JUMLAH FROM rule 
    JOIN penyakit ON penyakit.id_penyakit=rule.id_penyakit 
    GROUP BY rule.id_penyakit
    ORDER BY rule.id_penyakit ASC");
    return $query->result();
  }

  function get_penyakit()
  {
    $query = $this->db->query("SELECT * FROM penyakit WHERE id_penyakit NOT IN (SELECT id_penyakit FROM rule) ORDER BY id_penyakit ASC");
    return $query->result();
  }


  function get_kode()
  {
    $query = $this->db->query("SELECT MAX(RIGHT(rule_id,3)) AS idmax FROM rule");
    return $query;
  }




  function simpan($rule_id, $id_penyakit)
  {

    $this->db->query("INSERT INTO rule 
       		(id_penyakit) VALUES 
       		('$id_penyakit')");
  }


  function getdataedit($id)
  {
    $query = $this->db->query("SELECT * from rule where id_penyakit='$id'");
    return $query->row();
  }


  function simpanedit($rule_id, $rule_id_penyakit)
  {
    $this->db->query("UPDATE rule SET 
          id_penyakit='$rule_id_penyakit'
          WHERE id_penyakit='$rule_id'");
  }


  function cek_password($password, $user)
  {
    $query = $this->db->query("SELECT * FROM pemelihara WHERE password=MD5('$password') AND username='$user'");
    return $query;
  }


  function hapus($rule_id)
  {
    $this->db->query("DELETE FROM rule WHERE id_penyakit='$rule_id'");
  }






  function get_data_download()
  {
    $query = $this->db->query("SELECT * FROM rule 
    JOIN penyakit ON penyakit.id_penyakit=rule.id_penyakit 
    JOIN gejala ON gejala.id_gejala=rule.id_gejala 
    ORDER BY penyakit.id_penyakit,rule.id_gejala ASC");
    return $query->result();
  }






  public function get_data_gejala($rule_id)
  {
    $query = $this->db->query("SELECT * FROM rule 
    JOIN gejala ON gejala.id_gejala=rule.id_gejala 
    JOIN penyakit ON penyakit.id_penyakit=rule.id_penyakit
    WHERE penyakit.id_penyakit='$rule_id' ORDER BY rule.id_gejala ASC");
    return $query->result();
  }


  function get_gejala($rule_id)
  {
    $query = $this->db->query("SELECT * FROM gejala WHERE id_gejala NOT IN (SELECT id_gejala FROM rule WHERE rule_id='$rule_id') ORDER BY id_gejala ASC");
    return $query->result();
  }



  function simpan_gejala($rule_id, $rule_gejala_id_gejala, $rule_mb, $rule_md, $rule_gejala_cf)
  {

    $this->db->query("INSERT INTO rule 
          (id_penyakit,id_gejala,rule_mb,rule_md,rule_cf) VALUES 
          ('$rule_id,','$rule_gejala_id_gejala','$rule_mb','$rule_md','$rule_gejala_cf')");
    $this->db->query("DELETE FROM rule WHERE id_gejala IS NULL");
  }


  function hapus_gejala($rule_id)
  {
    $this->db->query("DELETE FROM rule WHERE rule_id='$rule_id'");
  }
}
