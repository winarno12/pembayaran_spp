<?php
class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('fpdf');
    }
    public  function index()
    {
        $this->load->view('laporan/daftar');
    }
}
