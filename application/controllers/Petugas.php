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
    public function logout()
    {
        $this->session->unset_userdata('id_petugas');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_petugas');
        redirect('petugas');
    }
}
