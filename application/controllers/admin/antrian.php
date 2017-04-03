<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url('admin/dashboard'));
		}

        if ($this->session->userdata('role') != 'customer') {
			redirect(site_url('admin/dashboard'));
		}

		$this->load->model('layanan_model');
		$this->load->model('queue_model');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['layanan'] = $this->layanan_model->get_layanan();
        $data['error'] = false;
        if ($this->input->post()) {
        	$post = $this->input->post();
        	$layanan = $this->layanan_model->get_layanan_by_id($post['layanan_id']);
        	$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('layanan_id', 'layanan_id', 'required');


			$this->form_validation->set_message('required', 'Harus diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block m-b-none">', '</span>');

			if ($this->form_validation->run() == FALSE) 
			{
	            $data['error'] = true;
			}
			else
			{
				$last_queue = $this->queue_model->get_last_queue();
				$last_queue_by_layanan_id = $this->queue_model->get_last_queue_by_layanan_id($post['layanan_id']);
				// if ($last_queue) {
					if ($last_queue_by_layanan_id) {
						$pelanggan_ids = ucfirst($layanan->nama_layanan[0]) . ((substr($last_queue_by_layanan_id->pelanggan_id, 1)) + 1);
						$nomor_antrian = (intval($last_queue_by_layanan_id->nomor_antrian)) + 1;
					}else{
						$pelanggan_ids = ucfirst($layanan->nama_layanan[0]) . '1';
						$nomor_antrian = 1;
					}
				// }else{
				// 	$pelanggan_ids = 'Q1';
				// 	$nomor_antrian = 1;
				// }

				$this->queue_model->create_queue($post, $nomor_antrian, $pelanggan_ids);
            	$this->session->set_flashdata('success_antrian', $pelanggan_ids);
				redirect(site_url('admin/antrian'));
			}
        }
		

		$data['title'] = 'Antrian &times; QFace';

		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/enter_antrian');
		$this->load->view('_components/footer_admin');
	}
}