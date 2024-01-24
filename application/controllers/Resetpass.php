<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resetpass extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Resetpass_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		redirect('nodata');
	}

	public function rest($token = null)
	{
		$data['user'] = $this->Resetpass_model->check_token($token);
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($data['user']) {
			if ($this->form_validation->run() == false) {
				$this->load->view('resetpass', $data);
			} else {
				$reset = $this->Resetpass_model->resetpass();
				if ($reset) {
					$this->Resetpass_model->deletetoken();
					$this->load->view('success');
				}
			}
		} else {
			redirect('nodata');
		}
	}
}
