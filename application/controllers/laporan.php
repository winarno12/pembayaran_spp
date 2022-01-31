<?php
class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporanModel');
        $this->load->helper('sistem_helper');
    }
    public  function index()
    {
        $data = [
            'pembayaran'    => $this->laporanModel->getlaporan(),
            'content'       => 'laporan/index'
        ];
        $this->load->view('templates/main_view', $data);
    }
}
