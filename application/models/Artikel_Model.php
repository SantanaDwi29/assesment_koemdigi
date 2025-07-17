<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_Model extends CI_Model {

    private $table = 'tb_artikel';

    public function get_all()
    {
        return $this->db->order_by('tanggal_dibuat', 'DESC')->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ["id_artikel" => $id])->row();
    }

    public function get_by_slug($slug)
    {
        return $this->db->get_where($this->table, ["slug" => $slug])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        if (array_key_exists('gambar', $data)) {
            $this->_delete_image($id);
        }
        return $this->db->update($this->table, $data, array('id_artikel' => $id));
    }

    public function delete($id)
    {
        $this->_delete_image($id);
        return $this->db->delete($this->table, array("id_artikel" => $id));
    }

    private function _delete_image($id)
    {
        $artikel = $this->get_by_id($id);
        if ($artikel && $artikel->gambar != "default.jpg") {
            $filename = FCPATH.'assets/img/artikel/'.$artikel->gambar;
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