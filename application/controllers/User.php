<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Profil';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Ubah Profil';
        
        $this->form_validation->set_rules('name','Nama Lengkap', 'required|trim', ['required' => 'Nama harus diisi!']);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek kalo ada gambar yang ditambahkan
            $upload_image = $_FILES['image'];
            if($upload_image)
            {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image'))
                {

                    $old_image = $data['user']['image'];
                    if($old_image != 'default.png')
                    {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
                else
                {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message','
            <div class="alert alert-success" role="alert">
            Data Berhasil diubah!
            </div> 
            ');
            redirect('user');
        }
    }

    public function gantisandi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Ganti Sandi';
        
        $this->form_validation->set_rules('currentpassword', 'Sandi Lama' , 'required|trim' , [
        'required' => 'Sandi Harus diisi!'
        ]);
        $this->form_validation->set_rules('passwordbaru1','Sandi Baru', 'required|trim|min_length[3]|matches[passwordbaru2]',[
            'required' => 'Sandi Harus diisi!',
            'matches' => 'Sandi Tidak Sama',
            'min_length' => 'Sandi Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('passwordbaru2','Sandi Validasi','required|trim|matches[passwordbaru1]',[
            'required' => 'Sandi Harus diisi!',
            'matches' => 'Sandi Tidak Sama'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/sandi', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $currentpassword = $this->input->post('currentpassword');
            $newpassword = $this->input->post('passwordbaru1');
            if(!password_verify($currentpassword, $data['user']['password']))
            {
                $this->session->set_flashdata('message','
                <div class="alert alert-danger" role="alert">
                Sandi Lama Salah!
                </div>
                ');
                redirect('user/gantisandi');
            }
            else
            {
                if($currentpassword == $newpassword)
                {
                    $this->session->set_flashdata('message',' 
                <div class="alert alert-danger" role="alert">
                Sandi baru tidak boleh sama dengan sandi lama
                </div>
                ');
                redirect('user/gantisandi');
                }
                else
                {
                    //password ok
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    
                    $this->db->set('password',$password_hash);
                    $this->db->where('email',$this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message',' 
                    <div class="alert alert-success" role="alert">
                    Sandi diubah!
                    </div>
                    ');
                    redirect('user/gantisandi');

                }
            }
        }
    }

}
