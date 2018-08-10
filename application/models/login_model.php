<?php
/**
 *
 */
class Login_model extends CI_Model
{
  public function getUser($username,$password)
  {
    return $this->db->select("*")->
    where("username", $username)->where("password", $password)->get("user");
  }
}
 ?>
