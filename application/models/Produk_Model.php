<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    // Nama tabel produk Anda
    private $table = 'tb_produk';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    
    public function get_by_id($id)
    {
        // Menggunakan $this->table
        return $this->db->get_where($this->table, ["id_produk" => $id])->row();
    }

    public function update($data, $id)
    {
          if (array_key_exists('gambar', $data)) {
            $this->_delete_image($id);
        }
        // Menggunakan $this->table
        return $this->db->update($this->table, $data, array('id_produk' => $id));
    }

    public function delete($id)
    {
        $this->_delete_image($id);
        // Menggunakan $this->table
        return $this->db->delete($this->table, array("id_produk" => $id));
    }

    private function _delete_image($id)
    {
       $produk = $this->get_by_id($id);
        if ($produk && $produk->gambar != "default.jpg") {
            $filename = FCPATH.'assets/img/produk/'.$produk->gambar;
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
    }
    public function count_all()
{
    return $this->db->count_all($this->table);
}
}