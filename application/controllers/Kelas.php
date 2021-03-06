<?php
class kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelasModel');
        $this->load->library('form_validation');
        if ($this->session->userdata('level') == 'petugas') {
            redirect('petugas');
        }
    }
    public function index()
    {
        $data['kelas']      = $this->kelasModel->getkelas();
        $data['content']    = 'kelas/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambah_kelas()
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
            'nama_kelas'            => $this->input->post('nama_kelas'),
            'kompetensi_keahlian'   => $this->input->post('kompetensi_keahlian'),
            'status'                => 0,
            'created_id'            => $this->session->userdata('id_petugas')
        ];
        $this->kelasModel->insertdata($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Kelas Berhasil Ditambahkan !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('kelas');
    }

    public function hapus($id_kelas)
    {
        $data = [
            'id_kelas'          => $id_kelas,
            'status'            => 2,
            'update_id'         => $this->session->userdata('id_petugas'),
        ];
        $this->kelasModel->hapusdata($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Kelas Berhasil Dihapus !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('kelas');
    }
    public function ubah_kelas($id_kelas)
    {
        $data['kelas']           = $this->kelasModel->getkelasbyid($id_kelas);
        $data['content']         = 'kelas/ubah';
        $this->load->view('templates/main_view', $data);
    }
    public function proses_update()
    {
        $oldkelas = $this->input->post('old_kelas');
        $data = [
            'id_kelas'              => $this->input->post('id_kelas'),
            'nama_kelas'            => $this->input->post('nama_kelas'),
            'kompetensi_keahlian'   => $this->input->post('kompetensi_keahlian'),
            'update_id'             => $this->session->userdata('id_petugas')
        ];
        if ($oldkelas == $data['nama_kelas']) {
            $this->form_validation->set_rules('nama_kelas', 'nama kelas', 'required');
        } else {
            $this->form_validation->set_rules('nama_kelas', 'nama kelas', 'required|is_unique[kelas.nama_kelas]');
        }
        if ($this->form_validation->run() == true) {
            $this->kelasModel->updatedata($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Kelas Berhasil Diubah !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('kelas');
        } else {
            $msg = validation_errors("<small class='text-danger pl-3'>", '</small>');
            $this->session->set_flashdata('pesan', $msg);
            redirect('kelas/ubah_kelas/' . $data['id_kelas']);
        }
    }
}
