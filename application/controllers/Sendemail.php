<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sendemail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Users_model', 'users');
        $this->load->model('Setting_model', 'set');
        $this->load->model('Sendemail_model', 'emailsend');
    }

    public function index()
    {
        $getview['view'] = 'sendemail';
        $data['users'] = $this->users->getAllusers();

        $this->load->view('includes/header');
        $this->load->view('sendemail/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function sendemaildata()
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('sendemail');
        } else {
            $data['app'] = $this->set->getappbyid();

            $emailpelanggan = $this->input->post('emailpelanggan');
            $emailothers = $this->input->post('emailothers');
            $sendto = $this->input->post('sendto');

            if ($sendto == 'users') {
                $emailuser = $emailpelanggan;
            } else {
                $emailuser = $emailothers;
            }

            $subject = $this->input->post('subject');
            $emailmessage = $this->input->post('content');
            $host = $data['app']['smtp_host'];
            $port = $data['app']['smtp_port'];
            $username = $data['app']['smtp_username'];
            $password = $data['app']['smtp_password'];
            $from = $data['app']['smtp_from'];
            $appname = $data['app']['app_name'];
            $secure = $data['app']['smtp_secure'];
            $address = $data['app']['app_address'];
            $linkgoogle = $data['app']['app_linkgoogle'];
            $web = $data['app']['app_website'];

            $content = $this->emailsend->template2($subject, $emailmessage, $address, $appname, $linkgoogle, $web);
            $success = $this->emailsend->emailsend($subject . " [" . rand(0, 999999) . "]", $emailuser, $content, $host, $port, $username, $password, $from, $appname, $secure);

            if ($success) {
                $this->session->set_flashdata('success', 'Email Has Been Sended');
                redirect('sendemail');
            } else {
                $this->session->set_flashdata('danger', 'Error, please try again!');
                redirect('sendemail');
            }
        }
    }
}
