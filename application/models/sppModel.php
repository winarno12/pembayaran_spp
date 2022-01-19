<?php 
class sppModel extends CI_Model{
    public function getSpp(){
        $this->db->select('id_spp,tahun,nominal');
        $this->db->from('spp');
        $this->db->where('status',0);
        $query=$this->db->get()->result_array();
        return $query;
    }
}
