<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->load->model('Login_model', 'login');
	}

	function index()
	{
		if ($this->session->userdata('username') != NULL && $this->session->userdata('password') != NULL) {
			redirect(base_url("dashboard"));
		}
		$this->load->view('login/index');
	}

	function login_action()
	{

		$nama = html_escape($this->input->post('username', TRUE));
		$acak = html_escape($this->input->post('password', TRUE));
		$pass = sha1($acak);

		$user = $this->db->get_where('admin', ['username' => $nama, 'password' => $pass])->row_array();


		if ($user) {
			$data = [
				'id' => $user['id'],
				'username' => $user['username'],
				'password' => $user['password'],
				'image' => $user['image']
			];
			$this->session->set_userdata($data);
			header('Location: ' . base_url());
		} else {
			$this->session->set_flashdata('danger', 'Account not registered');
			redirect('login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
