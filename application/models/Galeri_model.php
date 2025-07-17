<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

    // Mengambil semua event, beserta foto-fotonya
    public function get_all_events() {
        $events = $this->db->order_by('tanggal_event', 'DESC')->get('tb_galeri_event')->result();
        // Untuk setiap event, ambil foto-fotonya
        foreach ($events as $event) {
            $event->photos = $this->db->get_where('tb_galeri_foto', ['id_event' => $event->id_event])->result();
        }
        return $events;
    }
    
    // Mengambil satu event berdasarkan ID, beserta foto-fotonya
    public function get_event_by_id($id) {
        $event = $this->db->get_where('tb_galeri_event', ['id_event' => $id])->row();
        if ($event) {
            $event->photos = $this->db->get_where('tb_galeri_foto', ['id_event' => $event->id_event])->result();
        }
        return $event;
    }

    // Menambah event baru
    public function insert_event($data) {
        $this->db->insert('tb_galeri_event', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari event yang baru dibuat
    }

    // Menambah foto (bisa lebih dari satu sekaligus)
    public function insert_photos($data) {
        return $this->db->insert_batch('tb_galeri_foto', $data);
    }

    // Mengupdate detail event
    public function update_event($data, $id) {
        return $this->db->update('tb_galeri_event', $data, ['id_event' => $id]);
    }

    // Menghapus satu foto dari database dan file
    public function delete_photo($id_foto) {
        // Ambil nama file sebelum dihapus dari DB
        $photo = $this->db->get_where('tb_galeri_foto', ['id_foto' => $id_foto])->row();
        if ($photo) {
            $filename = FCPATH.'assets/img/galeri/'.$photo->nama_file;
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
        // Hapus dari database
        return $this->db->delete('tb_galeri_foto', ['id_foto' => $id_foto]);
    }
    
    // Menghapus event beserta semua foto-fotonya
    public function delete_event($id) {
        // Ambil semua foto dari event ini untuk dihapus filenya
        $photos = $this->db->get_where('tb_galeri_foto', ['id_event' => $id])->result();
        foreach ($photos as $photo) {
            $filename = FCPATH.'assets/img/galeri/'.$photo->nama_file;
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
        // Hapus dari database (karena ada ON DELETE CASCADE, foto di tb_galeri_foto akan ikut terhapus)
        return $this->db->delete('tb_galeri_event', ['id_event' => $id]);
    }
}