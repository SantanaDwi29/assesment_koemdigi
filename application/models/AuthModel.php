<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    private $table = 'db_user';

    public function register_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where($this->table, ['Username' => $username])->row_array();
    }
    public function get_by_id($id_user)
    {
        return $this->db->get_where($this->table, ['idUser' => $id_user])->row();
    }
    public function count_all()
{
    return $this->db->count_all($this->table);
}
}