<?php
class petugasModel extends CI_Model
{
    public function getPetugas($username)
    {
        return  $this->db->get_where('petugas', ['username' => $username])->row_array();
    }
}
