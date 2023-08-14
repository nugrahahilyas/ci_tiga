<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller 
{
    public function index()
    {
        $data['judul'] = 'Halaman Portofolio';
        $this->load->view('pages/index', $data);
    }
}