<?php

class Queue_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function create_queue($post, $nomor_antrian, $pelanggan_id) 
    {
         $data = array(
           'layanan_id' => $post['layanan_id'],
           'nama_pelanggan' => $post['nama'],
           'pelanggan_id' => $pelanggan_id,
           'nomor_antrian' => $nomor_antrian,
           'is_active' => 1,
           'is_finish' => 0
        );

        $this->db->insert('queue', $data);
    }

    public function get_current_queue($layanan_id) 
    {
        $this->db->select('*');
        $this->db->from('queue');
        $this->db->where('is_active', 1);
        $this->db->where('is_finish', 0);
        $this->db->where('layanan_id', $layanan_id);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function get_last_queue() 
    {
        $this->db->select('*');
        $this->db->from('queue');
        $this->db->where('is_active', 1);
        $this->db->where('is_finish', 0);
        $this->db->order_by('queue_id', 'desc');
        
        $query = $this->db->get();
        return $query->row();
    }

    public function get_last_queue_by_layanan_id($layanan_id) 
    {
        $this->db->select('*');
        $this->db->from('queue');
        $this->db->where('is_active', 1);
        $this->db->where('is_finish', 0);
        $this->db->where('layanan_id', $layanan_id);
        $this->db->order_by('queue_id', 'desc');
        
        $query = $this->db->get();
        return $query->row();
    }

    public function get_next_queue($layanan_id, $nomor_antrian) 
    {
        $this->db->select('*');
        $this->db->from('queue');
        $this->db->where('is_active', 1);
        $this->db->where('is_finish', 0);
        $this->db->where('layanan_id', $layanan_id);
        $this->db->where('nomor_antrian', $nomor_antrian);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function get_queue_by_pelanggan_id($pelanggan_id) 
    {
        $this->db->select('*');
        $this->db->from('queue');
        $this->db->join('layanan', 'layanan.layanan_id = queue.layanan_id');
        $this->db->where('is_active', 1);
        $this->db->where('pelanggan_id', $pelanggan_id);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function next_queue($queue_id) 
    {
        $data = array(
           'is_finish' => 1
        );

        $this->db->where('queue_id', $queue_id);
        $this->db->update('queue', $data);
    }

    public function reset_antrian()
    {
        $data = array(
           'is_finish' => 1,
           'is_active' => 0
        );

        $this->db->update('queue', $data);
    }

    public function delete_queue_by_layanan_id($layanan_id) 
    {
        $this->db->where('layanan_id', $layanan_id);
        $this->db->delete('queue'); 
    }
}