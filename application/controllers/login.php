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
  // $data_session = array();
  $nip = $this->common->nohtml($this->input->post('nip'));
  $password = $this->common->nohtml($this->input->post('password'));

  $loginUser = $this->login_model->getUser($nip,$password);
  if ($loginUser->num_rows() > 0) {
    $loginUser=$loginUser->row();
    $data_session = array(
      'level' => 'User',
      'user_level' =>$loginUser->level,
      'nip'=> $loginUser->nip_pegawai,
      'nama' => $loginUser->nama_pegawai,
      'instansi'=>$loginUser->nama_instansi,
      'kolok' =>$loginUser->kolok_pegawai,
      'status' => 'login');
      $this->session->set_userdata($data_session);
      redirect(site_url("client"));
    }
    // else {
    //   redirect('login');
    // }

    $loginSA = $this->login_model->getSuperAdmin($nip,$password);
    if ($loginSA->num_rows() > 0) {
      $loginSA = $loginSA->row();
      $data_session = array(
        'level' => 'SuperAdmin',
        'user_level' =>$loginSA->user_level,
        'nama'=> $loginSA->user_name,
        'status' => 'login');
        $this->session->set_userdata($data_session);
        redirect(site_url("client"));
      }
      // else {
      //   redirect('login');
      // }

      $loginAdmin = $this->login_model->getAdmin($nip,$password);
      if ($loginAdmin->num_rows() > 0) {
        $loginAdmin =$loginAdmin->row();
        $data_session = array(
          'level' => 'Admin',
          'nama' => $loginAdmin->user,
          'user_level' =>$loginAdmin->level,
          'instansi'=> $loginAdmin->instansi,
          'status' => 'login');
          $this->session->set_userdata($data_session);
          redirect(site_url("client"));
        }else {
          redirect('login');
        }
      }


      public function logout()
      {
        $this->session->sess_destroy();
        redirect(base_url('login'));
      }
    }
    ?>
