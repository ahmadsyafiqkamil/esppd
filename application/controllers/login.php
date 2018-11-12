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
      $this->template->loadContent("login/index.php",array());
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
        // 'id_instansi' => $loginUser->id_instansi,
        'id_instansi' => 52,
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
          'nip'=> 'SuperAdmin',
          'user_level' =>$loginSA->user_level,
          'nama'=> $loginSA->user_name,
          // 'id_instansi'=> '52',
          'id_instansi' => 52,
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
            'nip'=> 'Admin',
            'user_level' =>$loginAdmin->level,
            'instansi'=> $loginAdmin->instansi,
            // 'id_instansi' => $loginAdmin->id_instansi,
            'id_instansi' => 52,
            'status' => 'login');
            $this->session->set_userdata($data_session);
            redirect(site_url("client"));
          }else {

            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-styled-left alert-bordered">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Gagal Login</span>
            </div>');
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
