<?php
/**
*
*/
class Login extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("login_model");
    $this->template->set_error_view("error/login_error.php");
    $this->template->set_layout("layout/login_layout.php");
  }
  public function index()
  {
    $this->template->loadContent("login/index.php", array());
  }
  public function auth()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('$password');
    $result = $this->login_model->getUser($username,$password);
    if ($result->num_rows()==0) {
      redirect(site_url("client"));
    }else {
      redirect(site_url());
    }
  }

}
?>
