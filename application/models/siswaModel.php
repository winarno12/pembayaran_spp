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
        $this->db->order_by('nama', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getJurusan()
    {
        $this->db->select('kelas.id_kelas,kelas.nama_kelas');
        $this->db->from('kelas');
        $this->db->where('kelas.status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getIdSpp()
    {
        $this->db->select('spp.id_spp');
        $this->db->from('spp');
        $this->db->where('spp.status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public  function insertdata($data)
    {
        if ($this->db->insert('siswa', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function hapusdata($data)
    {
        $this->db->where('nisn', $data['nisn']);
        $query = $this->db->update('siswa', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function updateData($data)
    {
        $this->db->where('nisn', $data['nisn']);
        $query = $this->db->update('siswa', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function getSiswaByNisn($nisn)
    {
        return $this->db->get_where('siswa', ['nisn' => $nisn])->row_array();
    }
}
