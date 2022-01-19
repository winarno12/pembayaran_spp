<?php
class sppModel extends CI_Model
{
    public function getSpp()
    {
        $this->db->select('id_spp,tahun,nominal');
        $this->db->from('spp');
        $this->db->where('status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getSppById($id_spp)
    {
        return $this->db->get_where('spp', ['id_spp' => $id_spp])->row_array();
    }
    public function insertData($data)
    {
        if ($this->db->insert('spp', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function hapusData($data)
    {
        $this->db->where('id_spp', $data['id_spp']);
        $query = $this->db->update('spp', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function ubahData($data)
    {
        $this->db->where('id_spp', $data['id_spp']);
        $query = $this->db->update('spp', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
