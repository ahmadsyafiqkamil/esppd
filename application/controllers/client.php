<?php
/**
*
*/

// INSERT INTO master_user (a.user_id, a.user_password, a.user_name,  a.foto, b.nip, b.kolok)
// SELECT a.user_id, a.user_password, a.user_name,  a.foto, b.nip, b.kolok
// FROM master_user a
// INNER JOIN pegawai b ON a.user_id = b.nip
// INSERT INTO Table1 (Field1, Field2)
// SELECT a.Field1, b.Field2
// FROM TableA a
// INNER JOIN TableB b ON a.ID = b.ID

class Client extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->template->set_error_view("error/login_error.php");
    $this->template->loadResponsiveSidebar("layout/sidebar");
    $this->template->set_layout("layout/client_layout.php");

    $this->load->model("client_model");

  }
  public function index()
  {
    $this->template->loadContent("client/index.php", array());
  }
  public function instansi()
  {
    $this->template->loadContent("client/instansi.php", array(
      'msg' => "",
    ));
  }


  public function instansi_pro()
  {
    // $data = array();
    $logo = "";
    $name = $this->common->nohtml($this->input->post("nama"));
    $alamat = $this->common->nohtml($this->input->post("alamat"));
    $hukum = $this->common->nohtml($this->input->post("hukum"));
    $telp = $this->common->nohtml($this->input->post("telp"));
    $rek = $this->common->nohtml($this->input->post("rek"));
    $pos = $this->common->nohtml($this->input->post("pos"));

    $config['upload_path']    = './assets/upload';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['encrypt_name']   = TRUE;
    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('logo')) {
      $this->template->loadContent("client/instansi.php", array(
        'msg' => "data belum teruplod"
      ));
    }else {
      $file = $this->upload->data();
      $logo = $config['upload_path'] .$file['file_name'];

    }
    $data = array(
      'nama' => $name,
      'alamat' => $alamat,
      'dasar_hukum' => $hukum,
      'no_telp' => $telp,
      'kode_pos' => $pos,
      'kode_rekening' => $rek,
      'logo' => $logo,
    );
    if ($this->client_model->instansi_add($data)) {
      $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      $this->template->loadContent("client/instansi.php", array(

      ));
    }else {
      $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      $this->template->loadContent("client/instansi.php", array(

      ));
    }
  }

  public function pegawai()
  {
    $kolok = $this->session->userdata('kolok');
    $level = $this->session->userdata('level');
    if ($level == 'User') {
      $pegawai = $this->client_model->pegawai_get($kolok);
    }elseif ($level == 'SuperAdmin') {
      $pegawai = $this->client_model->pegawaiSA_get($kolok);
    }else {
      // admin
    }
    $instansi = $this->client_model->instansi_get();
    $this->template->loadContent("client/pegawai",array(
      'pegawai'=> $pegawai,
      'instansi' =>$instansi,
      'msg' => 3
    ));
  }

  public function pegawai_add()
  {

    $kolok = $this->session->userdata('kolok');
    $pegawai = $this->client_model->pegawai_get($kolok);
    $instansi = $this->client_model->instansi_get();

    $nip = $this->common->nohtml($this->input->post("nip"));
    $nama =$this->common->nohtml($this->input->post("nama"));
    $password =$this->common->nohtml($this->input->post("password"));
    $instansi =$this->common->nohtml($this->input->post("instansi"));

    $config['upload_path']    = './assets/upload';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['encrypt_name']   = TRUE;
    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('foto')) {
      $this->template->loadContent("client/pegawai", array(
        'msg' => "data belum teruplod"
      ));
    }else {
      $file = $this->upload->data();
      $foto = $config['upload_path'] .$file['file_name'];
    }
    $datauser = array(
      'user_id' => $nip,
      'user_name' => $nama,
      'user_password' => md5($password),
      'foto' => $foto,
    );
    $datapegawai = array(
      'nip18' =>$nip,
      'nip' => $nip,
      'kolok' => $instansi,
    );
    // $this->client_model->pegawai_add($nip,$nama,$password,$instansi,$foto);
    $q = $this->client_model->pegawai_add($datauser,$datapegawai);
    if ($q) {
      redirect('client/pegawai');
    }else {
      $this->template->loadContent("client/pegawai",array(
        'pegawai'=> $pegawai,
        'instansi' =>$instansi,
        'msg' => 0,
      ));
    }

  }
  public function pegawai_update()
  {

    $nip = $this->common->nohtml($this->input->post("nip"));
    $nama =$this->common->nohtml($this->input->post("nama"));
    $password =$this->common->nohtml($this->input->post("password"));
    $instansi =$this->common->nohtml($this->input->post("instansi"));

    $config['upload_path']    = './assets/upload';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['encrypt_name']   = TRUE;
    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('foto')) {
      $this->template->loadContent("client/instansi.php", array(
        'msg' => "data belum teruplod"
      ));
    }else {
      $file = $this->upload->data();
      $foto = $config['upload_path'] .$file['file_name'];
    }
    $datauser = array(
      'user_id' => $nip,
      'user_name' => $nama,
      'user_password' => md5($password),
      'foto' => $foto,
    );
    $datapegawai = array(
      'nip18' =>$nip,
      'nip' => $nip,
      'kolok' => $instansi,
    );
    $this->client_model->pegawai_update($datauser,$datapegawai,$nip);

    redirect('client/pegawai');
  }

  public function pegawai_delete($id)
  {

    $this->client_model->pegawai_delete($id);
  }
  public function golongan()
  {
    $golongan = $this->client_model->golongan_get();
    $this->template->loadContent("client/golongan",array(
      'golongan'=>$golongan

    ));
  }
  public function golongan_update()
  {
    $id = $this->common->nohtml($this->input->post("id"));
    $golongan = $this->common->nohtml($this->input->post("golongan"));
  }

  public function golongan_delete($nip)
  {
    $this->client_model->pegawai_delete($nip);
  }
  public function golongan_add()
  {

  }

  public function transport()
  {
    $this->template->loadContent("client/transport.php", array());
  }
  public function ttd()
  {
    $this->template->loadContent("client/ttd",array( ));
  }
  public function usulan()
  {
    $level = $this->session->userdata('level');

    if ($level == 'User') {
      $usulan = $this->client_model->datausulan_get();
      $biayalain = $this->client_model->biayalain();
      $this->template->loadContent("client/usulan",array(
        'usulan' =>$usulan,
        'biayalain' =>$biayalain));

      }elseif ($level == 'SuperAdmin') {
        $usulan = $this->client_model->datausulan_get();
        $biayalain = $this->client_model->biayalain();
        $this->template->loadContent("client/usulan",array(
          'usulan' =>$usulan,
          'biayalain' =>$biayalain));

        }else {
          // admin
        }

      }

      public function telaah()
      {
        $telaah = $this->client_model->datatelaah();
        // $sppd = $this->client_model->dataSPPD();
        $this->template->loadContent("client/telaah.php", array(
          'telaah' => $telaah,
          // 'sppd' => $sppd,
      ));
    }
    public function tugas()
    {
      $data = $this->client_model->spt();
      $instansi = $this->client_model->instansi_get();

      $this->template->loadContent("client/tugas",array(
        'dataSPPD' => $data,
        'instansi' => $instansi,

      ));
    }
    public function perjalanan()
    {
      $data = $this->client_model->sppd();
      $this->template->loadContent("client/perjalanan",array(
        'sppd' => $data,
      ));
    }

    public function kwitansi()
    {
      $this->template->loadContent("client/kwitansi.php", array());
    }
    public function riil()
    {
      $this->template->loadContent("client/riil",array( ));
    }
    public function rtahun()
    {
      $this->template->loadContent("client/rekap-tahunan",array( ));
    }
    public function rbulan()
    {
      $this->template->loadContent("client/rekap-bulanan",array( ));
    }
    public function log()
    {
      $this->template->loadContent("client/log",array( ));
    }
    public function tambah_nota()
    {
      $this->template->loadContent("client/tambah-nota",array( ));
    }

    public function biaya()
    {
      // code...
    }
  }
  ?>
