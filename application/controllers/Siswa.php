<?php
class siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswaModel');
        $this->load->library('form_validation');
        $this->load->helper('sistem_helper');
    }
    public function index()
    {
        $data['siswa'] = $this->siswaModel->getSiswa();
        $data['content'] = 'siswa/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambah_siswa()
    {
        $data['content'] = 'siswa/tambah';
        $this->load->view('templates/main_view', $data);
    }
}
