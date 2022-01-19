<?php
class spp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppModel');
        $this->load->helper('sistem_helper');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['spp']        = $this->sppModel->getSpp();
        $data['content']    = 'spp/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambahspp()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        if ($this->form_validation->run() == false) {
            $data['content']    = 'spp/tambah';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->proses_add();
        }
    }
    public function proses_add()
    {
        $data = [
            'tahun'     => $this->input->post('tahun'),
            'nominal'   => uangtodb($this->input->post('nominal')),
            'status'    => 0,
            'created_id' => $this->session->userdata('id_petugas')
        ];
        $this->sppModel->insertData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data SPP Berhasil DiUbah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('spp');
    }
    public function hapusspp($id_spp)
    {
        $data = [
            'id_spp'    => $id_spp,
            'status'    => 2
        ];
        $this->sppModel->hapusData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data SPP Berhasil Dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('spp');
    }
    public function ubahspp($id)
    {
        $data['spp']    = $this->sppModel->getSppById($id);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        if ($this->form_validation->run() == false) {
            $data['content']    = 'spp/ubah';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->proses_edit();
        }
    }
    public function  proses_edit()
    {
    }
}
