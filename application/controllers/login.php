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
    // $this->template->set_error_view("error/login_error.php");
    $this->template->set_layout("layout/login_layout.php");
  }
  public function index()
  {
    // $instansi = $this->login_model->instansi()->result();
    if ($this->session->userdata('status') !='login') {
      $this->template->loadContent("login/index.php",
      array("msg" => 1,
    ));
  }else {
    redirect(site_url("client"));
  }

}
public function auth()
{
  // $instansi = $this->login_model->instansi()->result();
  $nip = $this->common->nohtml($this->input->post('nip'));
  $password = $this->common->nohtml($this->input->post('password'));

  $login = $this->login_model->getUser($nip,$password);
  if ($login->num_rows() == 0) {
    $login = $this->login_model->getSuperAdmin($nip,$password);
  } elseif ($login->num_rows() == 0) {
    $login = $this->login_model->getAdmin($nip,$password);
  }else {
    $this->template->loadContent("login/index.php", array("msg" => 0,
  ));
}

redirect(site_url("client"));
// $l = $login->row();

$data_session = array(
  'status' => 'login');
  $this->session->set_userdata($data_session);

  //   if ($loginNIP->num_rows() > 0) {
  //     $this->session->set_userdata($data_session);
  //     redirect(site_url("client"));
  //   }else {
  //     $this->template->loadContent("login/index.php", array("msg" => 0,
  //   ));
  // }
}
public function logout($value='')
{
  $this->session->sess_destroy();
  redirect(base_url('login'));
}
}
?>
