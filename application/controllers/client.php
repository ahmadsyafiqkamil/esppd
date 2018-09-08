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
    $name = $this->common->nohtml($this->input->post("nama"));
    $alamat = $this->common->nohtml($this->input->post("alamat"));
    $hukum = $this->common->nohtml($this->input->post("hukum"));
    $telp = $this->common->nohtml($this->input->post("telp"));
    $rek = $this->common->nohtml($this->input->post("rek"));
    $pos = $this->common->nohtml($this->input->post("pos"));
    $data = array(
      'nama' => $name,
      'alamat' => $alamat,
      'dasar_hukum' => $hukum,
      'no_telp' => $telp,
      'kode_pos' => $pos,
      'kode_rekening' => $rek,
      // 'logo' => $this->upload->data('full_path'),
    );

    if ($this->client_model->instansi_add($data)) {
      $this->template->loadContent("client/instansi.php", array(
        'msg' => "success"
      ));
    }else {
      $this->template->loadContent("client/instansi.php", array(
        'msg' => "tidak sukses"
      ));
    }
    //   $this->load->library('upload');
    //   $this->upload->initialize(array(
    //     "upload_path" => "./uploads/",
    //     "overwrite" => FALSE,
    //     "max_filename" => 300,
    //     "encrypt_name" => TRUE,
    //     "remove_spaces" => TRUE,
    //     "allowed_types" => "|jpg|png",
    //     // "max_size" => $this->settings->info->file_size,
    //   )
    // );
    //
    // if ( ! $this->upload->do_upload('logo' ))
    // {
    //   $error = array('error' => $this->upload->display_errors());
    //   $this->template->loadContent("client/instansi.php", array(
    //     'msg' => $error
    //   ));
    // }
    // else {
    //   // $data = array('upload_data' => $this->upload->data());
    //   $data = array(
    //     'nama' => $name,
    //     'alamat' => $alamat,
    //     'dasar_hukum' => $hukum,
    //     'no_telp' => $telp,
    //     'kode_pos' => $pos,
    //     'kode_rekening' => $rek,
    //     'logo' => $this->upload->data('full_path'),
    //   );
    //   if ($this->client_model->instansi_add($data)) {
    //     $this->template->loadContent("client/instansi.php", array(
    //       'msg' => "success"
    //     ));
    //   }else {
    //     $this->template->loadContent("client/instansi.php", array(
    //       'msg' => "tidak sukses"
    //     ));
    //   }
    // }
  }

  public function pegawai()
  {
    $pegawai = $this->client_model->pegawai_get();
    $golongan = $this->client_model->golongan_get();
    $jabatan = $this->client_model->jabatan_get();
    $this->template->loadContent("client/pegawai",array(
      'pegawai'=> $pegawai,
      'golongan'=>$golongan,
      'jabatan' =>$jabatan
    ));
  }

  public function pegawai_add($value='')
  {
    $id = $this->common->nohtml($this->input->post("id"));
    $nip = $this->common->nohtml($this->input->post("nip"));
    $nama =$this->common->nohtml($this->input->post("nama"));
    $golongan =$this->common->nohtml($this->input->post("golongan"));

  }
  public function pegawai_update($id)
  {
    $id = $this->common->nohtml($this->input->post("id"));
    $nip = $this->common->nohtml($this->input->post("nip"));
    $nama =$this->common->nohtml($this->input->post("nama"));
    $jabata =$this->common->nohtml($this->input->post("jabatan"));
    $golongan =$this->common->nohtml($this->input->post("golongan"));
    $alamat =$this->common->nohtml($this->input->post("alamat"));
    $this->client_model->pegawai_update($id);
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

  public function golongan_delete()
  {

  }
  public function golongan_add()
  {
    // code...
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
    $this->template->loadContent("client/usulan",array( ));
  }

  public function telaah()
  {
    $this->template->loadContent("client/telaah.php", array());
  }
  public function tugas()
  {
    $this->template->loadContent("client/tugas",array( ));
  }
  public function perjalanan()
  {
    $this->template->loadContent("client/perjalanan",array( ));
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
}
?>
