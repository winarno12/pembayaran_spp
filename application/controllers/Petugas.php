<?php
class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('petugasModel');
        
    }
    public function index()
    {
        if ($this->session->userdata('id_petugas')) {
            redirect('petugas/home');
        }
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('petugas/login');
        } else {
            $this->proses_login();
        }
    }
    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $auth = $this->petugasModel->getPetugas($username);
        if ($auth) {
            if ($password == $auth['password']) {
                $data = [
                    'id_petugas' => $auth['id_petugas'],
                    'username' => $auth['username'],
                    'nama_petugas' => $auth['nama_petugas'],
                    'level' => $auth['level'],
                ];
                $this->session->set_userdata($data);
                redirect('petugas/home');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
               Maaf  password anda salah
              </div>');
                redirect('petugas');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
           Maaf Username anda salah
          </div>');
            redirect('petugas');
        }
    }

    public function home()
    {
        $data['content'] = 'petugas/home';
        $this->load->view('templates/main_view', $data);
    }
    public function daftarPetugas()
    {
        $data['petugas'] = $this->petugasModel->getAllPetugas();
        $data['content'] = 'petugas/daftar';
        $this->load->view('templates/main_view', $data);
    }
    public function tambah_petugas()
    {
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[petugas.username]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_rules('nama_petugas', 'nama petugas', 'required');
        $data['level'] = ['admin', 'petugas'];
        if ($this->form_validation->run() == false) {
            $data['content'] = 'petugas/tambah';
            $this->load->view('templates/main_view', $data);
            # code...
        } else {
            $this->prosesTambahPetugas();
        }
    }
    public function prosesTambahPetugas()
    {
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
            'status' => 0
        ];
        $this->petugasModel->insertData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Petugas Berhasil Ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('petugas/daftarPetugas');
    }
    public function ubahpetugas($id)
    {
        $data['petugas'] = $this->petugasModel->getPetugasByID($id);
        $data['level'] = ['admin', 'petugas'];
        $data['content'] = 'petugas/ubah';
        $this->load->view('templates/main_view', $data);
    }
    public function prosesubahpetugas()
    {
        $oldnamapetugas = $this->input->post('old_username');
        $data = [
            'id_petugas' => $this->input->post('id_petugas'),
            'nama_petugas' => $this->input->post('nama_petugas'),
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level'),
            'status' => 0
        ];
        if ($oldnamapetugas == $data['username']) {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');
            $this->form_validation->set_rules('nama_petugas', 'nama petugas', 'required');
        } else {
            $this->form_validation->set_rules('username', 'username', 'required|is_unique[petugas.username]');
            $this->form_validation->set_rules('level', 'level', 'required');
            $this->form_validation->set_rules('nama_petugas', 'nama petugas', 'required');
        }

        if ($this->form_validation->run() == true) {
            $this->petugasModel->ubahData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Petugas Berhasil Diubah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('petugas/daftarPetugas');
        } else {
            $msg = validation_errors("<div class='alert alert-danger alert-dismissible fade show' role='alert'>", '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            $this->session->set_userdata('pesan', $msg);
            redirect('petugas/ubahpetugas/' . $data['id_petugas']);
        }
    }
    public function hapuspetugas($id_petugas)
    {
        $data = [
            'id_petugas'          => $id_petugas,
            'username'          => null,
            'status'            => 2,
        ];
        $this->petugasModel->hapusData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Petugas Berhasil Dihapus !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('petugas/daftarPetugas');
    }
    public function logout()
    {
        $this->session->unset_userdata('id_petugas');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_petugas');
        redirect('petugas');
    }
}
