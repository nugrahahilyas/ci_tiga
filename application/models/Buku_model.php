<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function getSemuaBuku()
    {
        return $this->db->get('buku')->result_array();
    }
    public function getBukuById($id)
    {
        return $this->db->get_where('buku', 'id', $id)->row_array();
    }
    public function getPaginationBuku($limit, $start, $keyword = null)
    {

        if($keyword){
            $this->db->like('judul_buku', $keyword);
            $this->db->or_like('nama_penerbit', $keyword);
            $this->db->or_like('id_buku', $keyword);
            $this->db->or_like('penulis', $keyword);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->select('buku.*, penerbit.nama_penerbit');
        $this->db->from('buku');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        $this->db->order_by('buku.id', 'ASC');
    
        $this->db->limit($limit, $start);
    
        return $this->db->get()->result_array();
    }

    public function countRow()
    {
        return $this->db->count_all_results('buku');
    }
    

    public function simpanBuku()
    {

        $data = [
            'id' => '',
            'id_buku' => $this->input->post('id_buku'),
            'id_penerbit' => $this->input->post('id_penerbit'),
            'judul_buku' => htmlspecialchars($this->input->post('judul_buku')),
            'penulis' => htmlspecialchars($this->input->post('penulis')),
            'harga' => htmlspecialchars($this->input->post('harga')),
            'diskon' => htmlspecialchars($this->input->post('diskon') / 100),
            'stok' => htmlspecialchars($this->input->post('stok'))
        ];
        
        $data['total'] = $data['harga'] * $data['stok'];
        $this->db->insert('buku', $data);
        
        $this->db->select_sum('stok', 'total_stok');
        $this->db->select_sum('total', 'total_omset');
        $this->db->where('id_penerbit', $data['id_penerbit']);
        $query = $this->db->get('buku');
        $result = $query->row_array();
        
        $total_stok = $result['total_stok'];
        $total_omset = $result['total_omset'];
        
        $this->db->set('jumlah_stok', $total_stok);
        $this->db->set('omset', $total_omset);
        $this->db->where('id_penerbit', $data['id_penerbit']);
        $this->db->update('penerbit');
        
    }

    // public function hapusBuku($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('buku');

    //     $this->db->select_sum('stok', 'total_stok');
    //     $this->db->select_sum('total', 'total_omset');
    //     $this->db->where('id_penerbit', $data['id_penerbit']);
    //     $result = $this->db->get('buku')->row_array();
        
    //     $total_stok = $result['total_stok'];
    //     $total_omset = $result['total_omset'];
        
    //     $this->db->set('jumlah_stok', $total_stok);
    //     $this->db->set('omset', $total_omset);
    //     $this->db->where('id_penerbit', $data['id_penerbit']);
    //     $this->db->update('penerbit');


    // }


    public function hapusBuku($id)
{
    // // Menghapus buku dari tabel 'buku'
    $this->db->where('id', $id);
    $this->db->delete('buku');

    // Menghitung total stok dan total omset dari buku dengan id_penerbit yang sama
    $bukutsb = $this->db->get_where('buku', ['id' => $id])->row_array();

    $this->db->select_sum('stok', 'total_stok');
    $this->db->select_sum('total', 'total_omset');
    $this->db->where('id_penerbit', $bukutsb['id_penerbit']);
    $result = $this->db->get('buku')->row_array();
    
    $total_stok = $result['total_stok'];
    $total_omset = $result['total_omset'];
    // Mengupdate kolom 'omset' dan 'jumlah_stok' di tabel 'penerbit'
    $this->db->set('jumlah_stok', $total_stok);
    $this->db->set('omset', $total_omset);
    $this->db->where('id_penerbit', $data['id_penerbit']);
    $this->db->update('penerbit');
}



    public function ubahBuku()
    {
        $data = [
            'id' => $this->input->post('id'),
            'id_buku' => $this->input->post('id_buku'),
            'id_penerbit' => $this->input->post('id_penerbit'),
            'judul_buku' => htmlspecialchars($this->input->post('judul_buku')),
            'penulis' => htmlspecialchars($this->input->post('penulis')),
            'harga' => htmlspecialchars($this->input->post('harga')),
            'diskon' => htmlspecialchars($this->input->post('diskon') / 100),
            'stok' => htmlspecialchars($this->input->post('stok')),
        ];


        $data['total'] = $data['harga'] * $data['stok'];
        
        $this->db->where('id', $data['id']);
        $update = $this->db->update('buku', $data);
        if ($update) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data buku berhasil diubah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } else {
            $error_message = $this->db->error(); // Mendapatkan pesan error dari database
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi kesalahan saat mengubah data buku:</strong> ' . $error_message['message'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
        $this->db->select_sum('stok', 'total_stok');
        $this->db->select_sum('total', 'total_omset');
        $this->db->where('id_penerbit', $data['id_penerbit']);
        $query = $this->db->get('buku');
        $result = $query->row_array();
        
        $total_stok = $result['total_stok'];
        $total_omset = $result['total_omset'];
        
        $this->db->set('jumlah_stok', $total_stok);
        $this->db->set('omset', $total_omset);
        $this->db->where('id_penerbit', $data['id_penerbit']);
        $this->db->update('penerbit');

    }
}

