<?php
class kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelasModel');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['kelas'] = $this->kelasModel->getkelas();
        $data['content'] = 'kelas/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tembah_kelas()
    {
        $this->form_validation->set_rules('nama_kelas', 'nama kelas', 'required|is_unique[kelas.nama_kelas]');
        $this->form_validation->set_rules('kompetensi_keahlian', 'kompetensi keahlian', 'required');
        if ($this->form_validation->run() == false) {
            $data['content'] = 'kelas/tambah';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->proses_add();
        }
    }
    public function proses_add()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'kompetensi_keahlian' => $this->input->post('kompetensi_keahlian'),
            'status' => 0,
            'created_id' => $this->session->userdata('id_petugas')
        ];
        $this->kelasModel->insertdata($data);
        redirect('kelas');
        $this->session->set_flahdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Kelas Berhasil Ditambahkan !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
    }
}
