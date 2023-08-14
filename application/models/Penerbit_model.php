<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model
{
    public function getPenerbit($id = null)
    {
        if ($id === null)
        {
            return $this->db->get('penerbit')->result_array();
        }
        else
        {
            return $this->db->get_where('penerbit',['id' => $id])->result_array();
        }
    }
    public function simpanPenerbit()
    {

        $data = [
            'id' => '',
            'id_penerbit' => $this->input->post('id_penerbit'),
            'nama_penerbit' => htmlspecialchars($this->input->post('nama_penerbit')),
            'no_hp' => htmlspecialchars($this->input->post('no_hp')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
        ];
        
        $this->db->insert('penerbit', $data);
    }
}

