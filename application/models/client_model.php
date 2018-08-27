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
    return $this->db->get('pegawai');

  }
  public function pegawai_delete($id)
  {
    $this->db->delete('users', array('id' => $id));

  }
  public function pegawai_get_byid($id)
  {
    return $this->db->select("users.id,users.name,users.username,golongan.nama")
    			->join("golongan", "users.golongan_id = golongan.id")
    			->where("users.id", $id)
    			->get("users");
  }
  public function pegawai_update()
  {
    return $this->db->get('pegawai');

  }
}

?>
