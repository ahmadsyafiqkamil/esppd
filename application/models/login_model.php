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
    master_user.user_level as level,
    pegawai.kolok as kolok_pegawai ,
    instansi.unit_id as id_instansi,
    instansi.nama as nama_instansi")
    ->join("pegawai", "master_user.user_id = pegawai.nip ")
    ->join("instansi", "pegawai.kolok = instansi.unit_id  ")
    ->where('master_user.user_id', $nip)
    ->where('master_user.user_password', md5($password))
    ->get("master_user");

  }
  public function getSuperAdmin($nip,$password)
  {
    return $this->db->select("user_id,user_name,user_level")
    ->where("user_id" ,$nip)
    ->where("user_password",md5($password))
    ->get("master_user");
  }

  public function getAdmin($nip,$password)
  {
    return $this->db->select("master_user.user_id as user,master_user.user_level as level,instansi.nama as instansi")
    ->join("instansi", "master_user.user_id = instansi.unit_id ","left")
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
