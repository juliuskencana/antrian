<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('queue_model');
		$this->load->model('layanan_model');
    }

	
	public function index()
	{
		$get = $this->input->get();

		$data['title'] = 'Search &times; QFace';
		$data['layanan'] = $this->queue_model->get_queue_by_pelanggan_id($get['id']);

		$this->load->view('search_id', $data);
	}
	
	public function getQueue()
	{
		$post = $this->input->post();
        $data['current'] = $this->queue_model->get_current_queue($post['layanan_id']);
        $data['nomor_antrian_next'] = $data['current']->nomor_antrian + 1;
        $data['next'] = $this->queue_model->get_next_queue($post['layanan_id'], $data['nomor_antrian_next']);

		echo json_encode($data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */