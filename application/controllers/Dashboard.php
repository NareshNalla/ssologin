<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Dashboard_model', 'dsb');
        $this->load->model('Users_model', 'users');
        $this->load->model('Purchase_model', 'prc');
        $this->load->model('Setting_model', 'set');
    }

    public function index()
    {
        $getview['view'] = 'dashboard';
        $data['match'] = $this->dsb->getallmatches();
        $data['like'] = $this->dsb->getalllike();
        $data['users'] = $this->users->getAllusers();
        $data['visit'] = $this->dsb->getAllvisit();
        $data['currency'] = $this->set->getcurrency();
        $data['totalamount'] = $this->prc->getpurchasetotalamount();
        $data['totalpaypal'] = $this->prc->getpaypaltotalamount();
        $data['totalstripe'] = $this->prc->getstripetotalamount();
        $data['totalrazorpay'] = $this->prc->getrazorpaytotalamount();
        $data['totalflutterwave'] = $this->prc->getflutterwavetotalamount();
        $data['vip'] = $this->users->totalvipuser();
        $data['totalmatch'] = $this->dsb->gettotalmatch();
        $data['totalprogress'] = $this->dsb->getprogresstotalmatch();
        $data['activity'] = $this->dsb->getallactivity();

        $this->load->view('includes/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('includes/footer', $getview);
    }
}
