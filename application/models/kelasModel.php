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
}
