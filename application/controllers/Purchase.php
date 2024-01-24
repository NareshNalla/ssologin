<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Users_model', 'users');
        $this->load->model('Setting_model', 'set');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $getview['view'] = 'purchase';
        $data['purchase'] = $this->users->getAllpurchase();
        $data['currency'] = $this->set->getcurrency();

        $this->load->view('includes/header');
        $this->load->view('purchase/index', $data);
        $this->load->view('includes/footer', $getview);
    }
}
