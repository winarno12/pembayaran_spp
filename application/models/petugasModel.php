<?php
class petugasModel extends CI_Model
{
    public function getPetugas($username)
    {
        return  $this->db->get_where('petugas', ['username' => $username])->row_array();
    }
    public function getAllPetugas()
    {
        $this->db->select('id_petugas,nama_petugas,username,level');
        $this->db->from('petugas');
        $this->db->where('status', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function insertData($data)
    {
        if ($this->db->insert('petugas', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function ubahData($data)
    {
        $this->db->where('id_petugas', $data['id_petugas']);
        $query = $this->db->update('petugas', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function hapusData($data)
    {
        $this->db->where('id_petugas', $data['id_petugas']);
        $query = $this->db->update('petugas', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function getPetugasByID($id)
    {
        $this->db->select('id_petugas,nama_petugas,username,level');
        $this->db->from('petugas');
        $this->db->where('status', 0);
        $this->db->where('id_petugas', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
}
