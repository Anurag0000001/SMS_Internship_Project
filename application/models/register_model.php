<?php
class Register_model extends CI_Model {
    public function save($data) {
        $this->db->insert('users', $data);
    }
}
?>
