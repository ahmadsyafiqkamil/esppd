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
    return $this->db->select('kota.nama as nama_kota,
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
  public function biayalain($value='')
  {
    return $this->db->select('*')
    ->join("detil_kwitansi_biaya_lain", "detil_kwitansi_biaya_lain.id = kwitansi.id")
    ->get("detil_kwitansi_biaya_lain");
  }
}

?>
