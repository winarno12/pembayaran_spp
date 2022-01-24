<?php
class pembayaranModel extends CI_Model
{
    public function getPembayaran($nisn)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp');
        $this->db->join('siswa', 'pembayaran.nisn=siswa.nisn');
        $this->db->where('pembayaran.status', 0);
        $this->db->where('pembayaran.nisn', $nisn);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getSiswaByID($nisn)
    {
        $this->db->select('siswa.nama,kelas.nama_kelas,siswa.nisn');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $this->db->where('siswa.status', 0);
        $this->db->where('siswa.nisn', $nisn);
        $query = $this->db->get()->row_array();
        return $query;
    }
}
