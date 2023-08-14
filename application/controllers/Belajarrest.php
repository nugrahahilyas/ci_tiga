<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajarrest extends CI_Controller 
{
    public function index()
    {
        $data['judul'] = 'Halaman Rest';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
     
        $mahasiswa = file_get_contents('assets/img/coba.json');
        
        $data['mahasiswa'] = json_decode($mahasiswa, true);

        // var_dump($data['mahasiswa']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rest/index', $data);
        $this->load->view('templates/footer');
    }
}