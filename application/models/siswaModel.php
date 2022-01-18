<?php
class siswaModel extends CI_Model
{
    public function getSiswa()
    {
        $this->db->select('siswa.nama,siswa.nisn,spp.nominal,kelas.nama_kelas,siswa.no_telp');
        $this->db->from('siswa');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp');
        $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
        $this->db->where('siswa.status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
