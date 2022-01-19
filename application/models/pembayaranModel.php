<?php
class pembayaranModel extends CI_Model
{
    public function getPembayaran()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp');
        $this->db->join('siswa', 'pembayaran.nisn=siswa.nisn');
        $this->db->where('pembayaran.status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getSiswa()
    {
        $this->db->select('nama,nisn');
        $this->db->from('siswa');
        $this->db->where('status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
}