<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function count_students() {
        return $this->db->count_all('students');
    }

    public function get_students($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('students');
        return $query->result_array();
    }

    public function search_students($search_keyword) {
        $this->db->like('first_name', $search_keyword);
        $this->db->or_like('last_name', $search_keyword);
        $this->db->or_like('email', $search_keyword);
        $query = $this->db->get('students');
        return $query->result_array();
    }
}
?>
