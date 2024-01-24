<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Customerapi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Customer_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    function login_post()
    {
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_USER'] != $decoded_data->no_telepon || $_SERVER['PHP_AUTH_PW'] != $decoded_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $reg_id = array(
            'token' => $decoded_data->token
        );

        $condition = array(
            'password' => sha1($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon
        );
        $check_banned = $this->Customer_model->check_banned($decoded_data->no_telepon);
        if ($check_banned) {
            $message = array(
                'message' => 'banned',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $cek_login = $this->Customer_model->get_data_pelanggan($condition);


            $message = array();

            if ($cek_login) {
                if ($decoded_data->checked == "true") {
                    $message = array(
                        'code' => '200',
                        'message' => 'next',
                        'data' => []
                    );
                    $this->response($message, 200);
                } else {
                    $this->Customer_model->edit_profile($reg_id, $condition);
                    $datauser = $this->Customer_model->get_data_pelanggan($condition);
                    $message = array(
                        'code' => '200',
                        'message' => 'found',
                        'data' => $datauser
                    );
                    $this->response($message, 200);
                }
            } else {
                $message = array(
                    'code' => '401',
                    'message' => 'wrong phone or password',
                    'data' => []
                );
                $this->response($message, 200);
            }
        }
    }

    function forgot_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        $condition = array(
            'email' => $decoded_data->email,
            'statususer' => '1'
        );
        $cek_login = $this->Customer_model->get_data_pelanggan($condition);
        $app_settings = $this->Customer_model->get_settings();
        $token = sha1(rand(0, 999999) . time());

        if ($cek_login) {
            $cheker = array('msg' => $cek_login);

            foreach ($app_settings as $item) {
                foreach ($cheker['msg'] as $val) {

                    $dataforgot = array(
                        'userid' => $val['userid'],
                        'token' => $token,
                        'idKey' => '1'
                    );
                }


                $forgot = $this->Customer_model->dataforgot($dataforgot);

                $linkbtn = base_url() . 'resetpass/rest/' . $token . '/1';
                $template = $this->Customer_model->template1($item['email_subject'], $item['email_text1'], $item['email_text2'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
                $sendmail = $this->Customer_model->emailsend($item['email_subject'] . " [ticket-" . rand(0, 999999) . "]", $decoded_data->email, $template, $item['smtp_host'], $item['smtp_port'], $item['smtp_username'], $item['smtp_password'], $item['smtp_from'], $item['app_name'], $item['smtp_secure']);
            }
            if ($forgot && $sendmail) {

                $message = array(
                    'code' => '200',
                    'message' => 'found',
                    'data' => []
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '401',
                    'message' => 'email not registered',
                    'data' => []
                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'code' => '404',
                'message' => 'email not registered',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function register_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $email = $dec_data->email;
        $phone = $dec_data->no_telepon;

        if ($_SERVER['PHP_AUTH_USER'] != $email || $_SERVER['PHP_AUTH_PW'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $check_exist = $this->Customer_model->check_exist($email, $phone);
        $check_exist_phone = $this->Customer_model->check_exist_phone($phone);
        $check_exist_email = $this->Customer_model->check_exist_email($email);
        if ($check_exist) {
            $message = array(
                'code' => '201',
                'message' => 'email and phone number already exist',
                'data' => []
            );
            $this->response($message, 200);
        } else if ($check_exist_phone) {
            $message = array(
                'code' => '201',
                'message' => 'phone already exist',
                'data' => []
            );
            $this->response($message, 200);
        } else if ($check_exist_email) {
            $message = array(
                'code' => '201',
                'message' => 'email already exist',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            if ($dec_data->checked == "true") {
                $message = array(
                    'code' => '200',
                    'message' => 'next',
                    'data' => []
                );
                $this->response($message, 200);
            } else {
                $image = $dec_data->fotopelanggan;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/users/" . $namafoto;
                file_put_contents($path, base64_decode($image));
                $data_signup = array(
                    'userid' => $dec_data->no_telepon . time(),
                    'fullname' => $dec_data->nama,
                    'email' => $dec_data->email,
                    'no_telepon' => $dec_data->no_telepon,
                    'country_code' => $dec_data->countrycode,
                    'phone_number' => $dec_data->phone,
                    'password' => sha1($dec_data->password),
                    'birthday' => $dec_data->birthday,
                    'gender' => $dec_data->gender,
                    'userimage' => $namafoto,
                    'token' => $dec_data->token,
                    'statususer' => 1,
                    'expired' => '2020-01-01'
                );

                $signup = $this->Customer_model->signup($data_signup);
                if ($signup) {
                    $condition = array(
                        'password' => sha1($dec_data->password),
                        'email' => $email
                    );
                    $datauser1 = $this->Customer_model->get_data_pelanggan($condition);
                    $message = array(
                        'code' => '200',
                        'message' => 'success',
                        'data' => $datauser1
                    );
                    $this->response($message, 200);
                } else {
                    $message = array(
                        'code' => '201',
                        'message' => 'failed',
                        'data' => []
                    );
                    $this->response($message, 200);
                }
            }
        }
    }

    function privacy_post()
    {
        if ($_SERVER['PHP_AUTH_USER'] != username || $_SERVER['PHP_AUTH_PW'] != password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $app_settings = $this->Customer_model->get_settings();
        foreach ($app_settings as $aps) {
            $message = array(
                'code' => '200',
                'message' => 'found',
                'privacy' => $aps['app_privacy_policy']
            );
            $this->response($message, 200);
        }
    }

    function subs_post()
    {
        if ($_SERVER['PHP_AUTH_USER'] != username || $_SERVER['PHP_AUTH_PW'] != password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $data = $this->Customer_model->subs()->result();
        $message = array(
            'code' => '200',
            'message' => 'found',
            'data' => $data
        );
        $this->response($message, 200);
    }

    function unmatch_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {
            $delete = $this->Customer_model->unmatch($dec_data->userid, $dec_data->matchid);
            if ($delete) {
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => []
                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function home_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $nearby = [
            'gender' => $dec_data->gender,
            'limit' => $dec_data->limit,
            'sort' => $dec_data->sort,
            'lat' => $dec_data->lat,
            'long' => $dec_data->long,
            'userid' => $dec_data->userid,
            'search' => $dec_data->search,
            'age_min' => $dec_data->age_min,
            'age_max' => $dec_data->age_max,
            'distance' => $dec_data->distance
        ];

        $latlang = array(
            'latitude' => $dec_data->lat,
            'longitude' => $dec_data->long,
            'location' => $dec_data->location
        );

        $updatematch = $this->Customer_model->updatematch($dec_data->userid);

        $app_settings = $this->Customer_model->get_settings();
        $payu = $this->Customer_model->payusettings()->result();

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        $check_banned = $this->Customer_model->check_banned_home($dec_data->userid);
        if ($check_banned) {
            $message = array(
                'message' => 'banned',
                'data' => []
            );
            $this->response($message, 200);
        } elseif ($get_pelanggan && $updatematch) {
            $datanearby = $this->Customer_model->nearby($nearby);
            $this->Customer_model->edit_profile($latlang, $condition);
            foreach ($app_settings as $item) {
                $message = array(
                    'code' => '200',
                    'message' => 'found',
                    'currency' => $item['app_currency'],
                    'currency_text' => $item['app_currency_text'],
                    'app_aboutus' => $item['app_aboutus'],
                    'app_contact' => $item['app_contact'],
                    'app_website' => $item['app_website'],
                    'fcm_key' => $item['fcm_key'],
                    'stripe_active' => $item['stripe_active'],
                    'paypal_key' => $item['paypal_key'],
                    'rzp_key' => $item['rzp_key'],
                    'fw_key' => $item['fw_key'],
                    'fw_enc' => $item['fw_enc'],
                    'stripe_publish' => $item['stripe_published_key'],
                    'paypal_mode' => $item['paypal_mode'],
                    'rzp_mode' => $item['rzp_mode'],
                    'fw_mode' => $item['fw_mode'],
                    'paypal_active' => $item['paypal_active'],
                    'rzp_active' => $item['rzp_active'],
                    'fw_active' => $item['fw_active'],
                    'app_email' => $item['app_email'],
                    'interstitial' => $item['interstitial'],
                    'user' => $get_pelanggan,
                    'payu' => $payu,
                    'nearby' => $datanearby
                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'code' => '200',
                'message' => 'There is a problem on your account, please contact admin.'
            );
            $this->response($message, 200);
        }
    }

    function matches_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);

        $matchesdata = $this->Customer_model->matches($dec_data->userid, $dec_data->lat, $dec_data->long);
        if ($get_pelanggan) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $matchesdata
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function updatematch_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        $updatematch = $this->Customer_model->updatematch($dec_data->userid);
        if ($get_pelanggan && $updatematch) {
            $ismatch = $this->Customer_model->ismatch($dec_data->userid, $dec_data->id);
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $ismatch
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function like_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);

        $matchesdata = $this->Customer_model->like($dec_data->userid, $dec_data->lat, $dec_data->long);
        if ($get_pelanggan) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $matchesdata
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function visitor_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);

        $matchesdata = $this->Customer_model->visitor($dec_data->userid, $dec_data->lat, $dec_data->long);
        if ($get_pelanggan) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $matchesdata
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }


    function userdetail_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $dataview = array(
            'viuserid'  => $dec_data->id,
            'vimyid'  =>  $dec_data->userid
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        $get_user = $this->Customer_model->whereuser($dataview);
        $matchesdata = $this->Customer_model->userdetail($dec_data->id, $dec_data->userid, $dec_data->lat, $dec_data->long);
        $matches = $this->Customer_model->matches($dec_data->id, $dec_data->lat, $dec_data->long);
        $gallery = $this->Customer_model->gallery($dec_data->id);
        if ($get_pelanggan) {
            if ($get_user->result()) {
                $this->Customer_model->updateclickview($dataview);
            } else {
                $this->Customer_model->clickview($dataview);
            }

            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $matchesdata,
                'match' => $matches,
                'gallery' => $gallery->result()
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function showme_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );


        $data_edit = array(
            'hideshow' => $dec_data->show
        );


        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {
            $this->Customer_model->edit_profile($data_edit, $condition);
            $get_data = $this->Customer_model->get_data_pelanggan($condition);
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $get_data
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function insertgallery_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $image = $dec_data->fotopelanggan;
        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
        $path = "images/users/" . $namafoto;
        file_put_contents($path, base64_decode($image));

        $gallery = [
            'userid' => $dec_data->userid,
            'imagename' => $namafoto
        ];

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {
            $this->Customer_model->insertgallery($gallery);
            $allgallery = $this->Customer_model->galleryuser($dec_data->userid);
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $allgallery->result()
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function allgallery_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {
            $allgallery = $this->Customer_model->galleryuser($dec_data->userid);
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $allgallery->result()
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }

    function deletegallery_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        $delete = [
            'id' => $dec_data->id,
            'imagename' =>  $dec_data->fotopelanggan,
            'userid' =>  $dec_data->userid
        ];
        $deletegal = $this->Customer_model->deletegallery($delete);

        if ($get_pelanggan && $deletegal) {

            $foto = $dec_data->fotopelanggan;
            $path = "./images/users/$foto";
            unlink("$path");
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => []
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '201',
                'message' => 'failed'
            );
            $this->response($message, 200);
        }
    }


    function edit_profile_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $email = $dec_data->email;
        $phone = $dec_data->no_telepon;

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {
            $check_exist = $this->Customer_model->check_exist($email, $phone);
            $check_exist_phone = $this->Customer_model->check_exist_phone($phone);
            $check_exist_email = $this->Customer_model->check_exist_email($email);
            if ($check_exist) {
                $message = array(
                    'code' => '201',
                    'message' => 'email and phone number already exist',
                    'data' => []
                );
                $this->response($message, 200);
            } else if ($check_exist_phone) {
                $message = array(
                    'code' => '201',
                    'message' => 'phone already exist',
                    'data' => []
                );
                $this->response($message, 200);
            } else if ($check_exist_email) {
                $message = array(
                    'code' => '201',
                    'message' => 'email already exist',
                    'data' => []
                );
                $this->response($message, 200);
            } else {

                $image = $dec_data->fotopelanggan;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/users/" . $namafoto;
                file_put_contents($path, base64_decode($image));

                $data_edit = array(
                    'fullname' => $dec_data->nama,
                    'email' => $dec_data->email,
                    'no_telepon' => $dec_data->no_telepon,
                    'country_code' => $dec_data->countrycode,
                    'phone_number' => $dec_data->phone,
                    'birthday' => $dec_data->birthday,
                    'gender' => $dec_data->gender,
                    'userimage' => $namafoto
                );

                $edit = $this->Customer_model->edit_profile($data_edit);
                if ($edit) {

                    $message = array(
                        'code' => '200',
                        'message' => 'success',
                        'data' => $get_pelanggan
                    );
                    $this->response($message, 200);
                } else {
                    $message = array(
                        'code' => '201',
                        'message' => 'failed',
                        'data' => []
                    );
                    $this->response($message, 200);
                }
            }
        }
    }

    function editprofile_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }
        $check_exist_phone = $this->Customer_model->check_exist_phone_edit($dec_data->userid, $dec_data->no_telepon);
        $check_exist_email = $this->Customer_model->check_exist_email_edit($dec_data->userid, $dec_data->email);
        if ($check_exist_phone) {
            $message = array(
                'code' => '201',
                'message' => 'phone already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else if ($check_exist_email) {
            $message = array(
                'code' => '201',
                'message' => 'email already exist',
                'data' => []
            );
            $this->response($message, 201);
        } else {

            $condition = array(
                'no_telepon' => $dec_data->no_telepon
            );
            $condition2 = array(
                'no_telepon' => $dec_data->no_telepon_lama
            );

            if ($dec_data->fotopelanggan == null && $dec_data->foto_pelanggan_lama == null) {
                $datauser = array(
                    'fullname' => $dec_data->nama,
                    'email' => $dec_data->email,
                    'no_telepon' => $dec_data->no_telepon,
                    'country_code' => $dec_data->countrycode,
                    'phone_number' => $dec_data->phone,
                    'birthday' => $dec_data->birthday,
                    'gender' => $dec_data->gender,
                    'height' => $dec_data->height,
                    'weight' =>  $dec_data->weight,
                    'relationship' =>  $dec_data->relationship,
                    'nation' =>  $dec_data->national,
                    'occupation' =>  $dec_data->occupation,
                    'company' =>  $dec_data->company,
                    'about' =>  $dec_data->about,
                    'interesting' =>  $dec_data->interesting
                );
            } else {
                $image = $dec_data->fotopelanggan;
                $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
                $path = "images/users/" . $namafoto;
                file_put_contents($path, base64_decode($image));

                $foto = $dec_data->foto_pelanggan_lama;
                $path = "./images/users/$foto";
                //unlink("$path");


                $datauser = array(
                    'fullname' => $dec_data->nama,
                    'email' => $dec_data->email,
                    'no_telepon' => $dec_data->no_telepon,
                    'country_code' => $dec_data->countrycode,
                    'phone_number' => $dec_data->phone,
                    'birthday' => $dec_data->birthday,
                    'gender' => $dec_data->gender,
                    'height' => $dec_data->height,
                    'weight' =>  $dec_data->weight,
                    'relationship' =>  $dec_data->relationship,
                    'nation' =>  $dec_data->national,
                    'occupation' =>  $dec_data->occupation,
                    'company' =>  $dec_data->company,
                    'about' =>  $dec_data->about,
                    'interesting' =>  $dec_data->interesting,
                    'userimage' => $namafoto
                );
            }


            $cek_login = $this->Customer_model->get_data_pelanggan($condition2);

            if ($cek_login) {
                $this->Customer_model->edit_profile($datauser, $condition2);
                $getdata = $this->Customer_model->get_data_pelanggan($condition);
                $message = array(
                    'code' => '200',
                    'message' => 'success',
                    'data' => $getdata
                );
                $this->response($message, 200);
            } else {
                $message = array(
                    'code' => '404',
                    'message' => 'error data',
                    'data' => []
                );
                $this->response($message, 200);
            }
        }
    }



    function changepass_post()
    {
        $data = file_get_contents("php://input");
        $decoded_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $decoded_data->token || $_SERVER['PHP_AUTH_USER'] != $decoded_data->passwordsha) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $reg_id = array(
            'password' => sha1($decoded_data->new_password)
        );

        $condition = array(
            'password' => sha1($decoded_data->password),
            'no_telepon' => $decoded_data->no_telepon
        );
        $condition2 = array(
            'password' => sha1($decoded_data->new_password),
            'no_telepon' => $decoded_data->no_telepon
        );
        $cek_login = $this->Customer_model->get_data_pelanggan($condition);
        $message = array();

        if ($cek_login) {
            $this->Customer_model->edit_profile($reg_id, $condition);
            $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition2);

            $message = array(
                'code' => '200',
                'message' => 'found',
                'data' => $get_pelanggan
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '404',
                'message' => 'wrong password',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    function trending_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $trendeingdata = $this->Customer_model->trending();
        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->userid,
            'password' => $dec_data->password,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);

        if ($get_pelanggan) {
            $message = array(
                'code' => '200',
                'message' => 'success',
                'data' => $trendeingdata
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'code' => '404',
                'message' => 'error data',
                'data' => []
            );
            $this->response($message, 200);
        }
    }

    public function subscredit_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->id,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);

        if ($get_pelanggan) {

            $email = $dec_data->email;
            $card_num = $dec_data->card_num;
            $card_cvc = $dec_data->cvc;
            $card_exp = explode("/", $dec_data->expired);

            $product = $dec_data->product;
            $number = $dec_data->number;
            $price = $dec_data->price;

            $iduser = $dec_data->id;

            //include Stripe PHP library
            require_once APPPATH . "third_party/stripe/init.php";

            //set api key
            $app_settings = $this->Customer_model->get_settings();
            foreach ($app_settings as $item) {
                $stripe = array(
                    "secret_key"      => $item['stripe_secret_key'],
                    "publishable_key" => $item['stripe_published_key']
                );

                if ($item['stripe_status'] == '1') {
                    \Stripe\Stripe::setApiKey($stripe['secret_key']);
                } else if ($item['stripe_status'] == '2') {
                    \Stripe\Stripe::setApiKey($stripe['publishable_key']);
                } else {
                    \Stripe\Stripe::setApiKey("");
                }
            }


            $tokenstripe = \Stripe\Token::create([
                'card' => [
                    'number' => $card_num,
                    'exp_month' => $card_exp[0],
                    'exp_year' => $card_exp[1],
                    'cvc' => $card_cvc,
                ],
            ]);


            if (!empty($tokenstripe['id'])) {

                //add customer to stripe
                $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source' => $tokenstripe['id']
                ));

                //item information
                $itemNumber = $number;
                $itemPrice = $price;
                $currency = "usd";
                $orderID = "INV-" . time();

                //charge a credit or a debit card
                $charge = \Stripe\Charge::create(array(
                    'customer' => $customer->id,
                    'amount'   => $itemPrice,
                    'currency' => $currency,
                    'description' => $itemNumber,
                    'metadata' => array(
                        'item_id' => $itemNumber
                    )
                ));

                //retrieve charge details
                $chargeJson = $charge->jsonSerialize();

                //check whether the charge is successful
                if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
                    //order details 
                    $amount = $chargeJson['amount'];
                    $currency = $chargeJson['currency'];
                    $status = $chargeJson['status'];

                    $datatopup = array(
                        'id_user' => $iduser,
                        'amount' => $amount,
                        'paymentmethod' => 'stripe',
                        'invoice' => $orderID,
                        'expired' => $dec_data->expireddate,
                        'status' => 1
                    );

                    $whereuser = array(
                        'userid' => $iduser
                    );

                    $number = $dec_data->number;
                    $price = $dec_data->price;

                    $iduser = $dec_data->id;

                    if ($status == 'succeeded') {


                        $insert = $this->Customer_model->insertwallet($datatopup);
                        if ($insert) {
                            $expireduser = array('expired' => $dec_data->expireddate);
                            $edituser = $this->Customer_model->edit_profile($expireduser, $whereuser);

                            if ($edituser) {
                                $message = array(
                                    'code' => '200',
                                    'message' => 'success',
                                    'data' => []
                                );
                                $this->response($message, 200);
                            }
                        }
                    } else {
                        $message = array(
                            'code' => '201',
                            'message' => 'error',
                            'data' => []
                        );
                        $this->response($message, 200);
                    }
                } else {
                    $message = array(
                        'code' => '202',
                        'message' => 'error',
                        'data' => []
                    );
                    $this->response($message, 200);
                }
            } else {
                echo "Invalid Token";
                $statusMsg = "";
            }
        }
    }

    public function subspaypal_post()
    {
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        if ($_SERVER['PHP_AUTH_PW'] != $dec_data->token || $_SERVER['PHP_AUTH_USER'] != $dec_data->password) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            $message = array(
                'code' => '401',
                'message' => 'Unauthorized'
            );
            $this->response($message, 401);
        }

        $condition = array(
            'token' => $dec_data->token,
            'userid' => $dec_data->id,
            'password' => $dec_data->password,
            'statususer' => '1'
        );

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {

            $iduser = $dec_data->id;
            $bank = $dec_data->paymentmethod;
            $amount = $dec_data->amount;
            $expired = $dec_data->expired;

            $datatopup = array(
                'id_user' => $iduser,
                'amount' => $amount,
                'paymentmethod' => $bank,
                'invoice' => 'INV-' . time(),
                'expired' => $expired,
                'status' => 1
            );

            $whereuser = array(
                'userid' => $iduser
            );
            $insert = $this->Customer_model->insertwallet($datatopup);
            if ($insert) {
                $expireduser = array('expired' => $expired);
                $edituser = $this->Customer_model->edit_profile($expireduser, $whereuser);

                if ($edituser) {
                    $message = array(
                        'code' => '200',
                        'message' => 'success',
                        'data' => ""
                    );
                    $this->response($message, 200);
                }
            }
        } else {
            $message = array(
                'code' => '201',
                'message' => 'You have insufficient balance',
                'data' => ""
            );
            $this->response($message, 200);
        }
    }

    public function intentstripe_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $condition = array(
            'userid' => $dec_data->userid,
            'no_telepon' => $dec_data->phone_number,
            'statususer' => '1'
        );

        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);
        if ($get_pelanggan) {

            $app_settings = $this->Customer_model->get_settings();
            $currency = "usd";
            $secret = "";
            foreach ($app_settings as $item) {
                $secret = $item['stripe_secret_key'];
                $currency = $item['app_currency'];
            }
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=" .$dec_data->price. "&currency=$currency&payment_method_types[]=card");
            curl_setopt($ch, CURLOPT_USERPWD, $secret . ':' . '');
            
            $headers = array();
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $message = array(
                'message' => 'success',
                'data' => $result
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'message' => 'error',
                'data' => ''
            );
            $this->response($message, 200);
        }
    }

    public function stripeaction_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $condition = array(
            'no_telepon' => $dec_data->phone_number,
            'statususer' => '1'
        );
        $get_pelanggan = $this->Customer_model->get_data_pelanggan($condition);

        if ($get_pelanggan) {
            require_once APPPATH . "third_party/stripe/init.php";
            $app_settings = $this->Customer_model->get_settings();
            foreach ($app_settings as $item) {
                $stripe = array(
                    "secret_key" => $item['stripe_secret_key']
                );
            }
            \Stripe\Stripe::setApiKey($stripe['secret_key']);
            $intent = \Stripe\PaymentIntent::retrieve($dec_data->id);
            $charges = $intent->charges->data;



            if ($charges[0]->metadata->user_id == $dec_data->userid && $charges[0]->amount_refunded == 0 && empty($charges[0]->failure_code) && $charges[0]->paid == 1) {
                //order details 
                $amount = $charges[0]->amount;
                $status = $charges[0]->status;

                $datatopup = array(
                    'id_user' => $charges[0]->metadata->user_id,
                    'amount' => $amount,
                    'paymentmethod' => 'stripe',
                    'invoice' => 'INV-' . time(),
                    'expired' => $dec_data->expired,
                    'status' => 1
                );
    
                

                if ($status == 'succeeded') {

                    $whereuser = array(
                        'userid' => $charges[0]->metadata->user_id
                    );
                    $insert = $this->Customer_model->insertwallet($datatopup);
                    if ($insert) {
                        $expireduser = array('expired' => $dec_data->expired);
                        $edituser = $this->Customer_model->edit_profile($expireduser, $whereuser);
        
                        if ($edituser) {
                            $message = array(
                                'code' => '200',
                                'message' => 'success',
                                'data' => ''
                            );
                            $this->response($message, 200);
                        }
                    }
                } else {
                    $message = array(
                        'code' => '201',
                        'message' => 'error',
                        'data' => ''
                    );
                    $this->response($message, 200);
                }
            } else {
                $message = array(
                    'code' => '202',
                    'message' => 'error',
                    'data' => []
                );
                $this->response($message, 200);
            }
        } else {
            $message = array(
                'message' => 'error',
                'data' => ''
            );
            $this->response($message, 200);
        }
    }
}
