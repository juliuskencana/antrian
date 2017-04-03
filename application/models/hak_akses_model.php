<?php

class Hak_akses_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_hak_akses($user_id) 
    {
        $this->db->select('*');
        $this->db->from('hak_akses');
        $this->db->where('user_id', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_hak_akses($user_id, $post) 
    {
         $data = array(
           'user_id'   => $user_id,
           'layanan_id'   => $post['hak_akses']
        );

        $this->db->insert('hak_akses', $data);
    }

    public function delete_hak_akses($user_id) 
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('hak_akses'); 
    }

    public function delete_hak_akses_by_layanan_id($layanan_id) 
    {
        $this->db->where('layanan_id', $layanan_id);
        $this->db->delete('hak_akses'); 
    }

    public function edit_hak_akses($user_id, $post) 
    {
         $data = array(
           'layanan_id'   => $post['hak_akses']
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('hak_akses', $data);
    }
}