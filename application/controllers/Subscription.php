<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscription extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }

        $this->load->model('Subscription_model', 'subs');
        $this->load->model('Setting_model', 'set');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $getview['view'] = 'subscription';
        $data['subscription'] = $this->subs->getAllsubs();
        $data['currency'] = $this->set->getcurrency();
        $this->load->view('includes/header');
        $this->load->view('subscription/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function addsubscriptionview()
    {
        $getview['view'] = 'addsubscription';
        $this->load->view('includes/header');
        $this->load->view('subscription/addsubscription');
        $this->load->view('includes/footer', $getview);
    }

    public function addsubs()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|prep_for_form');
        $this->form_validation->set_rules('time', 'time', 'trim|prep_for_form');
        $this->form_validation->set_rules('price', 'price', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {

            if (@$_FILES['package_icon']['name']) {

                $config['upload_path']     = './images/subs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('package_icon')) {
                    $photo = html_escape($this->upload->data('file_name'));
                } else {
                    $photo = 'noimage.jpg';
                }
            }

            $price = html_escape($this->input->post('price', TRUE));

            $remove = array(".", ",");
            $add = array("", "");

            $data             = [
                'icon'                      => $photo,
                'status'                    => html_escape($this->input->post('status', TRUE)),
                'title'                     => html_escape($this->input->post('title', TRUE)),
                'time'                      => html_escape($this->input->post('time', TRUE)),
                'type'                      => html_escape($this->input->post('type', TRUE)),
                'price'                => str_replace($remove, $add, $price)

            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('subscription');
            } else {
                $success = $this->subs->addsubs($data);

                if ($success) {
                    $this->session->set_flashdata('success', 'Package Has Been Added');
                    redirect('subscription');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('subscription/addsubscriptionview/');
                }
            }
        } else {
            $this->session->set_flashdata('danger', 'Failed, check the data you entered!');
            redirect('subscription/addsubscriptionview');
        }
    }

    public function editsubscriptionview($id)
    {
        $getview['view'] = 'addsubscription';
        $data['subs'] = $this->subs->getsubsbyid($id);

        $this->load->view('includes/header');
        $this->load->view('subscription/editsubscription', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function editsubs()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|prep_for_form');
        $this->form_validation->set_rules('time', 'time', 'trim|prep_for_form');
        $this->form_validation->set_rules('price', 'price', 'trim|prep_for_form');

        $id = html_escape($this->input->post('id', TRUE));

        if ($this->form_validation->run() == TRUE) {

            @$_FILES['package_icon']['name'];

            if ($_FILES != NULL) {

                $config['upload_path']     = './images/subs';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);


                $dataimage = $this->subs->getsubsbyid($id);

                if ($this->upload->do_upload('package_icon')) {
                    if ($dataimage['icon'] != 'noimage.jpg' || $dataimage['icon'] != '') {
                        $gambar = $dataimage['icon'];
                        unlink('images/subs/' . $gambar);
                    }

                    $image = html_escape($this->upload->data('file_name'));
                } else {
                    $image = $dataimage['icon'];
                }
            }

            $price = html_escape($this->input->post('price', TRUE));

            $remove = array(".", ",");
            $add = array("", "");

            $data             = [
                'icon'                 => $image,
                'id'                    => $id,
                'title'                     => html_escape($this->input->post('title', TRUE)),
                'time'                      => html_escape($this->input->post('time', TRUE)),
                'type'                      => html_escape($this->input->post('type', TRUE)),
                'status'                    => html_escape($this->input->post('status', TRUE)),
                'price'                    => str_replace($remove, $add, $price)
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('subscription' . $this->input->post('userid', TRUE));
            } else {
                $success = $this->subs->editsubs($data);

                if ($success) {
                    $this->session->set_flashdata('success', 'User main info has been change');
                    redirect('subscription');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('subscription/editsubscriptionview/' . $id);
                }
            }
        }

        $this->session->set_flashdata('danger', 'Failed, check the data you entered!');
        redirect('subscription/editsubscriptionview/' . $id);
    }

    public function deletesubs($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('subscription');
        } else {
            $data = $this->subs->getsubsbyid($id);
            $image = $data['icon'];
            unlink('images/subs/' . $image);

            $success = $this->subs->deletesubsbyid($id);
            if ($success) {
                $this->session->set_flashdata('success', 'Package Has Been Deleted');
                redirect('subscription');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('subscription');
            }
        }
    }
}
