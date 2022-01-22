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
}
