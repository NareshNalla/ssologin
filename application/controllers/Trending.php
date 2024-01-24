<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trending extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Users_model', 'users');
    }

    public function index()
    {
        $getview['view'] = 'trending';
        $data['users'] = $this->users->getAllusers();
        $data['trending'] = $this->users->trending();

        $this->load->view('includes/header');
        $this->load->view('trending/index', $data);
        $this->load->view('includes/footer', $getview);
    }
}
