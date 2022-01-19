<?php
class pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaranModel');
        $this->load->helper('sistem_helper');
    }
    public function index()
    {
        $data['pembayaran']     = $this->pembayaranModel->getPembayaran();
        $data['content']        = 'pembayaran/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambahpembayaran()
    {
        $data['siswa']          = create_double($this->pembayaranModel->getSiswa(), 'nisn', 'nama');
        $data['content']        = 'pembayaran/tambah';
        $this->load->view('templates/main_view', $data);
    }
}
