<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Setting_model', 'set');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function appsettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/appsettings', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function emailsettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/emailsettings', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function smtpsettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/smtpsettings', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function stripesettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/stripesettings', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function paypalsettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/paypalsettings', $data);
        $this->load->view('includes/footer', $getview);
    }
    
    public function razorpaysettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/razorpaysettings', $data);
        $this->load->view('includes/footer', $getview);
    }
    
        public function flutterwavesettings()
    {
        $data['setting'] = $this->set->getappbyid();
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('setting/flutterwavesettings', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function editapp()
    {


        $this->form_validation->set_rules('app_email', 'app_email', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_website', 'app_website', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_linkgoogle', 'app_linkgoogle', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_currency', 'app_currency', 'trim|prep_for_form');
        $this->form_validation->set_rules('fcm_key', 'fcm_key', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {

            $data             = [
                'app_email'                    => html_escape($this->input->post('app_email', TRUE)),
                'app_website'                => html_escape($this->input->post('app_website', TRUE)),
                'app_contact'                => html_escape($this->input->post('app_contact', TRUE)),
                'fcm_key'                => html_escape($this->input->post('fcm_key', TRUE)),
                'app_privacy_policy'        => $this->input->post('app_privacy_policy', TRUE),
                'app_aboutus'                => $this->input->post('app_aboutus', TRUE),
                'app_address'                => $this->input->post('app_address'),
                'app_linkgoogle'            => html_escape($this->input->post('app_linkgoogle', TRUE)),
                'app_name'                  => html_escape($this->input->post('app_name', TRUE)),
                'app_currency'                => html_escape($this->input->post('app_currency', TRUE))
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/appsettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'APP Has Been Changed');
                    redirect('setting/appsettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/appsettings');
                }
            }
        } else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/appsettings');
        }
    }


    public function editemail()
    {

        $this->form_validation->set_rules('email_subject', 'email_subject', 'trim|prep_for_form');
        $this->form_validation->set_rules('email_subject_confirm', 'email_subject', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'email_subject'                    => html_escape($this->input->post('email_subject', TRUE)),
                'email_subject_confirm'                    => html_escape($this->input->post('email_subject_confirm', TRUE)),
                'email_text1'                    => $this->input->post('email_text1'),
                'email_text2'                    => $this->input->post('email_text2'),
                'email_text3'                    => $this->input->post('email_text3'),
                'email_text4'                    => $this->input->post('email_text4')
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/emailsettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'Email Settings Has Been Changed');
                    redirect('setting/emailsettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/emailsettings');
                }
            }
        } else {

            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/emailsettings');
        }
    }

    public function editsmtp()
    {

        $this->form_validation->set_rules('smtp_host', 'smtp_host', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_port', 'smtp_port', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_username', 'smtp_username', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_password', 'smtp_password', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_form', 'smtp_form', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_secure', 'smtp_secure', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'smtp_host'                        => html_escape($this->input->post('smtp_host', TRUE)),
                'smtp_port'                        => html_escape($this->input->post('smtp_port', TRUE)),
                'smtp_username'                    => html_escape($this->input->post('smtp_username', TRUE)),
                'smtp_password'                    => html_escape($this->input->post('smtp_password', TRUE)),
                'smtp_from'                        => html_escape($this->input->post('smtp_from', TRUE)),
                'smtp_secure'                    => html_escape($this->input->post('smtp_secure', TRUE))
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/smtpsettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'SMTP Settings Has Been Changed');
                    redirect('setting/smtpsettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/smtpsettings');
                }
            }
        } else {

            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/smtpsettings');
        }
    }

    public function editstripe()
    {

        $this->form_validation->set_rules('stripe_secret_key', 'stripe_secret_key', 'trim|prep_for_form');
        $this->form_validation->set_rules('stripe_published_key', 'stripe_published_key', 'trim|prep_for_form');
        $this->form_validation->set_rules('stripe_status', 'stripe_status', 'trim|prep_for_form');
        $this->form_validation->set_rules('stripe_active', 'stripe_active', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'stripe_secret_key'                    => html_escape($this->input->post('stripe_secret_key', TRUE)),
                'stripe_published_key'                => html_escape($this->input->post('stripe_published_key', TRUE)),
                'stripe_status'                        => html_escape($this->input->post('stripe_status', TRUE)),
                'stripe_active'                        => html_escape($this->input->post('stripe_active', TRUE))
            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/stripesettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'Stripe Settings Has Been Changed');
                    redirect('setting/stripesettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/stripesettings');
                }
            }
        } else {

            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/stripesettings');
        }
    }

    public function editpaypal()
    {

        $this->form_validation->set_rules('paypal_key', 'paypal_key', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_currency_text', 'app_currency_text', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'paypal_key'                    => html_escape($this->input->post('paypal_key', TRUE)),
                'app_currency_text'                => html_escape($this->input->post('app_currency_text', TRUE)),
                'paypal_mode'                        => html_escape($this->input->post('paypal_mode', TRUE)),
                'paypal_active'                        => html_escape($this->input->post('paypal_active', TRUE))
            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/paypalsettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'Paypal Settings Has Been Changed');
                    redirect('setting/paypalsettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/paypalsettings');
                }
            }
        } else {

            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/paypalsettings');
        }
    }
    
    public function editrazorpay()
    {

        $this->form_validation->set_rules('rzp_key', 'rzp_key', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'rzp_key'                    => html_escape($this->input->post('rzp_key', TRUE)),
                'rzp_active'                        => html_escape($this->input->post('rzp_active', TRUE))
            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/razorpaysettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'Razorpay Settings Has Been Changed');
                    redirect('setting/razorpaysettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/razorpaysettings');
                }
            }
        } else {

            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/razorpaysettings');
        }
    }
    
    public function editflutterwave()
    {

        $this->form_validation->set_rules('fw_key', 'fw_key', 'trim|prep_for_form');
        $this->form_validation->set_rules('fw_enc', 'fw_enc', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'fw_key'                    => html_escape($this->input->post('fw_key', TRUE)),
                'fw_enc'                    => html_escape($this->input->post('fw_enc', TRUE)),
                'fw_mode'                        => html_escape($this->input->post('fw_mode', TRUE)),
                'fw_active'                        => html_escape($this->input->post('fw_active', TRUE))
            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('setting/flutterwavesettings');
            } else {

                $success = $this->set->editdataappsettings($data);
                if ($success) {
                    $this->session->set_flashdata('success', 'Flutterwave Settings Has Been Changed');
                    redirect('setting/flutterwavesettings');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('setting/flutterwavesettings');
                }
            }
        } else {

            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('setting/flutterwavesettings');
        }
    }
}
