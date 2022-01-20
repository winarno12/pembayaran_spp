<?php
class pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaranModel');
        $this->load->helper('sistem_helper');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['pembayaran']     = $this->pembayaranModel->getPembayaran();
        $data['content']        = 'pembayaran/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambahpembayaran()
    {
        $this->form_validation->set_rules('')
        if ($this->form_validation->run() == false) {
            $data['content']        = 'pembayaran/tambah';
            $this->load->view('templates/main_view', $data);
        } else {
            echo "hallo";
        }
    }
}
