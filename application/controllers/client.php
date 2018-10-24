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
    // $this->load->library('Pdf');
    $this->load->library('m_pdf');
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
      $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
      $pegawai = $this->client_model->pegawaiSA_get();
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
      public function usulan_baru()
      {
        $level = $this->session->userdata('level');

        if ($level == 'User') {
          $usulan = $this->client_model->usulan_baru();
          $biayalain = $this->client_model->biayalain();
          $this->template->loadContent("client/usulan_baru",array(
            'usulan' =>$usulan,
            'biayalain' =>$biayalain));

          }elseif ($level == 'SuperAdmin') {
            $usulan = $this->client_model->usulan_baru();
            $biayalain = $this->client_model->biayalain();
            $this->template->loadContent("client/usulan_baru",array(
              'usulan' =>$usulan,
              'biayalain' =>$biayalain));

            }else {
              // admin
            }
          }

          public function telaah()
          {
            $sppd_belum_ditelaah = $this->client_model->sppd_belum_ditelaah();
            $telaah_staf = $this->client_model->telaah();
            $this->template->loadContent("client/telaah.php", array(
              'telaah' => $sppd_belum_ditelaah,
              'telaah_staf' => $telaah_staf,
            ));
          }

          public function telaah_baru()
          {

            $telaah_staf = $this->client_model->telaah();
            $this->template->loadContent("client/telaah_staf.php", array(
              'telaah_staf' => $telaah_staf,
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
            $kwitansi = $this->client_model->kwitansi();
            $this->template->loadContent("client/kwitansi.php", array(
              'kwitansi' =>$kwitansi,
            ));
          }
          // public function riil()
          // {
          //   $kwitansi = $this->client_model->kwitansi();
          //   $this->template->loadContent("client/riil",array(
          //   'kwitansi' =>$kwitansi
          // ));
          // }
          public function laporan()
          {
            $kwitansi = $this->client_model->kwitansi();
            $this->template->loadContent("client/laporan",array(
              'kwitansi' => $kwitansi
            ));
          }
          public function laporan_anggaran()
          {
            $this->template->loadContent("client/laporan_anggaran",array(

            ));
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
            $kolok = $this->session->userdata('kolok');
            $level = $this->session->userdata('level');
            $provinsi = $this->client_model->provinsi();
            $kota = $this->client_model->kota();
            $ttd = $this->client_model->ttd();
            $jns_transport = $this->client_model->jenis_transport();
            $biayalain = $this->client_model->nota_biaya_lain();

            if ($level == 'User') {
              $pegawai = $this->client_model->pegawai_get($kolok);
            }elseif ($level == 'SuperAdmin') {
              $pegawai = $this->client_model->pegawaiSA_get();
            }else {
              // admin
            }
            $this->template->loadContent("client/tambah-nota",array(
              'pegawai' => $pegawai,
              'provinsi' => $provinsi,
              'kota' => $kota,
              'ttd' => $ttd,
              'jenis_transport' => $jns_transport,
              'biaya_lain' =>$biayalain
            ));
          }

          public function tambah_usulan()
          {
            $jumlah_pegawai = 0;
            $jumlah_pegawai_pengikut = 0;
            $tipe_perjalanan_dinas = $this->input->post("tipe_perjalanan_dinas");
            $id_instansi = $this->session->userdata('id_instansi');
            $pegawai = $this->input->post("jenis_input");
            $pegawai_pengikut = $this->input->post("nama_pegawai_pengikut");
            $provinsi_berangkat = $this->input->post("prov_berangkat");
            $kota_berangkat = $this->input->post("kota_berangkat");

            $provinsi_tujuan = $this->input->post("prov_tujuan");
            $kota_tujuan = $this->input->post("kota_tujuan");

            $master_ttd = $this->input->post("pptk");
            $jns_transport = $this->input->post("transport");
            $mata_anggaran = $this->input->post("anggaran");
            $rbbiayalain = $this->input->post('blain');
            $biayalain = $this->input->post('biayalain');
            $perihal = $this->input->post("perihal");
            $tgl_brgt = date_create($this->input->post("mulai_tanggal"));
            $tgl_plg  = date_create($this->input->post("selesai_tanggal"));
            $tanggal_berangkat = date_format($tgl_brgt,'Y/m/d');
            $tanggal_pulang =date_format($tgl_plg,'Y/m/d');
            $tanggal_selesai = strtotime($tanggal_pulang);
            $tanggal_mulai   = strtotime($tanggal_berangkat);
            $diff            = $tanggal_selesai - $tanggal_mulai;
            $selisih_hari         = floor($diff / (60 * 60 * 24));

            $dataSPPD = array(
              "instansi_id"        => $id_instansi,
              "kota_id"            => $kota_tujuan,
              "berangkat_dari"     => $kota_berangkat,
              "jenis_transport_id" => $jns_transport,
              "mata_anggaran"      => $mata_anggaran,
              "tugas"              => $perihal,
              "tanggal_mulai"      => $tanggal_berangkat,
              "tanggal_selesai"    => $tanggal_pulang,
              "lama"               => $selisih_hari,
              "is_kegiatan"        => $tipe_perjalanan_dinas,
              "master_ttd_id"      => $master_ttd
            );

            $q = $this->client_model->tambah_sppd($dataSPPD);

            $noKwi = $this->client_model->idKwitansi()->row();
            $noKwFix  = $noKwi->id + 1;

            $id_sppd =$this->client_model->ambilSPPDid()->row();

            if ($selisih_hari == 0 ) {
              $selisih_hari = 1;
            }else {
              $selisih_hari;
            }

            $total_biaya_transport =0;
            $total_biaya_hotel =0;
            $total_biaya_pegawai_usulan = 0;
            // $idKwi = $this->client_model->idKwitansi()->row();
            foreach ($pegawai as $key => $j) {
              $biaya_transport = 0;
              $biaya_hotel = 0;
              $dataDetilSPPD = array(
                "nip"     => $j,
                "sppd_id"     => $id_sppd->id,
                "kwitansi_id" => $noKwFix,
                "is_setujui"  => 0, );
                $this->client_model->tambah_detil_sppd($dataDetilSPPD);

                $eselon = $this->client_model->eselon_pegawai($j);
                $eselon = $this->client_model->eselon_pegawai($j)->row();
                $biaya_transport_eselon = $this->client_model->biaya_transport_eselon($eselon->eselon,$jns_transport)->row()->jumlah;


                $biaya_hotel_eselon = $this->client_model->biaya_hotel_eselon($eselon->eselon)->row()->jumlah;
                $biaya_hotel_pereselon= $biaya_hotel_eselon*$selisih_hari;


                $total_biaya_hotel = $total_biaya_hotel+$biaya_hotel_pereselon;
                $total_biaya_transport = $total_biaya_transport+$biaya_transport_eselon;
                $biaya_lupsum_dinas = $this->client_model->lupsum_dinas($kota_tujuan)->row()->jumlah * $selisih_hari;

                $data_detil_kwitansi = array(
                  'kwitansi_id' => $noKwFix,
                  'biaya_harian_id' =>$kota_tujuan,
                  'biaya_transport_id' =>$jns_transport,
                  'jumlah_harian' =>$selisih_hari,
                  'jumlah_transport' =>$selisih_hari,
                  'jumlah_hotel' =>$selisih_hari,
                  'subtotal_harian'=>$biaya_lupsum_dinas,
                  'subtotal_transport' =>$total_biaya_transport,
                  'subtotal_hotel' =>$total_biaya_hotel,
                  'nip'=>$j
                );
                $this->client_model->tambah_detil_kwintasi($data_detil_kwitansi);
              }
              $total_biaya_pegawai_usulan = $total_biaya_transport+$total_biaya_hotel+$biaya_lupsum_dinas;

              // echo "total transport ".$idKwi->id."<br>";
              // echo "total transport ".$total_biaya_transport."<br>";
              // echo "total hotel ".$total_biaya_hotel."<br>";
              // echo "total lupsum ".$biaya_lupsum_dinas."<br>";

              $total_biaya_pegawai_pengikut = 0;
              foreach ($pegawai_pengikut as $key => $j) {
                $data_pegawai_pengikut = array(
                  "nip"     => $j,
                  "sppd_id"     => $id_sppd->id,
                  "kwitansi_id" => $noKwFix,
                  "is_setujui"  => 0, );
                  $this->client_model->tambah_pegawai_pengikut($data_pegawai_pengikut);

                  $eselon = $this->client_model->eselon_pegawai($j);
                  $eselon = $this->client_model->eselon_pegawai($j)->row();
                  $biaya_transport_eselon = $this->client_model->biaya_transport_eselon($eselon->eselon,$jns_transport)->row()->jumlah;


                  $biaya_hotel_eselon = $this->client_model->biaya_hotel_eselon($eselon->eselon)->row()->jumlah;
                  $biaya_hotel_pereselon= $biaya_hotel_eselon*$selisih_hari;


                  $total_biaya_hotel = $total_biaya_hotel+$biaya_hotel_pereselon;
                  $total_biaya_transport = $total_biaya_transport+$biaya_transport_eselon;
                  $biaya_lupsum_dinas = $this->client_model->lupsum_dinas($kota_tujuan)->row()->jumlah * $selisih_hari;

                  $data_detil_kwitansi = array(
                    'kwitansi_id' => $noKwFix,
                    'biaya_harian_id' =>$kota_tujuan,
                    'biaya_transport_id' =>$jns_transport,
                    'jumlah_harian' =>$selisih_hari,
                    'jumlah_transport' =>$selisih_hari,
                    'jumlah_hotel' =>$selisih_hari,
                    'subtotal_harian'=>$biaya_lupsum_dinas,
                    'subtotal_transport' =>$total_biaya_transport,
                    'subtotal_hotel' =>$total_biaya_hotel,
                    'nip'=>$j
                  );
                  $this->client_model->tambah_detil_kwintasi($data_detil_kwitansi);

                }
                $total_biaya_pegawai_pengikut = $total_biaya_hotel+$total_biaya_transport+$biaya_lupsum_dinas;

                $total_biaya_lain = 0;
                if ($rbbiayalain = 1) {
                  foreach ($biayalain as $key => $j) {

                    $data_biaya_lain = $this->client_model->jumlah_biaya_lain($j)->row()->jumlah;
                    $biaya_lain_satuan = $selisih_hari * $data_biaya_lain;
                    $data_detil_kwitansi_biaya_lain = array(
                      "kwitansi_id"   => $noKwFix,
                      "biaya_lain_id" => $j,
                      "jumlah"        => $selisih_hari,
                      "subtotal"      => $biaya_lain_satuan,
                    );
                    $total_biaya_lain = $total_biaya_lain+$biaya_lain_satuan;
                    $this->client_model->tambah_biaya_lain($data_detil_kwitansi_biaya_lain);

                  }

                }
                $total_biaya = $total_biaya_pegawai_usulan+$total_biaya_pegawai_pengikut+$total_biaya_lain;
                $no_kwit  = $noKwFix . "/kwitansi/SPPD/" .date_format($tgl_brgt,'m') . "/" . date_format($tgl_brgt,'Y');
                $datakwi = array(
                  "no_kwitansi" => $no_kwit,
                  "tanggal"     => date('Y-m-d'),
                  "status"      => 0,
                  'total_uang' =>$total_biaya
                );
                $this->client_model->tambah_kwitansi($datakwi);

                $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('client/usulan_baru');
              }

              public function tambah_nota_pegawai_diusulkan($arr_data){

                $list_pegawai_diusulkan = $this->client_model->pegawai_get_pegawai_diusulakan_sementara($arr_data);
                // $this->template->loadContent("client/usulan",array(
                // '$list_pegawai_diusulkan' =>$list_pegawai_diusulkan));

                $this->load->view('client/tambah-nota_pegawai_diusulkan',array(
                  'list_pegawai_diusulkan' =>$list_pegawai_diusulkan));
                  // $this->template->loadContent('client/tambah-nota_pegawai_diusulkan' ,array( ));
                }
                public function tambah_nota_pegawai_diusulkan_tambah_array($nip){
                  $data = array($nip);
                  $this->session->set_userdata($data);
                  $this->load->view('client/tambah_nota_pegawai_diusulkan_tambah_array',array(
                    'nip' =>$nip));
                  }

                  public function setuju_sppd($id)
                  {
                    $data = array('status' => 2, );
                    $data_telaah = array('status' => 1, );
                    $id_sppd = $this->client_model->ambilSPPDid()->row();
                    $this->client_model->update_status_sppd($data,$id_sppd->id);

                    $this->client_model->setuju_telaah($data_telaah,$id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Usulan Perjalanan Di Setujui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/telaah_baru');
                  }
                  public function tolak_sppd($id)
                  {
                    $data = array('status' => 3, );
                    $data_telaah = array('status' => 2, );
                    $id_sppd = $this->client_model->ambilSPPDid()->row();
                    $this->client_model->update_status_sppd($data,$id_sppd->id);
                    $this->client_model->tolak_telaah($data_telaah,$id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert"> Usulan Perjalanan Di Tolak <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/telaah_baru');
                  }
                  public function lihat_telaah($id)
                  {
                    // echo $id;
                    $data_pegawai_usul = $this->client_model->data_pegawai_usul_sppd($id);
                    $data_pegawai_pengikut = $this->client_model->data_pegawai_ikut_sppd($id);
                    $data_sppd = $this->client_model->telaah_sppd($id)->row();
                    $this->template->loadContent('client/lihat_telaah' ,array(
                      'data_sppd' =>$data_sppd,
                      'pegawai_diusulkan' =>$data_pegawai_usul,
                      'pegawai_pengikut' =>$data_pegawai_pengikut,
                    ));
                  }
                  public function input_telaah($id)
                  {
                    $perihal = $this->input->post('perihal');
                    $staff = $this->session->userdata('nip');
                    $sppd = $this->client_model->dataSPPD($id)->row();

                    $data_telaah = array(
                      'perihal' => $perihal,
                      'status' => 0,
                      'tanggal_mulai' => $sppd->tanggal_mulai,
                      'tanggal_selesai' => $sppd->tanggal_selesai,
                      'staf_penelaah' => $staff,
                      'tanggal'=> date("Y-m-d"),
                      'sppd_id' => $sppd->id,
                    );
                    $this->client_model->tambah_telaah($data_telaah);
                    $telaah_id = $this->client_model->telaah_id()->row();
                    $update_status_sppd = array(
                      'telaah_id' => $telaah_id->id,
                      'status' => 1
                    );
                    $this->client_model->update_status_sppd($update_status_sppd,$sppd->id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Usulan telah ditelaah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/telaah_baru');
                  }
                  public function tambahSPT()
                  {
                    $id = $this->input->post('id');
                    $no_spt = $this->input->post('spt');
                    // echo $id;
                    // echo $no_spt;
                    $update_spt = array('no_spt' => $no_spt, );
                    $update_sppd = array('no_sppd' => $no_spt, );
                    $this->client_model->update_spt($update_spt,$id);
                    $this->client_model->update_sppd($update_sppd,$id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> No SPT Sudah Terbit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/telaah_baru');
                  }

                  public function biaya()
                  {
                    $provinsi = $this->client_model->ambil_provinsi();
                    $kota = $this->client_model->ambil_kota();
                    $biaya_transport = $this->client_model->master_biaya_transport();
                    $biaya_lain = $this->client_model->ambil_biaya_lain();
                    $lupsum = $this->client_model->lupsum();
                    $hotel = $this->client_model->biaya_hotel();

                    $transport = $this->client_model->transport();
                    $eselon = $this->client_model->eselon();
                    $this->template->loadContent('client/biaya',array(
                      'provinsi' => $provinsi,
                      'kota' => $kota,
                      'biaya_transport' =>$biaya_transport,
                      'biaya_lain' =>$biaya_lain,
                      'lupsum' =>$lupsum,
                      'hotel' =>$hotel,
                      'transport' =>$transport,
                      'eselon' => $eselon
                    ));
                  }
                  public function tambah_provinsi()
                  {
                    $provinsi = $this->input->post("nama");
                    $data = array('nama' => $provinsi );
                    $this->client_model->tambah_data_provinsi($data);

                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/biaya');
                  }
                  public function tambah_kota_tujuan()
                  {
                    $kota = $this->input->post("nama");
                    $data = array('nama' => $kota );
                    $this->client_model->tambah_data_kota($data);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/biaya');
                  }
                  public function tambah_transportasi()
                  {
                    $transport = $this->input->post("transport");
                    $eselon = $this->input->post("eselon");
                    $jumlah = $this->input->post("jumlah");
                    // $kota = $this->input->post("kota");
                    $data = array(
                      'jenis_transport_id' => $transport,
                      'id_eselon' =>$eselon,
                      'jumlah' =>$jumlah,
                      // 'kota_id' =>$kota
                    );
                    $this->client_model->tambah_biaya_transport($data);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/biaya');
                  }
                  public function tambah_biaya_lain_lain()
                  {
                    $nama = $this->input->post("nama");
                    $nominal = $this->input->post("nominal");
                    $keterangan = $this->input->post("keterangan");

                    $data = array(
                      'nama' => $nama,
                      'jumlah' =>$nominal,
                      'ket' =>$keterangan,

                    );
                    $this->client_model->tambah_biaya_lain_lain($data);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/biaya');
                  }

                  public function tambah_lupsum()
                  {
                    $kota = $this->input->post("kota");
                    $nominal = $this->input->post("nominal");

                    $data = array(
                      'kota_id' => $kota,
                      'jumlah' =>$nominal,

                    );
                    $this->client_model->tambah_lupsum($data);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/biaya');
                  }
                  public function tambah_biaya_hotel()
                  {
                    $eselon = $this->input->post("eselon");
                    // $kota = $this->input->post("kota");
                    $nominal = $this->input->post("nominal");

                    $data = array(
                      'id_eselon' =>$eselon,
                      // 'kota_id' => $kota,
                      'jumlah' =>$nominal,

                    );
                    $this->client_model->tambah_hotel($data);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/biaya');
                  }
                  public function detil_kwitansi($id)
                  {
                    $data_kwitansi = $this->client_model->detil_kwitansi($id)->row();
                    $data_detil_kwitansi = $this->client_model->data_detil_kwitansi($id)->result();
                    $data_detil_kwitansi_biaya_lain = $this->client_model->data_detil_kwitansi_biaya_lain($id)->result();
                    $this->template->loadContent('client/detil_kwitansi',array(
                      'data_kwitansi' => $data_kwitansi,
                      'data_detil_kwitansi' =>$data_detil_kwitansi,
                      'data_detil_kwitansi_biaya_lain' =>$data_detil_kwitansi_biaya_lain
                    ));
                  }
                  public function tolak_kwitansi($id)
                  {
                    $data = array('status' => 0, );
                    $this->client_model->update_status_kwitansi($data,$id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-warning" role="alert"> Kwitansi di tolak <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/kwitansi');

                  }
                  public function setuju_kwitansi($id)
                  {
                    $data = array('status' => 1, );
                    $this->client_model->update_status_kwitansi($data,$id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Kwitansi disetujui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('client/kwitansi');

                  }
                  public function hapus_spt($id)
                  {

                  }
                  public function cetak_spt($id)
                  {
                    $data = [];
                    $print = $this->load->view('print/spt', $data, true);
                    $this->m_pdf->pdf->WriteHTML($print);
                    $this->m_pdf->pdf->Output();
                  }
                  public function cetak_sppd($id)
                  {
                    // code...
                  }
                  public function hapus_sppd($value='')
                  {
                    // code...
                  }
                  public function detail_kwitansi($id)
                  {
                    $this->template->loadContent('client/detil_kwitansi');
                  }

                  public function coba_print()
                  {
                    $data = [];
                    //load the view and saved it into $html variable
                    $html=$this->load->view('welcome_message', $data, true);

                    //this the the PDF filename that user will get to download
                    $pdfFilePath = "output_pdf_name.pdf";

                    //load mPDF library


                    //generate the PDF from the given html
                    $this->m_pdf->pdf->WriteHTML($html);

                    //download it.
                    // $this->m_pdf->pdf->Output($pdfFilePath, "D");
                    $this->m_pdf->pdf->Output();
                  }

                }
                ?>
