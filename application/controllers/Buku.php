<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Buku_model','buku');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Daftar Buku';
        $this->load->library('pagination');
        
        // ambil data keyword cari
        if(isset($_POST['submit'])) {
            $data['keyword'] = $_POST['keyword'];
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata['keyword'];;
        }

        $data['start'] = $this->uri->segment(3);
        $config['per_page'] = 7;
        $config['total_rows'] = $this->buku->countRow();
        $data['buku'] = $this->buku->getPaginationBuku($config['per_page'], $data['start'], $data['keyword']);
        
        // initialize pagination
        $this->pagination->initialize($config);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');

    }
    public function tambahBuku()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Penerbit_model', 'penerbit');
        $this->load->library('form_validation');
        $data['judul'] = 'Tambah Buku';
        $data['penerbit'] = $this->penerbit->getPenerbit();
        $data['buku'] = $this->buku->getSemuaBuku();

        $this->form_validation->set_rules('judul_buku','Judul Buku', 'required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('penulis','Judul Buku', 'required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('penulis','Nama Penulis','required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('harga','Harga Buku','required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('diskon','Diskon Buku','required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('stok','Stok Buku','required',
        [
            'required' => 'Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/tambahbuku', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->buku->simpanBuku();
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil disimpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('buku');
        }
    }
    public function hapusbuku($id)
    {
        $this->buku->hapusBuku($id);
        $this->session->set_flashdata('message', 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('buku');
    }

    public function ubahBuku($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Penerbit_model', 'penerbit');
        $this->load->library('form_validation');
        $data['judul'] = 'Ubah Buku';
        $data['penerbit'] = $this->penerbit->getPenerbit();
        $data['buku'] = $this->buku->getBukuById($id);
        var_dump($data['buku']); die;
        $data['buku']['diskon'] = $data['buku']['diskon'] * 100; 
        $this->form_validation->set_rules('judul_buku','Judul Buku', 'required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('penulis','Judul Buku', 'required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('penulis','Nama Penulis','required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('harga','Harga Buku','required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('diskon','Diskon Buku','required',
        [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('stok','Stok Buku','required',
        [
            'required' => 'Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/ubahbuku', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->buku->ubahBuku();
            $this->session->set_flashdata('message', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data Diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('buku');
        }
    }
}