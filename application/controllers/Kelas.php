<?php
class kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelasModel');
    }
    public function index()
    {
        $data['kelas'] = $this->kelasModel->getkelas();
        $data['content'] = 'kelas/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tembah_kelas()
    {
        $data['content'] = 'kelas/tambah';
        $this->load->view('templates/main_view', $data);
    }
}
