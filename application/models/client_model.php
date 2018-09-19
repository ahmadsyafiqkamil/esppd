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
  public function biayalain()
  {
    return $this->db->select('*')
    ->join("kwitansi", "detil_kwitansi_biaya_lain.id = kwitansi.id")
    ->get("detil_kwitansi_biaya_lain");
  }
  public function telaah()
  {
    return $this->db->select('id, perihal, status, tanggal_mulai, tanggal_selesai, tanggal,
    deleted_at, bidang, tujuan, sppd_id')
    ->get('public.telaah_staf');
  }
  public function datatelaah()
  {
    return $this->db->select('telaah_staf.id as id_telaah_staf, sppd.id as id_sppd ,telaah_staf.perihal as perihal_telaah,
    telaah_staf.status as status_telaah, telaah_staf.tanggal_mulai as tanggal_mulai_telaah,
    telaah_staf.tanggal_selesai as tanggal_selesai_telaah, telaah_staf.tanggal as tanggal_telaah,
    telaah_staf.deleted_at, telaah_staf.bidang, telaah_staf.tujuan, telaah_staf.sppd_id,
    sppd.instansi_id, sppd.kota_id, sppd.berangkat_dari, telaah_id, jenis_transport_id,
    no_sppd, no_spt as spt_sppd, mata_anggaran, tugas, sppd.tanggal_mulai, sppd.tanggal_selesai,
    sppd.lama, sppd.status, sppd.is_kegiatan, sppd.created_at, sppd.updated_at, sppd.deleted_at,
    sppd.is_telaah, sppd.bidang, sppd.master_ttd_id')
    ->join("telaah_staf", "telaah_staf.sppd_id = sppd.id")
    ->get('public.sppd');
  }
  public function dataSPPD()
  {
    return $this->db->select(
      'id, instansi_id, kota_id, berangkat_dari, telaah_id, jenis_transport_id,
      no_sppd, no_spt, mata_anggaran, tugas, tanggal_mulai, tanggal_selesai,
      lama, status, is_kegiatan, created_at, updated_at, deleted_at,
      is_telaah, bidang, master_ttd_id')
      ->get('sppd');
    }
  }

  ?>
