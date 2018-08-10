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
  public function instansi()
  {
    $this->template->loadContent("client/instansi.php", array());
  }
  public function pegawai()
  {
    $this->template->loadContent("client/pegawai",array( ));
  }
  public function golongan()
  {
    $this->template->loadContent("client/golongan",array( ));
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
}

?>
