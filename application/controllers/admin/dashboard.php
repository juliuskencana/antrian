<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url('admin'));
		}
		$this->load->model('queue_model');
		$this->load->model('layanan_model');
		$this->load->model('hak_akses_model');
    }

	public function index()
	{
		$data['title'] = 'Dashboard &times; QFace';
		$data['layanan'] = $this->layanan_model->get_layanan();
		$data['hak_akses'] = $this->hak_akses_model->get_hak_akses($this->session->userdata('user_id'));

		$this->load->view('_components/header_admin', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('_components/footer_admin', $data);
	}

	public function getQueue()
	{
		$post = $this->input->post();
        $data['current'] = $this->queue_model->get_current_queue($post['layanan_id']);
        $data['nomor_antrian_next'] = $data['current']->nomor_antrian + 1;
        $data['next'] = $this->queue_model->get_next_queue($post['layanan_id'], $data['nomor_antrian_next']);

		echo json_encode($data);

	}

	public function nextQueue()
	{
		$post = $this->input->post();

        $current = $this->queue_model->get_current_queue($post['layanan_id']);
        $this->queue_model->next_queue($current->queue_id);

		// echo json_encode($data);

	}

	public function resetAntrian()
	{
        $this->queue_model->reset_antrian();
        $this->session->set_flashdata('sukses_reset', 'Sukses');
        redirect(site_url('admin/dashboard'));

		// echo json_encode($data);

	}
}
