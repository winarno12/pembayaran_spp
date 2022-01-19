<?php
class pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaranModel');
    }
    public function index()
    {
        $data['content'] = 'pembayaran/daftar';
        $data['pembayaran'] = $this->pembayaranModel->getPembayaran();
        $this->load->view('templates/main_view', $data);
    }
}
