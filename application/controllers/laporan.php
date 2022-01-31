<?php
class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporanModel');
        $this->load->helper('sistem_helper');
        $this->load->library('configurasi');
    }
    public  function index()
    {
        $data = [
            'pembayaran'    => $this->laporanModel->getlaporan(),
            'content'       => 'laporan/index',
            'bulan'=>$this->configurasi->bulan()
        ];
        $this->load->view('templates/main_view', $data);
    }
    public function cetak()
    {
        $data = [
            'pembayaran'    => $this->laporanModel->getlaporan(),
            'bulan'=>$this->configurasi->bulan()
        ];
        $this->load->view('laporan/cetak', $data);
    }
}
