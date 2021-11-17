<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discuss_model extends CI_Model
{

    public function getDiscuss()
    {
        $this->db->select('*');
        $this->db->select('users.username AS user_name', 'tags.name AS tag_name');
        $this->db->join('users', 'users.id = discuss.user_id', 'inner');
        $this->db->join('tags', 'tags.id = discuss.tag_id', 'inner');
        return $this->db->get('discuss');
    }
}

/* End of file M_Discuss.php */
