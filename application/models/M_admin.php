<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function getUser()
    {
        return $this->db->get('users')->result_array();
    }

    public function delete_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getUserEdit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
