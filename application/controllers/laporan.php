<?php
class laporan extends CI_Controller
{
    public  function index()
    {
        $data['content'] = 'laporan/daftar';
        $this->load->view('templates/main_view', $data);
    }
}
