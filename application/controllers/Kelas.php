<?php
class kelas extends CI_Controller
{
    public function index()
    {
        $data['content'] = 'kelas/daftar';
        $this->load->view('templates/main_view', $data);
    }
}
