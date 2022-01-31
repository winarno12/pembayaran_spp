<?php
class pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaranModel');
        $this->load->helper('sistem_helper');
        $this->load->library('form_validation');
        $this->load->library('configurasi');
    }

    public function index()
    {
        $data['bulan']          = $this->configurasi->bulan();
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
        $data['bulan']          = $this->configurasi->bulan();
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
    public function tambahPembayaran()
    {
        $nisn = $this->session->userdata('nisn');
        $data['siswa']          = $this->pembayaranModel->getSiswaByID($nisn);
        $data['bulan']          = $this->configurasi->bulan();
        $this->form_validation->set_rules('bulan_dibayar', 'bulan_dibayar', 'required');
        if ($this->form_validation->run() == false) {
            $data['content']        = 'pembayaran/tambah';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->proses_add();
        }
    }
    public function proses_add()
    {
        $data =
            [
                'id_petugas'        => $this->session->userdata('id_petugas'),
                'nisn'              => $this->input->post('nisn'),
                'tgl_pembayaran'    => $this->input->post('tgl_pembayaran'),
                'bulan_dibayar'     => $this->input->post('bulan_dibayar'),
                'tahun_dibayar'     => $this->input->post('tahun_dibayar'),
                'jumlah_bayar'      => uangtodb($this->input->post('jumlah_dibayar')),
                'id_spp'            => $this->input->post('id_spp')
            ];
        $this->pembayaranModel->insertData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pembayaran Berhasil Ditambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('pembayaran');
    }
}
