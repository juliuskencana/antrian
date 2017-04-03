<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url('admin'));
		}
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('hak_akses_model');
		$this->load->model('layanan_model');
    }

	public function index()
	{
		$data['title'] = 'Daftar pengguna &times; QFace';
		$data['pengguna'] = $this->user_model->get_user();

		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/user/list', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function create()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('hak_akses', 'hak_akses', 'required');

			$this->form_validation->set_message('is_unique', 'Username tidak tersedia');
			$this->form_validation->set_message('required', 'Harus diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block m-b-none">', '</span>');

			if ($this->form_validation->run() == FALSE) 
			{
	            $data['error'] = true;
			}
			else
			{
				$this->user_model->create_user($post);
				$user_id = $this->db->insert_id();
				$this->hak_akses_model->insert_hak_akses($user_id, $post);
            	$this->session->set_flashdata('success_pengguna', 'Success');
				redirect(site_url('admin/pengguna'));
			}
		}
		$data['title'] = 'Buat pengguna &times; QFace';
		$data['layanan'] = $this->layanan_model->get_layanan();

		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/user/create', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function edit($user_id)
	{

		$data['title'] = 'Sunting pengguna &times; QFace';
		$data['user'] = $this->user_model->get_user_by_user_id($user_id);
		$data['layanan'] = $this->layanan_model->get_layanan();

		if ($this->input->post()) {
			$post = $this->input->post();
			if ($post['username'] != $data['user']->username) {
				$this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]');
				$this->form_validation->set_message('is_unique', 'Username tidak tersedia');
			}
			$this->form_validation->set_rules('hak_akses', 'hak_akses', 'required');

			$this->form_validation->set_message('required', 'Harus diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block m-b-none">', '</span>');

			if ($this->form_validation->run() == FALSE) 
			{
	            $data['error'] = true;
			}
			else
			{
				$hak_akses = $this->hak_akses_model->get_hak_akses($user_id);
				if ($hak_akses) {
					$this->user_model->edit_user($user_id, $post);
					$this->hak_akses_model->edit_hak_akses($user_id, $post);
				}else{
					$this->user_model->edit_user($user_id, $post);
					$this->hak_akses_model->insert_hak_akses($user_id, $post);
				}
            	$this->session->set_flashdata('edit_pengguna', 'Success');
				redirect(site_url('admin/pengguna'));
			}
		}

		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/user/edit', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function delete($user_id)
	{
		$this->hak_akses_model->delete_hak_akses($user_id);
		$this->user_model->delete_user($user_id);
    	$this->session->set_flashdata('success_delete', 'Success');
		redirect(site_url('admin/pengguna'));
	}
}
