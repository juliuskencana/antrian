<?php

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check_username($post) 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function change_password($post) 
    {
        $data = array(
           'password' => $this->phpass->hash($post['npass'])
        );

        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('user', $data);
    }

    public function get_user_by_id($user_id) 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }


    public function check_login($post)
    {
        $check_username = $this->check_username($post);
        if ($check_username) {
            $check_password = $this->phpass->check($post['password'], $check_username->password);

            if ($check_password == true)
            {
                return $check_username;
            }
            else
            {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('admin'));
            }
        }else{
            $this->session->set_flashdata('error', 'Error');
            redirect(base_url('admin'));
        }
    }
}