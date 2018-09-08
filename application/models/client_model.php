<?php
/**
*
*/
class Client_Model extends CI_Model
{
  public function instansi_add($data = array())
  {
    $this->db->insert('instansi', $data);
    return $this->db->insert_id();
  }
  public function pegawai_get()
  {
    return $this->db->select("users.id as user_id,
    users.name as username,
    users.username as nip,
    golongan.id as golongan_id,
    golongan.nama as golongan")
    ->join("golongan", "users.golongan_id = golongan.id")
    ->get("users");

//     SELECT master_user.user_id ,master_user.user_name ,pegawai.kolok  ,instansi.unit_id , instansi.nama
// FROM master_user
// JOIN pegawai ON master_user.user_id = pegawai.nip
// join instansi on pegawai.kolok = instansi.unit_id
// where master_user.user_id ='196101271986031011' and master_user.user_password = '89fa6381ba826051ade4a373eba5d567'
// order by instansi.unit_id

  }
public function golongan_get()
{
  return $this->db->select("id, nama as golongan")->get("golongan");
}
public function jabatan_get()
{
  return $this->db->select("id,nama as jabatan")->get("jabatan");
}
  public function pegawai_delete($id)
  {
    $this->db->delete('users', array('id' => $id));

  }
  // public function pegawai_get_byid($id)
  // {

  // }
  public function pegawai_update($data = array())
  {
    return $this->db->get('pegawai');

  }
}

?>
