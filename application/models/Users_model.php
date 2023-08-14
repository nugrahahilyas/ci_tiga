<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function getUsers()
    {
        $query = "SELECT * FROM user";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    public function getUser($id)
    {
            $query = "SELECT * FROM `user` WHERE `user`.`id` = '$id'";
            $result = $this->db->query($query)->row_array();
            return $result;
    }
    public function simpanUbahUser($name, $email, $upload_image = null)
    {
        if($upload_image && $upload_image['error'] !== UPLOAD_ERR_NO_FILE)
        {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image'))
            {
                $old_image = $data['users']['image'];
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

        $this->db->where('email', $email);
        $this->db->update('user', ['name' => $name]);

    }
}
