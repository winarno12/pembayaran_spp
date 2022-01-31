<?php
class siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswaModel');
        $this->load->library('form_validation');
        $this->load->helper('sistem_helper');
        // pembatasan administrator dan petugas
        if ($this->session->userdata('level') == 'petugas') {
            redirect('petugas');
        }
    }
    public function index()
    {
        $data['siswa'] = $this->siswaModel->getSiswa();
        $data['content'] = 'siswa/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambah_siswa()
    {
        $data['kelas'] = create_double($this->siswaModel->getJurusan(), 'id_kelas', 'nama_kelas');
        $data['spp'] = $this->siswaModel->getIdSpp();
        $this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required');
        $this->form_validation->set_rules('id_kelas', 'nama kelas', 'required');
        $this->form_validation->set_rules('id_spp', 'spp', 'required');
        $this->form_validation->set_rules('nisn', 'nisn', 'required|min_length[10]|max_length[10]|is_unique[siswa.nisn]');
        if ($this->form_validation->run() == false) {
            $data['content'] = 'siswa/tambah';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->processadd();
        }
    }

    public function processadd()
    {
        $data = [
            'nisn'          => $this->input->post('nisn'),
            'nis'           => $this->input->post('nis'),
            'nama'          => $this->input->post('nama_siswa'),
            'id_kelas'      => $this->input->post('id_kelas'),
            'alamat'        => $this->input->post('alamat'),
            'no_telp'       => $this->input->post('no_telp'),
            'id_spp'        => $this->input->post('id_spp'),
            'status'        => 0,
            'created_id'    => $this->session->userdata('id_petugas')
        ];
        $this->siswaModel->insertdata($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa Berhasil Ditambahkan !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('siswa');
    }
    public function hapussiswa($nisn)
    {
        $data = [
            'nisn'      => $nisn,
            'status'    => 2,
            'update_id' => $this->session->userdata('id_petugas')
        ];
        $this->siswaModel->hapusdata($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data siswa Berhasil Dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('siswa');
    }
    public function ubah_siswa($nisn)
    {
        $data['kelas']      = create_double($this->siswaModel->getJurusan(), 'id_kelas', 'nama_kelas');
        $data['spp']        = $this->siswaModel->getIdSpp();
        $data['siswa']      = $this->siswaModel->getSiswaByNisn($nisn);
        $this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required');
        $this->form_validation->set_rules('id_kelas', 'nama kelas', 'required');
        $this->form_validation->set_rules('id_spp', 'spp', 'required');
        if ($this->form_validation->run() == false) {
            $data['content']    = 'siswa/ubah';
            $this->load->view('templates/main_view', $data);
        } else {
            $this->process_edit();
        }
    }

    public function process_edit()
    {
        $data = [
            'nisn'          => $this->input->post('nisn'),
            'nis'           => $this->input->post('nis'),
            'nama'          => $this->input->post('nama_siswa'),
            'id_kelas'      => $this->input->post('id_kelas'),
            'alamat'        => $this->input->post('alamat'),
            'no_telp'       => $this->input->post('no_telp'),
            'id_spp'        => $this->input->post('id_spp'),
            'status'        => 0,
            'update_id'     => $this->session->userdata('id_petugas')
        ];
        $this->siswaModel->updateData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data siswa Berhasil DiUbah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('siswa');
    }
    public function login()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('siswa/login');
        } else {
            $this->proseslogin();
        }
    }
    public function proseslogin()
    {
        $data = [
            'nisn' => $this->input->post('nisn')
        ];
        $auth = $this->db->get_where('siswa', ['nisn' => $data['nisn']])->row('nisn');
        if ($data['nisn'] == $auth) {
            $this->session->set_userdata('nisn', $auth);
            redirect('siswa/home');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data siswa Tidak Ditemukan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('siswa/login');
        }
    }
    public function home()
    {
        $nisn               = $this->session->userdata('nisn');
        $data['pembayaran'] = $this->siswaModel->getSppSiswa($nisn);
        $this->load->view('siswa/riwayat_spp', $data);
    }
    public function logout()
    {
        $this->session->unset_userdata('nisn');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
       Logout Sukses !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('siswa/login');
    }
}
