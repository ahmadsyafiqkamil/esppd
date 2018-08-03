<?php
/**
*
*/
class Register extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->template->set_error_view("error/login_error.php");
    $this->template->set_layout("layout/login_layout.php");
  }
  public function index()
  {
    $this->template->loadContent("register/index.php", array());
  }
}
?>
