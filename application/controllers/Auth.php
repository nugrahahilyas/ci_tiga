<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }

    public function index()
    {

        if($this->session->userdata('email'))
        {
            redirect('user');
        }


        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Sandi','trim|required');
        if($this->form_validation->run() == false)
        {
            $data['judul'] = 'Halaman Masuk';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } 
        else
        {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if($user) 
        {
            // jika usernya aktif
            if($user['is_active'] == 1)
            {
                if(password_verify($password, $user['password']))
                {       
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                }
                else 
                {
                    $this->session->set_flashdata('message', 
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sandi Salah!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>'
                );
                redirect('auth');
                }
            }
            else
            {
                $this->session->set_flashdata('message', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email belum diaktifasi</strong> Aktifasi dulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('auth');
            }
        }
        else
        {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email tidak terdaftar</strong> Registrasi dulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('auth');
        }
    }

    public function registrasi()
    {

        if($this->session->userdata('email'))
        {
            redirect('user');
        }


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
        [
            'matches' => 'Sandi Beda',
            'min_length' => 'Sandi Terlalu Pendek'
        ]);
        
        if ($this->form_validation->run() == false)
        {
            $data['judul'] = 'Halaman Pendaftaran';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer');
        } 
        else
        {
            $data = [
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email')),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);

            // $this->_sendEmail();


            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat anda sudah terdaftar</strong> Silahkan Masuk!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('auth');
        }
    }

    // private function _sendEmail()
    // {
    //     $config =[
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_user' => 'newgiehook92@gmail.com',
    //         'smtp_pass' => 'astagfirulloh1',
    //         'smtp_port' => 465 ,
    //         'mailtype'  => 'html',
    //         'charset' => 'utf-8',
    //         'newline' => "/r/n"
    //     ]; 

    //     $this->load->library('email', $config);
    //     $this->email->initialize($config);

    //     $this->email->from('newgiehook92@gmail.com','Web Dummy Hilyas');
    //     $this->email->to('nugraha.hilyas@gmail.com');
    //     $this->email->subject('Testing');
    //     $this->email->message('Hello World');
        
    //     if($this->email->send())
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         echo $this->email->print_debugger();
    //         die;
    //     }

    // }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Anda sudah keluar</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        ');
        redirect('auth');
    }

    public function blocked()
    {
        $data['judul'] = 'Access Blocked';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('templates/footer');
    
    }
}