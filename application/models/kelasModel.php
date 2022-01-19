<?php
class kelasModel extends CI_Model
{
    public function getkelas()
    {
        $this->db->where('status', 0);
        $this->db->select('id_kelas,nama_kelas,kompetensi_keahlian');
        $this->db->from('kelas');
        $this->db->order_by('nama_kelas', 'ACS');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getkelasbyid($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->select('id_kelas,nama_kelas,kompetensi_keahlian');
        $this->db->from('kelas');
        $query = $this->db->get()->row_array();
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

    public function hapusdata($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $query = $this->db->update('kelas', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function updatedata($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $query = $this->db->update('kelas', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
