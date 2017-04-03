<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url('admin'));
		}
		$this->load->model('layanan_model');
		$this->load->model('hak_akses_model');
		$this->load->model('queue_model');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'Daftar Layanan &times; QFace';
		$data['layanan'] = $this->layanan_model->get_layanan();
		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/layanan/list', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function create()
	{
		$data['title'] = 'Buat Layanan &times; QFace';
		if ($this->input->post()) {
			$post = $this->input->post();

			$this->form_validation->set_rules('name', 'name', 'required');

			$this->form_validation->set_message('required', 'Can not be empty');
			$this->form_validation->set_error_delimiters('<span class="help-block m-b-none">', '</span>');

			if ($this->form_validation->run() == FALSE) 
			{
	            $data['error'] = true;
			}
			else
			{
				$this->layanan_model->create_layanan($post);
            	$this->session->set_flashdata('success_layanan', 'Success');
				redirect(site_url('admin/layanan'));
			}
		}
		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/layanan/create', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function edit($layanan_id)
	{
		$data['title'] = 'Sunting Layanan &times; QFace';
		$data['layanan'] = $this->layanan_model->get_layanan_by_id($layanan_id);
		if ($this->input->post()) {
			$post = $this->input->post();

			$this->form_validation->set_rules('name', 'name', 'required');

			$this->form_validation->set_message('required', 'Harus diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block m-b-none">', '</span>');

			if ($this->form_validation->run() == FALSE) 
			{
	            $data['error'] = true;
			}
			else
			{
				$this->layanan_model->edit_layanan($post, $data['layanan']->layanan_id);
            	$this->session->set_flashdata('edit_layanan', 'Success');
				redirect(site_url('admin/layanan'));
			}
		}
		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/layanan/edit', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function delete($layanan_id)
	{
		$layanan = $this->layanan_model->get_layanan();
		if (count($layanan) > 2) {

			$this->queue_model->delete_queue_by_layanan_id($layanan_id);
			$this->hak_akses_model->delete_hak_akses_by_layanan_id($layanan_id);
			$this->layanan_model->delete_layanan_by_layanan_id($layanan_id);
        	$this->session->set_flashdata('delete_success', 'Success');
			redirect(site_url('admin/layanan'));
		}else{
        	$this->session->set_flashdata('delete_failed', 'failed');
			redirect(site_url('admin/layanan'));
		}
	}
}
