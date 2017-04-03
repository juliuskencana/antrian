<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user() 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 'operator');
        // $this->db->join('hak_akses', 'hak_akses.user_id = user.user_id');
        // $this->db->join('layanan', 'layanan.layanan_id = hak_akses.layanan_id');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_join_by_user_id($user_id) 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('hak_akses', 'hak_akses.user_id = user.user_id');
        $this->db->join('layanan', 'layanan.layanan_id = hak_akses.layanan_id');
        $this->db->where('user.user_id', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function get_user_by_user_id($user_id) 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.user_id', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function create_user($post) 
    {
         $data = array(
           'username'   => $post['username'],
           'password'   => $this->phpass->hash($post['username']),
           'role'       => 'operator' 
        );

        $this->db->insert('user', $data);
    }

    public function edit_user($user_id, $post) 
    {
         $data = array(
           'username'   => $post['username']
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
    }

    public function delete_user($user_id) 
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user'); 
    }
}