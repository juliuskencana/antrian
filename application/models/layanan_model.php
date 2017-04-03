<?php

class Layanan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_layanan() 
    {
        $this->db->select('*');
        $this->db->from('layanan');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function create_layanan($post) 
    {
         $data = array(
           'nama_layanan' => $post['name']
        );

        $this->db->insert('layanan', $data);
    }

    public function get_layanan_by_id($layanan_id) 
    {
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->where('layanan_id', $layanan_id);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_layanan($post, $layanan_id) 
    {
         $data = array(
           'nama_layanan' => $post['name']
        );

        $this->db->where('layanan_id', $layanan_id);
        $this->db->update('layanan', $data);
    }

    public function delete_queue($layanan_id) 
    {
         $data = array(
           'nama_layanan' => $post['name']
        );

        $this->db->where('layanan_id', $layanan_id);
        $this->db->update('layanan', $data);
    }

    public function delete_layanan_by_layanan_id($layanan_id) 
    {
        $this->db->where('layanan_id', $layanan_id);
        $this->db->delete('layanan'); 
    }
}