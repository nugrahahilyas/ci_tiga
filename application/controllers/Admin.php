<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function akses()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['akses'] = $this->db->get('user_role')->result_array(); 

        $data['judul'] = 'Akses';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/akses', $data);
        $this->load->view('templates/footer');
    }
    public function ubahakses($id)
    {
        $data['user'] = $this->db->get_where('user', 
        ['email' => $this->session->userdata('email')])->row_array();

        $data['akses'] = $this->db->get_where('user_role',['id' => $id])->row_array();
        
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['judul'] = 'Ubah Akses';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ubahakses', $data);
        $this->load->view('templates/footer');
    }

    public function simpanakses()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);


        if($result->num_rows() < 1 )
        {
            $this->db->insert('user_access_menu', $data);
        }
        else 
        {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Akses telah berubah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        ');
    }

    public function user()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Data User';

        $this->load->model('Users_model','users');

        $data['users'] = $this->users->getUsers();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }
    
    public function ubahuser($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Data User';

        $this->load->model('Users_model','users');

        $data['users'] = $this->users->getUser($id);
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Nama','trim|required', ['required' => 'Nama Harus diisi!']);
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubahuser', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image'];
            $this->users->simpanUbahUser($name, $email, $upload_image);
            $this->session->set_flashdata('message','
            <div class="alert alert-success" role="alert">
            Data Berhasil diubah!
            </div> 
            ');
            redirect('admin/user');
        }
    }

}
