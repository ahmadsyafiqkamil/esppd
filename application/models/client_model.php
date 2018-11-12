<?php
/**
*
*/
class Client_Model extends CI_Model
{
  public function instansi_add($data = array())
  {
    $this->db->insert('instansi', $data);
    return $this->db->insert_id();
  }
  public function pegawai_get_pegawai_diusulakan_sementara($arr_data)
  {
    return  $this->db->select("master_user.user_id as nip_pegawai,
    master_user.user_name as nama_pegawai ,
    pegawai.kolok as kolok_pegawai ,
    instansi.unit_id as id_instansi,
    instansi.nama as nama_instansi")
    ->join("pegawai", "master_user.user_id = pegawai.nip ")
    ->join("instansi", "pegawai.kolok = instansi.unit_id  ")
    ->where_in('pegawai.nip', $arr_data)
    ->get("master_user");
  }
  public function pegawai_get($kolok)
  {
    return  $this->db->select("master_user.user_id as nip_pegawai,
    master_user.user_name as nama_pegawai ,
    pegawai.kolok as kolok_pegawai ,
    instansi.unit_id as id_instansi,
    instansi.nama as nama_instansi")
    ->join("pegawai", "master_user.user_id = pegawai.nip ")
    ->join("instansi", "pegawai.kolok = instansi.unit_id  ")
    ->where('pegawai.kolok ', $kolok)
    ->get("master_user");
  }
  public function pegawaiSA_get()
  {
    return  $this->db->select("master_user.user_id as nip_pegawai,
    master_user.user_name as nama_pegawai ,
    pegawai.kolok as kolok_pegawai ,
    instansi.unit_id as id_instansi,
    instansi.nama as nama_instansi")
    ->join("pegawai", "master_user.user_id = pegawai.nip ")
    ->join("instansi", "pegawai.kolok = instansi.unit_id  ")
    ->get("master_user");
  }
  public function pegawai_update($datauser,$datapegawai,$id)
  {
    $this->db->where('user_id', $id);
    $this->db->update('master_user', $datauser);

    $this->db->where('nip18', $id);
    $this->db->update('pegawai', $datapegawai);
  }

  public function pegawai_add($datauser,$datapegawai)
  {
    $q = $this->db->insert('master_user',$datauser);
    $q2 = $this->db->insert('pegawai',$datapegawai);

    if ($q && $q2 ) {
      return TRUE;
    }else {
      return false;
    }
  }
  public function instansi_get()
  {
    return $this->db->select('*')
    ->get('instansi');
  }
  public function golongan_get()
  {
    return $this->db->select("id, nama as golongan")->get("golongan");
  }
  public function jabatan_get()
  {
    return $this->db->select("id,nama as jabatan")->get("jabatan");
  }
  public function pegawai_delete($id)
  {
    $this->db->delete('users', array('id' => $id));

  }
  public function datausulan_get()
  {
    return $this->db->select('
    sppd.id as id_sppd,
    detil_sppd.user_id as id_pengguna,
    kota.nama as nama_kota,
    sppd.is_kegiatan as kegiatan,
    sppd.tugas as tugas,
    sppd.status as status_sppd,
    sppd.is_telaah as sppd_telaah,
    sppd.no_spt as spt_sppd')
    ->join("kota", "sppd.kota_id = kota.id")
    ->join("detil_sppd", "detil_sppd.sppd_id = sppd.id")
    ->join("kwitansi", "kwitansi.id = detil_sppd.kwitansi_id")
    ->get("sppd");
  }
  public function usulan_baru($id_instansi)
  {
    return $this->db->select('
    sppd.id as id_sppd,
    kota.nama as nama_kota,
    	instansi.nama as instansi,
    sppd.is_kegiatan as kegiatan,
    sppd.tugas as tugas,
    sppd.status as status_sppd,
    sppd.is_telaah as sppd_telaah,
    sppd.no_spt as spt_sppd')
    ->join("kota", "sppd.kota_id = kota.id")
    ->join("instansi", "instansi.id = sppd.instansi_id")
    ->where("instansi.id",$id_instansi)
    ->get("sppd");
  }

  public function biayalain()
  {
    return $this->db->select('*')
    ->join("kwitansi", "detil_kwitansi_biaya_lain.id = kwitansi.id")
    ->get("detil_kwitansi_biaya_lain");
  }
  public function telaah($id_instansi)
  {
    return $this->db->select('telaah_staf.perihal as perihal, telaah_staf.status as status, telaah_staf.tanggal_mulai as tanggal_mulai, telaah_staf.tanggal_selesai as tanggal_selesai, telaah_staf.tanggal')
    ->where('telaah_staf.status ',0 )
    ->where('instansi.id',$id_instansi )
    ->join("sppd", "sppd.telaah_id = telaah_staf.id")
    ->join("instansi", "instansi.id = sppd.instansi_id")
    ->get('public.telaah_staf');
  }
  public function datatelaah()
  {
    return $this->db->select('telaah_staf.id as id_telaah_staf, sppd.id as id_sppd ,telaah_staf.perihal as perihal_telaah,
    telaah_staf.status as status_telaah, telaah_staf.tanggal_mulai as tanggal_mulai_telaah,
    telaah_staf.tanggal_selesai as tanggal_selesai_telaah, telaah_staf.tanggal as tanggal_telaah,
    telaah_staf.deleted_at, telaah_staf.bidang, telaah_staf.tujuan, telaah_staf.sppd_id,
    sppd.instansi_id, sppd.kota_id, sppd.berangkat_dari, telaah_id, jenis_transport_id,
    no_sppd, no_spt as spt_sppd, mata_anggaran, tugas , sppd.tanggal_mulai, sppd.tanggal_selesai,
    sppd.lama, sppd.status, sppd.is_kegiatan, sppd.created_at, sppd.updated_at, sppd.deleted_at,
    sppd.is_telaah, sppd.bidang, sppd.master_ttd_id')
    ->join("telaah_staf", "telaah_staf.sppd_id = sppd.id")
    // ->where('sppd.status',0)
    ->get('public.sppd');
  }
  public function spt($instansi)
  {
    return $this->db->select('
    sppd.id as id_sppd,
    sppd.no_spt as no_spd,
    array_to_json(array_agg(master_user.user_name )) as nama_pegawai,
    kota.nama as nama_kota ,
    sppd.tugas as tugas
    ')
    ->join("kota", "sppd.kota_id = kota.id")
    ->join("detil_sppd", "detil_sppd.sppd_id = sppd.id")
    ->join("kwitansi", "kwitansi.id = detil_sppd.kwitansi_id")
    ->join("master_user","master_user.user_id = detil_sppd.nip")
    ->order_by("no_spd")
    ->group_by(' sppd.id,sppd.no_spt,kota.nama,sppd.tugas')
    ->where('sppd.no_spt IS not NULL', null, false)
    ->where('sppd.instansi_id', $instansi)
    ->get("sppd");
  }


  public function sppd($instansi)
  {
    return $this->db->select('
    sppd.id as id_sppd,
    sppd.no_spt as no_spd ,
    sppd.tugas as tugas ,
    kota.nama as nama_kota ,
    sppd.mata_anggaran as mata_anggaran
    ')
    ->join("kota", "sppd.kota_id = kota.id")
    ->join("detil_sppd", "detil_sppd.sppd_id = sppd.id")
    ->join("kwitansi", "kwitansi.id = detil_sppd.kwitansi_id")
    ->join("master_user","master_user.user_id = detil_sppd.nip")
    ->order_by("no_spd")
    ->group_by(' id_sppd,sppd.no_spt,kota.nama,sppd.tugas,sppd.mata_anggaran')
    ->where('sppd.no_spt IS not NULL', null, false)
    ->where('sppd.instansi_id', $instansi)
    ->get("sppd");
  }
  public function sppd_belum_ditelaah()
  {
    return $this->db->select('*')
    ->where('status',0)
    ->get('sppd');
  }
  public function provinsi()
  {
    return $this->db->select('*')
    ->get('provinsi');
  }
  public function kota()
  {
    return $this->db->select('*')
    ->get('kota');
  }
  public function ttd()
  {
    return $this->db->select('master_ttd.id as id_ttd,master_ttd.nip as nip_pegawai, master_user.user_name as nama_pegawai')
    ->where('jenis_ttd','PPTK')
    ->join("master_user","master_ttd.nip = master_user.user_id")
    ->get('master_ttd');
  }
  public function jenis_transport()
  {
    return $this->db->select('*')
    ->get('jenis_transport');
  }
  public function nota_biaya_lain()
  {
    return $this->db->select('*')
    ->get('biaya_lain');
  }
  public function idKwitansi()
  {
    return $this->db->select_max('id')
    ->get('kwitansi');
  }
  public function tambah_sppd($data)
  {
    $this->db->insert('sppd', $data);
    return $this->db->insert_id();
  }
  public function tambah_kwitansi($data)
  {
    $this->db->insert('kwitansi', $data);
    return $this->db->insert_id();
  }
  public function ambilSPPDid()
  {
    return $this->db->select_max('id')
    ->get('sppd');
  }
  public function tambah_detil_sppd($data)
  {
    $this->db->insert('detil_sppd', $data);
    return $this->db->insert_id();
  }
  public function tambah_pegawai_pengikut($data)
  {
    $this->db->insert('pegawai_pengikut', $data);
    return $this->db->insert_id();
  }
  public function jumlah_biaya_lain($id)
  {
    return $this->db->select('jumlah as jumlah')
    ->where('id',$id)
    ->get('biaya_lain');
  }
  public function tambah_biaya_lain($data)
  {
    $this->db->insert('detil_kwitansi_biaya_lain', $data);
    return $this->db->insert_id();
  }
  public function setuju_telaah($data,$id)
  {
    $this->db->where('id', $id);
    $this->db->update('telaah_staf', $data);

  }
  public function tolak_telaah($data,$id)
  {
    $this->db->where('id', $id);
    $this->db->update('telaah_staf', $data);
  }
  public function data_pegawai_usul_sppd($id)
  {
    return $this->db->select('
    detil_sppd.sppd_id as id_sppd,
    detil_sppd.nip as nip_pegawai,
    master_user.user_name as nama_pegawai')
    ->join("master_user", "master_user.user_id = detil_sppd.nip")
    ->where('sppd_id',$id)
    ->get("detil_sppd");
  }
  public function data_pegawai_ikut_sppd($id)
  {
    return $this->db->select('
    pegawai_pengikut.sppd_id as id_sppd,
    pegawai_pengikut.nip as nip_pegawai,
    master_user.user_name as nama_pegawai
    ')
    ->join("master_user", "master_user.user_id = pegawai_pengikut.nip")
    ->where('sppd_id',$id)
    ->get("pegawai_pengikut");
  }
  public function telaah_sppd($id)
  {
    return $this->db->select('
    sppd.id as id_sppd,
    kota.nama as nama_kota,
    sppd.tugas as tugas_sppd,
    sppd.is_kegiatan as kegiatan_sppd
    ')
    ->join("kota", "sppd.kota_id = kota.id")
    ->where('sppd.id',$id)
    ->get("sppd");
  }
  public function dataSPPD($id)
  {
    return $this->db->select('*')
    ->where('id',$id)
    ->get("sppd");
  }
  public function tambah_telaah($data)
  {
    $this->db->insert('telaah_staf', $data);
    return $this->db->insert_id();
  }
  public function update_status_sppd($data,$id)
  {
    $this->db->where('id', $id);
    $this->db->update('sppd', $data);
  }
  public function telaah_id()
  {
    return $this->db->select_max('id')
    ->get('telaah_staf');
  }
  public function update_spt($data,$id)
  {
    $this->db->where('id', $id);
    $this->db->update('sppd', $data);
  }
  public function print_telaah()
  {
    $query = $this->db->get('telaah_staf');
    return $query->result_array();
  }
  public function kwitansi($instansi)
  {
    return $this->db->select("
    DISTINCT(kwitansi.id) as id_kwitansi,
    kwitansi.no_kwitansi as no_kwitansi,
    sppd.no_sppd as no_sppd,
    kwitansi.status as status_kwitansi,
    kwitansi.total_uang as total_biaya,
    kota.nama as nama_kota
    ")
    ->join('detil_kwitansi','detil_kwitansi.kwitansi_id = kwitansi.id')
    ->join('detil_kwitansi_biaya_lain','detil_kwitansi.kwitansi_id = kwitansi.id')
    ->join('detil_sppd','detil_sppd.kwitansi_id = kwitansi.id')
    ->join('sppd','sppd.id = detil_sppd.sppd_id')
    ->join('kota','kota.id = sppd.kota_id')
    ->where('sppd.instansi_id',$instansi)
    ->get('kwitansi');
  }
  public function ambil_provinsi()
  {
    return $this->db->select('*')
    ->get('provinsi');
  }
  public function ambil_kota()
  {
    return $this->db->select('*')
    ->get('kota');
  }

  public function master_biaya_transport()
  {
    return $this->db->select('
    "biaya_transport"."id" as "id_biaya_transport",
    "biaya_transport"."jenis_transport_id" as "id_jenis_transport",
    "biaya_transport"."jumlah" as "jumlah_transport",
    "eselon"."nama" as "eselon",
    "jenis_transport"."nama" as "nama_transport"'
    )
    ->join("jenis_transport", "biaya_transport.jenis_transport_id = jenis_transport.id")
    ->join("eselon", " biaya_transport.id_eselon = eselon.id")
    ->get('biaya_transport');
  }
  public function ambil_biaya_lain()
  {
    return $this->db->select('*')
    ->get('biaya_lain');
  }
  public function lupsum()
  {
    return $this->db->select('
    biaya_harian.jumlah as jumlah_biaya,  kota.nama as nama_kota '
    )
    ->join("kota", " kota.id = biaya_harian.kota_id ")
    ->join("provinsi", "provinsi.id = kota.provinsi_id")
    ->get('biaya_harian');
  }
  public function biaya_hotel()
  {
    return $this->db->select('
    jumlah, eselon.nama as eselon'
    )
    ->join("eselon", " eselon.id = biaya_hotel.id_eselon")
    ->get('biaya_hotel');
  }

  public function eselon()
  {
    return $this->db->select('*')
    ->get('eselon');
  }
  public function transport()
  {
    return $this->db->select('*')
    ->get('jenis_transport');
  }
  public function tambah_biaya_transport($data)
  {
    $this->db->insert('biaya_transport', $data);
    return $this->db->insert_id();
  }
  public function get_biaya_harian($id)
  {
    // code...
  }
  public function get_biaya_hotel($id)
  {
    // code...
  }
  public function get_biaya_transport($id)
  {
    // code...
  }
  public function tambah_data_provinsi($data)
  {
    $this->db->insert('provinsi', $data);
    return $this->db->insert_id();
  }
  public function tambah_data_kota($data)
  {
    $this->db->insert('kota', $data);
    return $this->db->insert_id();
  }
  public function tambah_biaya_lain_lain($data)
  {
    $this->db->insert('biaya_lain', $data);
    return $this->db->insert_id();
  }
  public function tambah_lupsum($data)
  {
    $this->db->insert('biaya_harian', $data);
    return $this->db->insert_id();
  }
  public function tambah_hotel($data)
  {
    $this->db->insert('biaya_hotel', $data);
    return $this->db->insert_id();
  }
  public function eselon_pegawai($nip)
  {
    return $this->db->select('eselon')
    ->where('nip',$nip)
    ->get('pegawai');
  }
  public function biaya_transport_eselon($id_eselon,$id_jenis_transport)
  {
    return $this->db->select("jumlah")
    ->join('eselon','eselon.id = biaya_transport.id_eselon')
    ->where("eselon.nama",$id_eselon)
    ->where("jenis_transport_id",$id_jenis_transport)
    ->get('biaya_transport');
  }
  public function biaya_hotel_eselon($id_eselon)
  {
    return $this->db->select("jumlah")
    ->join('eselon','eselon.id = biaya_hotel.id_eselon ')
    ->where("eselon.nama",$id_eselon)
    ->get('biaya_hotel');
  }
  public function lupsum_dinas($id_kota)
  {
    return $this->db->select("jumlah")
    ->where("biaya_harian.kota_id",$id_kota)
    ->get('biaya_harian');
  }
  public function tambah_detil_kwintasi($data)
  {
    $this->db->insert('detil_kwitansi', $data);
    return $this->db->insert_id();
  }
  public function update_sppd($data,$id)
  {
    $this->db->where('id', $id);
    $this->db->update('sppd', $data);
  }
  public function detil_kwitansi($id)
  {
    return $this->db->select("
    kwitansi.id as id_kwitansi,
    sppd.no_sppd as no_sppd,
    kwitansi.no_kwitansi as no_kwitansi,
    kwitansi.status as status_kwitansi,
    kwitansi.total_uang as total_biaya,
    kota.nama as nama_kota")
    ->join('detil_kwitansi','detil_kwitansi.kwitansi_id = kwitansi.id')
    ->join('detil_kwitansi_biaya_lain','detil_kwitansi.kwitansi_id = kwitansi.id')
    ->join('detil_sppd','detil_sppd.kwitansi_id = kwitansi.id')
    ->join('sppd','sppd.id = detil_sppd.sppd_id')
    ->join('kota','kota.id = sppd.kota_id')
    ->order_by("kwitansi.id")
    ->group_by('kwitansi.id,sppd.no_sppd,kwitansi.no_kwitansi,kwitansi.status,kwitansi.total_uang,kota.nama')
    ->where('kwitansi.id',$id)
    ->get('kwitansi');
  }
  public function data_detil_kwitansi($id_kwitansi)
  {
    return $this->db->select("
    detil_kwitansi.nip as nip,
    detil_kwitansi.subtotal_harian as total_lupsum,
    detil_kwitansi.subtotal_transport as total_transport,
    detil_kwitansi.subtotal_hotel as total_hotel,
    master_user.user_name as nama_pegawai")
    ->where("kwitansi_id",$id_kwitansi)
    ->join('master_user','detil_kwitansi.nip = master_user.user_id')
    ->get('detil_kwitansi');
  }
  public function data_detil_kwitansi_biaya_lain($id_biaya_lain)
  {
    return $this->db->select("biaya_lain.nama as nama_item,
    detil_kwitansi_biaya_lain.jumlah as jumlah_item,
    detil_kwitansi_biaya_lain.subtotal as total_biaya")
    ->where("kwitansi_id",$id_biaya_lain)
    ->join('biaya_lain','biaya_lain.id = detil_kwitansi_biaya_lain.biaya_lain_id')
    ->get('detil_kwitansi_biaya_lain');
  }
  public function update_status_kwitansi($data,$id)
  {
    $this->db->where('id', $id);
    $this->db->update('kwitansi', $data);
  }
  public function laporan_keuangan_januari($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",1)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_februari($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",2)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_maret($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",3)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_april($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",4)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_mei($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",5)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_juni($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",6)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_juli($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",7)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_agustus($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",8)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_september($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",9)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_oktober($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",10)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_november($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",11)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function laporan_keuangan_desember($tahun)
  {
    return $this->db->select("date_part('month',tanggal),sum (total_uang) as total")
    ->where(" date_part('month',tanggal)",12)
    ->where(" date_part('year',tanggal)",$tahun)
    ->group_by("date_trunc('month',tanggal), date_part('month',tanggal) ")
    ->get('kwitansi');
  }
  public function data_instansi($instansi)
  {
    return $this->db->select("*")
    ->where("id",$instansi)
    ->get('instansi');
  }
  public function data_spt($id)
  {
    return $this->db->select('
    sppd.id as id_sppd,
    sppd.no_spt as no_spd,
    pegawai.pangkat as pangkat_pegawai,
    pegawai.eselon as eselon_pangkat,
    pegawai.jabatan as jabatan_pegawai,
    master_user.user_name as nama_pegawai,
    master_user.user_id as nip_pegawai,
    kota.nama as nama_kota ,
    sppd.tugas as tugas
    ')
    ->join("kota", "sppd.kota_id = kota.id")
    ->join("detil_sppd", "detil_sppd.sppd_id = sppd.id")
    ->join("kwitansi", "kwitansi.id = detil_sppd.kwitansi_id")
    ->join("master_user","master_user.user_id = detil_sppd.nip")
    ->join("pegawai","master_user.user_id = pegawai.nip18")
    ->group_by('sppd.id,sppd.no_spt,kota.nama,sppd.tugas,pegawai.pangkat,pegawai.eselon,pegawai.jabatan,master_user.user_name,master_user.user_id')
    ->where('sppd.id', $id)
    ->get("sppd");
  }
  public function data_sppd($id)
  {
    return $this->db->select('*')
    ->where('sppd.id',$id)
    ->get('sppd');
  }
  public function kota_berangkat($id)
  {
    return $this->db->select('nama')
    ->where('id',$id)
    ->get('kota');
  }
  public function kota_tujuan($id)
  {
    return $this->db->select('nama')
    ->where('id',$id)
    ->get('kota');
  }
}

?>
