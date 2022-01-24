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
    public function tambahPembayaran()
    {
        $nisn = $this->session->userdata('nisn');
        $data['siswa'] = $this->pembayaranModel->getSiswaByID($nisn);
        var_dump($data);
        $data['content']        = 'pembayaran/tambah';
        $this->load->view('templates/main_view', $data);
    }
    public function index()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        if ($this->form_validation->run() == false) {
            $data['content']        = 'pembayaran/daftar';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->proses_search();
        }
    }
    public function proses_search()
    {
        $nisn = $this->input->post('nisn');
        $this->session->set_userdata('nisn', $nisn);
        $data['siswa']          = $this->pembayaranModel->getSiswaByID($nisn);
        $data['pembayaran']     = $this->pembayaranModel->getPembayaran($nisn);
        $data['content']        = 'pembayaran/daftar';
        if ($data['siswa']) {
            $this->load->view('templates/main_view', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Siswa Tidak ditemukan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pembayaran');
        }
    }
}
