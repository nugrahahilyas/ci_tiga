<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Penerbit_model','penerbit');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Daftar Penerbit';
        $data['penerbit'] = $this->penerbit->getPenerbit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penerbit/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahpenerbit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Penerbit';

        $this->form_validation->set_rules('id_penerbit','ID Penerbit', 'required|is_unique[penerbit.id_penerbit]',
        [
            'required' => 'Harus Diisi',
            'is_unique' => 'id sudah ada, ganti dengan inisial yang lain'
        ]);
        $this->form_validation->set_rules('nama_penerbit','Nama Penerbit', 'required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|regex_match[/^\d{10,15}$/]',
        [
            'required' => 'Harus Diisi',
            'regex_match' => 'Format nomor HP tidak valid'
        ]);

        $this->form_validation->set_rules('alamat','Alamat Penerbit','required',
        [
            'required' => 'Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerbit/tambahpenerbit', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->penerbit->simpanPenerbit();
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil disimpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('penerbit');
        }
    }
}