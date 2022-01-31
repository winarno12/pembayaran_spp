<?php
class laporanModel extends CI_Model
{
    public function getlaporan ()
    {
        $this->db->select('siswa.nama,kelas.nama_kelas,pembayaran.tahun_dibayar,pembayaran.jumlah_bayar,pembayaran.bulan_dibayar');
        $this->db->from('pembayaran');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp');
        $this->db->join('siswa', 'pembayaran.nisn=siswa.nisn');
        $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $this->db->where('pembayaran.status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
}