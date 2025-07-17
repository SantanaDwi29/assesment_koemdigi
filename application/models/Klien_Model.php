<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_Model extends CI_Model {

    public function get_all_clients()
    {
        $this->db->where('is_client', 1);
        return $this->db->get('db_user')->result();
    }
}