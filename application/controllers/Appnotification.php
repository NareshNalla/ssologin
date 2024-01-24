<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appnotification extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Notification_model', 'notif');
    }

    public function index()
    {
        $getview['view'] = 'sendnotification';
        $this->load->view('includes/header');
        $this->load->view('appnotification/index');
        $this->load->view('includes/footer', $getview);
    }

    public function sendnotification()
    {

        $topic = 'QDating';
        $title = $this->input->post('title');
        $message = $this->input->post('message');
        $success = $this->notif->send_notif($title, $message, $topic);
        if ($success) {
            $this->session->set_flashdata('success', 'Notification Hass Been Sended');
            redirect('appnotification');
        } else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('appnotification');
        }
    }
}
