<?php
/**
*
*/
class Client extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->template->set_error_view("error/login_error.php");
    $this->template->loadResponsiveSidebar("layout/sidebar");
    $this->template->set_layout("layout/client_layout.php");

  }
  public function index()
  {
      $this->template->loadContent("client/index.php", array());
  }
}

?>
