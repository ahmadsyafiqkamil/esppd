<?php
/**
 *
 */
class Login_model extends CI_Model
{
  public function getUser($nip,$password)
  {
    return $this->db->select("master_user.user_id as nip_pegawai,
    master_user.user_name as nama_pegawai ,
    pegawai.kolok as kolok_pegawai ,
    instansi.unit_id as id_instansi,
    instansi.nama as nama_instansi")
    ->join("pegawai", "master_user.user_id = pegawai.nip ")
    ->join("instansi", "pegawai.kolok = instansi.unit_id  ")
    ->where('master_user.user_id', $nip)
    ->where('master_user.user_password', md5($password))
    ->get("master_user");
  }
  public function instansi()
  {
    return $this->db->select("id,nama as instansi")
	    ->get("public.instansi");
  }
}
 ?>
