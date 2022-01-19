<?php
class spp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppModel');
        $this->load->helper('sistem_helper');
    }
    public function index()
    {
        $data['spp']        = $this->sppModel->getSpp();
        $data['content']    = 'spp/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambahspp()
    {
        $data['content']    = 'spp/tambah';
        $this->load->view('templates/main_view', $data);

    }
}
