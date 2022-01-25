<?php
class pembayaranModel extends CI_Model
{
    public function getPembayaran($nisn)
    {
        $this->db->select('siswa.nama,kelas.nama_kelas,pembayaran.tahun_dibayar,pembayaran.jumlah_bayar,pembayaran.bulan_dibayar');
        $this->db->from('pembayaran');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp');
        $this->db->join('siswa', 'pembayaran.nisn=siswa.nisn');
        $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $this->db->where('pembayaran.status', 0);
        $this->db->where('pembayaran.nisn', $nisn);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getSiswaByID($nisn)
    {
        $this->db->select('siswa.nama,kelas.nama_kelas,siswa.nisn,siswa.id_spp,spp.nominal');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp');
        $this->db->where('siswa.status', 0);
        $this->db->where('siswa.nisn', $nisn);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public  function insertData($data)
    {
        if ($this->db->insert('pembayaran',$data)) {
            return true;
        }else{
            return false;
        }
    }
}
