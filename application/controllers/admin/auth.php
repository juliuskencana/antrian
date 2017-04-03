<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
    }

	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE) {
        	if ($this->session->userdata('role') == 'admin') {
                redirect(site_url('admin/layanan'));
			}elseif ($this->session->userdata('role') == 'operator') {
                redirect(site_url('admin/dashboard'));
			}elseif ($this->session->userdata('role') == 'customer') {
                redirect(site_url('admin/antrian'));
			}
		}
        if ($this->input->post()) {
        	$post = $this->input->post();
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) 
			{
                $this->session->set_flashdata('error', 'Error');
                redirect(site_url('admin'));
			}
			else
			{
				$check_login = $this->login_model->check_login($post);
				if ($check_login == true)
				{
					$session = array(
	                   'user_id'  => $check_login->user_id,
	                   'username'  => $check_login->username,
	                   'role'  => $check_login->role,
	                   'logged_in' => TRUE
	               );

					$this->session->set_userdata($session);
					if ($check_login->role == 'admin') {
		                redirect(site_url('admin/layanan'));
					}elseif ($check_login->role == 'operator') {
		                redirect(site_url('admin/dashboard'));
					}elseif ($check_login->role == 'customer') {
		                redirect(site_url('admin/antrian'));
					}

				}
				else
				{
	                $this->session->set_flashdata('error', 'Error');
	                redirect(site_url('admin'));
				}
			}
        }
		

		$data['title'] = 'Login Administrator &times; QFace';
		$this->load->view('admin/login', $data);
	}

	public function setting()
	{
        if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url('admin'));
		}

    	$data['error'] = false;
    	$data['error_old'] = false;
		$data['title'] = 'Settings &times; QFace';

		if ($this->input->post()) {
        	$post = $this->input->post();
			$this->form_validation->set_rules('opass', 'Old Password', 'required');
			$this->form_validation->set_rules('npass', 'New Password', 'required');
			$this->form_validation->set_rules('cpass', 'Confirm password', 'matches[npass]');

			$this->form_validation->set_message('required', 'Harus diisi');
			$this->form_validation->set_message('matches', 'Password baru tidak sama dengan Konfirmasi Password');
			$this->form_validation->set_error_delimiters('<span class="help-block m-b-none">', '</span>');

			if ($this->form_validation->run() == FALSE) 
			{
				$data['error'] = true;
			}
			else
			{
        		$user = $this->login_model->get_user_by_id($this->session->userdata('user_id'));
				$check_password = $this->phpass->check($post['opass'], $user->password);

                if ($check_password == true)
                {
                    $this->login_model->change_password($post);
	                $this->session->set_flashdata('success', 'success');
	                redirect(site_url('admin/auth/setting'));
                }
                else
                {
                	$data['error'] = false;
                	$data['error_old'] = true;
                }
			}
        }

		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/setting');
		$this->load->view('_components/footer_admin');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('admin'));
	}
}
