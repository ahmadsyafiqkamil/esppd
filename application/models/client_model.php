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
}

?>
