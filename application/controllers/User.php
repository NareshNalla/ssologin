<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $getview['view'] = 'user';
        $data['users'] = $this->users->getAllusers();
        $data['trending'] = $this->users->trending();

        $this->load->view('includes/header');
        $this->load->view('user/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function detailusers($id)
    {
        $getview['view'] = 'detailuser';
        $countvisitor = count($this->users->getAllvisitor($id));
        if ($countvisitor > 999) {
            $formatvisitor = ($countvisitor / 1000) . 'k+';
        } else {
            $formatvisitor = $countvisitor;
        }

        $countliked = count($this->users->getAllliked($id));
        if ($countliked > 999) {
            $formatliked = ($countliked / 1000) . 'k+';
        } else {
            $formatliked = $countliked;
        }

        $countmatch = count($this->users->getAllusermatch($id));
        if ($countmatch > 999) {
            $formatmatch = ($countmatch / 1000) . 'k+';
        } else {
            $formatmatch = $countmatch;
        }

        $data['totalvisitor'] = $formatvisitor;
        $data['totalliked'] = $formatliked;
        $data['totalmatch'] = $formatmatch;
        $data['users'] = $this->users->getusersbyid($id);
        $data['like'] = $this->users->getAlllike($id);
        $data['liked'] = $this->users->getAllliked($id);
        $data['visit'] = $this->users->getAllvisit($id);
        $data['visitor'] = $this->users->getAllvisitor($id);
        $data['match'] = $this->users->getAllusermatch($id);
        $data['gallery'] = $this->users->getAllusergallery($id);
        $data['totallike'] = $this->users->usertotallikebyid($id);
        $data['totalmatch'] = $this->users->usertotalmatchbyid($id);
        $data['purchase'] = $this->users->getuserpurchase($id);
        $data['currency'] = $this->set->getcurrency();

        $dateage = $data['users']['birthday'];
        $dateage = explode("-", $dateage);
        $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
            ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

        if ($data['users']['expired'] > date("Y-m-d")) {
            $vip = "1";
        } else {
            $vip = "0";
        }

        $data['age'] = $age;
        $data['vip'] = $vip;

        $this->load->view('includes/header');
        $this->load->view('user/userdetail', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function editmaininfo()
    {
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|prep_for_form');
        $this->form_validation->set_rules('country_code', 'country_code', 'trim|prep_for_form');
        $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|prep_for_form');
        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');

        $id = html_escape($this->input->post('userid', TRUE));

        if ($this->form_validation->run() == TRUE) {

            @$_FILES['userimage']['name'];

            if ($_FILES != NULL) {

                $config['upload_path']     = './images/users';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);


                $datafoto = $this->users->getusersbyid($id);

                if ($this->upload->do_upload('userimage')) {
                    if ($datafoto['userimage'] != 'noimage.jpg' || $datafoto['userimage'] != '') {
                        $gambar = $datafoto['userimage'];
                        unlink('images/users/' . $gambar);
                    }

                    $photo = html_escape($this->upload->data('file_name'));
                } else {
                    $photo = $datafoto['userimage'];
                }
            }

            $data             = [
                'userimage'             => $photo,
                'userid'                    => $id,
                'fullname'           => html_escape($this->input->post('fullname', TRUE)),
                'gender'                => html_escape($this->input->post('gender', TRUE)),
                'country_code'           => html_escape($this->input->post('country_code', TRUE)),
                'phone_number'           => html_escape($this->input->post('phone_number', TRUE)),
                'email'                => html_escape($this->input->post('email', TRUE)),
                'password'                => sha1($this->input->post('password', TRUE))
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('user/detailusers/' . $this->input->post('userid', TRUE));
            } else {
                $success = $this->users->edituser($data);

                if ($success) {
                    $this->session->set_flashdata('success', 'User main info has been change');
                    redirect('user/detailusers/' . $id);
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('user/detailusers/' . $id);
                }
            }
        }

        $this->session->set_flashdata('danger', 'Failed, check the data you entered!');
        redirect('user/detailusers/' . $id);
    }

    public function editdetailinfo()
    {
        $this->form_validation->set_rules('height', 'height', 'trim|prep_for_form');
        $this->form_validation->set_rules('weight', 'weight', 'trim|prep_for_form');
        $this->form_validation->set_rules('relationship', 'relationship', 'trim|prep_for_form');
        $this->form_validation->set_rules('nation', 'nation', 'trim|prep_for_form');
        $this->form_validation->set_rules('occupation', 'occupation', 'trim|prep_for_form');
        $this->form_validation->set_rules('company', 'company', 'trim|prep_for_form');
        $this->form_validation->set_rules('interesting', 'interesting', 'trim|prep_for_form');
        $this->form_validation->set_rules('birthday', 'birthday', 'trim|prep_for_form');
        $this->form_validation->set_rules('about', 'about', 'trim|prep_for_form');

        $id = html_escape($this->input->post('userid', TRUE));

        if ($this->form_validation->run() == TRUE) {


            $data             = [
                'userid'                    => $id,
                'height'           => html_escape($this->input->post('height', TRUE)),
                'weight'           => html_escape($this->input->post('weight', TRUE)),
                'relationship'           => html_escape($this->input->post('relationship', TRUE)),
                'nation'                => html_escape($this->input->post('nation', TRUE)),
                'occupation'                => html_escape($this->input->post('occupation', TRUE)),
                'company'                => html_escape($this->input->post('company', TRUE)),
                'birthday'                => html_escape($this->input->post('birthday', TRUE)),
                'about'                => html_escape($this->input->post('about', TRUE)),
                'interesting'                => html_escape($this->input->post('interesting', TRUE))
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('user/detailusers/' . $this->input->post('userid', TRUE));
            } else {
                $success = $this->users->edituser($data);

                if ($success) {
                    $this->session->set_flashdata('success', 'User main info has been change');
                    redirect('user/detailusers/' . $id);
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('user/detailusers/' . $id);
                }
            }
        }

        $this->session->set_flashdata('danger', 'Failed, check the data you entered!');
        redirect('user/detailusers/' . $id);
    }

    public function addgallery()
    {
        $id = html_escape($this->input->post('userid', TRUE));

        @$_FILES['imagename']['name'];

        if ($_FILES != NULL) {

            $config['upload_path']     = './images/users';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->upload->initialize($config);


            if ($this->upload->do_upload('imagename')) {

                $galleryimage = html_escape($this->upload->data('file_name'));

                $data             = [
                    'imagename'                 => $galleryimage,
                    'userid'                    => $id,
                ];

                if (demo == TRUE) {
                    $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                    redirect('user/detailusers/' . $this->input->post('userid', TRUE));
                } else {
                    $success = $this->users->addgallery($data);



                    if ($success) {
                        $this->session->set_flashdata('success', 'Gallery has been added');
                        redirect('user/detailusers/' . $id);
                    } else {
                        $this->session->set_flashdata('danger', 'Error, please try again!');
                        redirect('user/detailusers/' . $id);
                    }
                }
            } else {

                $this->session->set_flashdata('danger', 'Image cannot be uploaded');
                redirect('user/detailusers/' . $id);
            }
        }
    }

    public function deletegallery($id, $iduser)
    {

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('user/detailusers/' . $iduser);
        } else {
            $gallery = $this->users->getgallerybyid($id);
            $filename = $gallery['imagename'];

            unlink('images/users/' . $filename);

            $success = $this->users->deletegallerybyid($id);

            if ($success) {

                $this->session->set_flashdata('success', 'Gallery Has Been Deleted');
                redirect('user/detailusers/' . $iduser);
            } else {

                $this->session->set_flashdata('danger', 'Something Wrong!');
                redirect('user/detailusers/' . $iduser);
            }
        }
    }

    public function adduserview()
    {
        $getview['view'] = 'adduser';

        $this->load->view('includes/header');
        $this->load->view('user/adduser');
        $this->load->view('includes/footer', $getview);
    }

    public function adduser()
    {
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|prep_for_form');
        $this->form_validation->set_rules('country_code', 'country_code', 'trim|prep_for_form');
        $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|prep_for_form|is_unique[users.phone_number]');
        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');
        $this->form_validation->set_rules('height', 'height', 'trim|prep_for_form');
        $this->form_validation->set_rules('weight', 'weight', 'trim|prep_for_form');
        $this->form_validation->set_rules('relationship', 'relationship', 'trim|prep_for_form');
        $this->form_validation->set_rules('nation', 'nation', 'trim|prep_for_form');
        $this->form_validation->set_rules('occupation', 'occupation', 'trim|prep_for_form');
        $this->form_validation->set_rules('company', 'company', 'trim|prep_for_form');
        $this->form_validation->set_rules('interesting', 'interesting', 'trim|prep_for_form');
        $this->form_validation->set_rules('birthday', 'birthday', 'trim|prep_for_form');
        $this->form_validation->set_rules('about', 'about', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {

            if (@$_FILES['userimage']['name']) {

                $config['upload_path']     = './images/users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('userimage')) {
                    $photo = html_escape($this->upload->data('file_name'));
                } else {
                    $photo = 'noimage.jpg';
                }
            }

            $phone = html_escape($this->input->post('phone_number', TRUE));
            $countrycode = html_escape($this->input->post('country_code', TRUE));
            $phonenumber = str_replace("+", "", $countrycode) . $phone;
            $id = $phonenumber . time();

            $data             = [
                'userimage'                 => $photo,
                'userid'                    => $id,
                'no_telepon'                => $phonenumber,
                'statususer'                => 1,
                'token'                     => time(),
                'fullname'                  => html_escape($this->input->post('fullname', TRUE)),
                'gender'                    => html_escape($this->input->post('gender', TRUE)),
                'country_code'              => html_escape($this->input->post('country_code', TRUE)),
                'phone_number'              => html_escape($this->input->post('phone_number', TRUE)),
                'email'                     => html_escape($this->input->post('email', TRUE)),
                'password'                  => sha1($this->input->post('password', TRUE)),
                'height'           => html_escape($this->input->post('height', TRUE)),
                'weight'           => html_escape($this->input->post('weight', TRUE)),
                'relationship'           => html_escape($this->input->post('relationship', TRUE)),
                'nation'                => html_escape($this->input->post('nation', TRUE)),
                'occupation'                => html_escape($this->input->post('occupation', TRUE)),
                'company'                => html_escape($this->input->post('company', TRUE)),
                'birthday'                => html_escape($this->input->post('birthday', TRUE)),
                'about'                => html_escape($this->input->post('about', TRUE)),
                'interesting'                => html_escape($this->input->post('interesting', TRUE))
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('user/adduserview');
            } else {
                $success = $this->users->adduser($data);

                if ($success) {
                    $this->session->set_flashdata('success', 'Gallery has been added');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect('user/adduserview/');
                }
            }
        } else {
            $this->session->set_flashdata('danger', 'Failed, check the data you entered! phone number or email already exist');
            redirect('user/adduserview');
        }
    }

    public function deleteusers($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('user');
        } else {
            $data = $this->users->getusersbyid($id);
            $gambar = $data['userimage'];
            unlink('images/users/' . $gambar);

            $datagallery = $this->users->getusergallery($id);

            foreach ($datagallery as $glr) {
                $gallery = $glr['imagename'];
                unlink('images/users/' . $gallery);
            }

            $success = $this->users->deletedatauserbyid($id);
            if ($success) {
                $this->session->set_flashdata('success', 'User Has Been Deleted');
                redirect('user');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('user');
            }
        }
    }

    public function block($id)
    {
        $success = $this->users->blockusersById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'User Has Been Blocked');
            redirect('user');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('user');
        }
    }

    public function unblock($id)
    {
        $success = $this->users->unblockusersById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'User Has Been Unblocked');
            redirect('user');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('user');
        }
    }
}
