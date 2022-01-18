<?php
class kelasModel extends CI_Model
{
    public function getkelas()
    {
        $this->db->where('status', 0);
        $this->db->select('id_kelas,nama_kelas,kompetensi_keahlian');
        $this->db->from('kelas');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function insertdata($data)
    {
        if ($this->db->insert('kelas', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
