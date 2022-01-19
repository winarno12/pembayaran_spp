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
        $data['kelas'] = create_double($this->siswaModel->getJurusan(), 'id_kelas', 'nama_kelas');
        $data['spp'] = $this->siswaModel->getIdSpp();
        $this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required');
        $this->form_validation->set_rules('nisn', 'nisn', 'required|min_length[3]|max_length[3]');
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
            'nama_siswa'    => $this->input->post('nama_siswa'),
            'id_kelas'      => $this->input->post('id_kelas'),
            'alamat'        => $this->input->post('alamat'),
            'no_telp'       => $this->input->post('no_telp'),
            'id_spp'        => $this->input->post('id_spp'),
            'status'        => 0
        ];
        var_dump($data);
    }
}
