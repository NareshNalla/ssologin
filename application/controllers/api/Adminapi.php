<?php
//'tes' => number_format(200 / 100, 2, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Adminapi extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Dashboard_model', 'dasb');
        $this->load->model('Users_model', 'us');
        // date_default_timezone_set(time_zone);
    }

    public function chart_user_get()
    {
        $firstday = $this->dasb->chartuser(date("d") - 6, date("m"), date("Y"));
        $secondday = $this->dasb->chartuser(date("d") - 5, date("m"), date("Y"));
        $thirdday = $this->dasb->chartuser(date("d") - 4, date("m"), date("Y"));
        $forthday = $this->dasb->chartuser(date("d") - 3, date("m"), date("Y"));
        $fifthday = $this->dasb->chartuser(date("d") - 2, date("m"), date("Y"));
        $sixthday = $this->dasb->chartuser(date("d") - 1, date("m"), date("Y"));
        $seventhday = $this->dasb->chartuser(date("d"), date("m"), date("Y"));

        $message = array(
            'code'              => '200',
            'message'           => 'success',
            'firstday'          => $firstday->row('chartuser'),
            'secondday'          => $secondday->row('chartuser'),
            'thirdday'          => $thirdday->row('chartuser'),
            'forthday'          => $forthday->row('chartuser'),
            'fifthday'          => $fifthday->row('chartuser'),
            'sixthday'          => $sixthday->row('chartuser'),
            'seventhday'         => $seventhday->row('chartuser')
        );
        $this->response($message, 200);
    }

    public function chart_match_get()
    {
        $firstday = $this->dasb->chartmatch(date("d") - 6, date("m"), date("Y"));
        $secondday = $this->dasb->chartmatch(date("d") - 5, date("m"), date("Y"));
        $thirdday = $this->dasb->chartmatch(date("d") - 4, date("m"), date("Y"));
        $forthday = $this->dasb->chartmatch(date("d") - 3, date("m"), date("Y"));
        $fifthday = $this->dasb->chartmatch(date("d") - 2, date("m"), date("Y"));
        $sixthday = $this->dasb->chartmatch(date("d") - 1, date("m"), date("Y"));
        $seventhday = $this->dasb->chartmatch(date("d"), date("m"), date("Y"));

        $message = array(
            'code'              => '200',
            'message'           => 'success',
            'firstday'          => $firstday->row('chartmatch'),
            'secondday'          => $secondday->row('chartmatch'),
            'thirdday'          => $thirdday->row('chartmatch'),
            'forthday'          => $forthday->row('chartmatch'),
            'fifthday'          => $fifthday->row('chartmatch'),
            'sixthday'          => $sixthday->row('chartmatch'),
            'seventhday'         => $seventhday->row('chartmatch')
        );
        $this->response($message, 200);
    }

    public function chart_vip_get()
    {
        $firstday = $this->dasb->chartvip(date("d") - 6, date("m"), date("Y"));
        $secondday = $this->dasb->chartvip(date("d") - 5, date("m"), date("Y"));
        $thirdday = $this->dasb->chartvip(date("d") - 4, date("m"), date("Y"));
        $forthday = $this->dasb->chartvip(date("d") - 3, date("m"), date("Y"));
        $fifthday = $this->dasb->chartvip(date("d") - 2, date("m"), date("Y"));
        $sixthday = $this->dasb->chartvip(date("d") - 1, date("m"), date("Y"));
        $seventhday = $this->dasb->chartvip(date("d"), date("m"), date("Y"));

        $message = array(
            'code'              => '200',
            'message'           => 'success',
            'firstday'          => $firstday->row('chartvip'),
            'secondday'          => $secondday->row('chartvip'),
            'thirdday'          => $thirdday->row('chartvip'),
            'forthday'          => $forthday->row('chartvip'),
            'fifthday'          => $fifthday->row('chartvip'),
            'sixthday'          => $sixthday->row('chartvip'),
            'seventhday'         => $seventhday->row('chartvip')
        );
        $this->response($message, 200);
    }

    public function chart_subs_get()
    {
        $data['jan1'] = $this->dasb->getchartdashboard(1, date('Y'), 'stripe');
        $data['feb1'] = $this->dasb->getchartdashboard(2, date('Y'), 'stripe');
        $data['mar1'] = $this->dasb->getchartdashboard(3, date('Y'), 'stripe');
        $data['apr1'] = $this->dasb->getchartdashboard(4, date('Y'), 'stripe');
        $data['mei1'] = $this->dasb->getchartdashboard(5, date('Y'), 'stripe');
        $data['jun1'] = $this->dasb->getchartdashboard(6, date('Y'), 'stripe');
        $data['jul1'] = $this->dasb->getchartdashboard(7, date('Y'), 'stripe');
        $data['aug1'] = $this->dasb->getchartdashboard(8, date('Y'), 'stripe');
        $data['sep1'] = $this->dasb->getchartdashboard(9, date('Y'), 'stripe');
        $data['okt1'] = $this->dasb->getchartdashboard(10, date('Y'), 'stripe');
        $data['nov1'] = $this->dasb->getchartdashboard(11, date('Y'), 'stripe');
        $data['des1'] = $this->dasb->getchartdashboard(12, date('Y'), 'stripe');

        $data['jan2'] = $this->dasb->getchartdashboard(1, date('Y'), 'paypal');
        $data['feb2'] = $this->dasb->getchartdashboard(2, date('Y'), 'paypal');
        $data['mar2'] = $this->dasb->getchartdashboard(3, date('Y'), 'paypal');
        $data['apr2'] = $this->dasb->getchartdashboard(4, date('Y'), 'paypal');
        $data['mei2'] = $this->dasb->getchartdashboard(5, date('Y'), 'paypal');
        $data['jun2'] = $this->dasb->getchartdashboard(6, date('Y'), 'paypal');
        $data['jul2'] = $this->dasb->getchartdashboard(7, date('Y'), 'paypal');
        $data['aug2'] = $this->dasb->getchartdashboard(8, date('Y'), 'paypal');
        $data['sep2'] = $this->dasb->getchartdashboard(9, date('Y'), 'paypal');
        $data['okt2'] = $this->dasb->getchartdashboard(10, date('Y'), 'paypal');
        $data['nov2'] = $this->dasb->getchartdashboard(11, date('Y'), 'paypal');
        $data['des2'] = $this->dasb->getchartdashboard(12, date('Y'), 'paypal');

        $this->response($data, 200);
    }

    public function chart_progress_get()
    {
        $totalmatch = $this->dasb->gettotalmatch();
        $totalprogress = $this->dasb->getprogresstotalmatch();

        if ($totalmatch != 0) {
            $total = ($totalmatch * 2) / $totalprogress * 100;

            $message = array(
                'code'              => '200',
                'message'           => 'success',
                'progress'           => number_format($total, 0)
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code'              => '200',
                'message'           => 'success',
                'progress'           => number_format(0, 0)
            );
            $this->response($message, 200);
        }
    }

    public function chart_usermatchmeter_get($id)
    {
        $totalmatch = $this->us->usertotalmatchbyid($id);
        $totallike = $this->us->usertotallikebyid($id);

        if ($totalmatch != 0) {
            $total = $totalmatch / $totallike * 100;

            $message = array(
                'code'              => '200',
                'message'           => 'success',
                'progress'           => number_format($total, 0)
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code'              => '200',
                'message'           => 'success',
                'progress'           => number_format(0, 0)
            );
            $this->response($message, 200);
        }
    }
}
