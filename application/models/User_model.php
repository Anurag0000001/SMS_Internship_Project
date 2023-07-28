<?php
class User_model extends CI_Model {
    public function get_user($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }
    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
    }
    
    public function add_user($data) {
        $this->db->insert('users', $data);
    }
    public function get_user_profile_image($user_id)
    {
        $this->db->select('profile_image');
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['profile_image'];
        } else {
            return '';
        }
    }
}
?>
