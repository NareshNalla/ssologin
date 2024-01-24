<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }

    public function check_banned($data)
    {
        $stat =  $this->db->query("SELECT userid FROM users WHERE statususer='2' AND no_telepon='$data'");
        if ($stat->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_banned_home($data)
    {
        $stat =  $this->db->query("SELECT userid FROM users WHERE statususer='2' AND userid='$data'");
        if ($stat->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function dataforgot($forgotpass)
    {
        $forgot = $this->db->insert('forgot_password', $forgotpass);
        return $forgot;
    }

    public function get_data_pelanggan($condition)
    {
        $this->db->select('users.*');
        $this->db->select('(SELECT COUNT(ti.visitorid)
        FROM visitor ti
        WHERE ti.viuserid = users.userid) total_visitor');
        $this->db->from('users');
        $this->db->where($condition);
        $data = $this->db->get()->result_array();

        foreach ($data as $dt) {
            $matchdata = [
                'myid' => $dt['userid'],
                'matchorno' => 'true',
                'action_type' => 'like'
            ];

            $likedata = [
                'matchid' => $dt['userid'],
                'effected' => 'true',
                'action_type' => 'like'
            ];

            $totalmatch = $this->countmatch($matchdata);
            $totallike = $this->countlike($likedata);
            $out = array();

            $dateage = $dt['birthday'];
            $dateage = explode("-", $dateage);
            $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

            if ($dt['expired'] > date("Y-m-d")) {
                $vip = "1";
            } else {
                $vip = "0";
            }


            $out[] = [
                'id' => $dt['id'],
                'userid' => $dt['userid'],
                'fullname' => $dt['fullname'],
                'no_telepon' => $dt['no_telepon'],
                'email' => $dt['email'],
                'password' => $dt['password'],
                'country_code' => $dt['country_code'],
                'phone_number' => $dt['phone_number'],
                'location' => $dt['location'],
                'latitude' => $dt['latitude'],
                'longitude' => $dt['longitude'],
                'birthday' => $dt['birthday'],
                'gender' => $dt['gender'],
                'about' => $dt['about'],
                'occupation' => $dt['occupation'],
                'company' => $dt['company'],
                'height' => $dt['height'],
                'weight' => $dt['weight'],
                'nation' => $dt['nation'],
                'school' => $dt['school'],
                'relationship' => $dt['relationship'],
                'userimage' => $dt['userimage'],
                'interesting' => $dt['interesting'],
                'likeuser' => $dt['likeuser'],
                'dislikeuser' => $dt['dislikeuser'],
                'hideshow' => $dt['hideshow'],
                'statususer' => $dt['statususer'],
                'version' => $dt['version'],
                'token' => $dt['token'],
                'age' => $age,
                'expired' => $dt['expired'],
                'created' => $dt['created'],
                'total_visitor' => $dt['total_visitor'],
                'total_match' => $totalmatch,
                'total_like' => $totallike,
                'vip' => $vip
            ];

            return $out;
        }
    }

    public function countmatch($matchdata)
    {
        $this->db->select('COUNT(id) as total_match');
        $this->db->from('matches');
        $this->db->where($matchdata);
        $data = $this->db->get()->result_array();
        foreach ($data as $dt) {
            return $dt['total_match'];
        }
    }

    public function countlike($matchdata)
    {
        $this->db->select('COUNT(id) as total_like');
        $this->db->from('matches');
        $this->db->where($matchdata);
        $data = $this->db->get()->result_array();
        foreach ($data as $dt) {
            return $dt['total_like']; 
        }
    }

    public function edit_profile($data, $where)
    {
        $this->db->where($where);
        return $this->db->update('users', $data);
    }

    public function check_exist($email, $phone)
    {
        $cek = $this->db->query("SELECT userid FROM users where email = '$email' AND no_telepon='$phone'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_phone($phone)
    {
        $cek = $this->db->query("SELECT userid FROM users where no_telepon='$phone'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_phone_edit($id, $phone)
    {
        $cek = $this->db->query("SELECT userid FROM users where no_telepon='$phone' AND userid!='$id'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_email($email)
    {
        $cek = $this->db->query("SELECT userid FROM users where email ='$email'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_email_edit($id, $email)
    {
        $cek = $this->db->query("SELECT userid FROM users where email ='$email' AND userid!='$id'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function signup($data_signup)
    {
        return $this->db->insert('users', $data_signup);
    }

    public function insertgallery($data)
    {
        return $this->db->insert('gallery', $data);
    }

    public function get_settings()
    {
        $this->db->select('*');
        $this->db->from('app_settings');
        $this->db->where('id', '1');
        return $this->db->get()->result_array();
    }

    public function deletegallery($data)
    {
        $this->db->where($data);
        return $this->db->delete('gallery');
    }

    public function galleryuser($userid)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('userid', $userid);
        return $this->db->get();
    }

    public function payusettings()
    {
        $this->db->select('*');
        $this->db->from('payusettings');
        $this->db->where('id', 1);
        $saldo = $this->db->get();
        return $saldo;
    }

    public function nearby($data)
    {

        $lat = $data['lat'];
        $long = $data['long'];
        $this->db->select("users.*,
            (6371 * acos(cos(radians($lat)) * cos(radians(users.latitude)) * cos(radians(users.longitude) - radians( $long)) + sin(radians($lat)) * sin( radians(users.latitude)))) AS distance
            ");
        $this->db->from('users');
        $this->db->where('users.statususer = 1');
        $this->db->where('users.hideshow = 1');
        if ($data['search'] != '') {
            $this->db->where('users.fullname', $data['search']);
        }
        $this->db->where('users.userid !=' . $data['userid']);
        if ($data['gender'] == 'male') {
            $this->db->where('users.gender', 'male');
        } elseif ($data['gender'] == 'female') {
            $this->db->where('users.gender', 'female');
        }

        if ($data['sort'] == 'age') {
            $this->db->order_by('users.birthday ASC');
        } elseif ($data['sort'] == 'distance') {
            $this->db->order_by('distance');
        } else {
            $this->db->order_by('rand()');
        }

        if ($data['limit'] == 'limit') {
            $this->db->limit('20');
        }

        $datanearby = $this->db->get();

        $out = array();
        foreach ($datanearby->result_array() as $dta) {
            $rdata = $this->selectmatches($data['userid'], $dta['userid']);
            if ($rdata->row('matchid') != $dta['userid'] || ($rdata->row('effected') == "false" && $rdata->row('matchorno') == "false")) {
                $action_type = $rdata->row('action_type');
                if ($action_type == null) {
                    $action_type = "false";
                }

                $dateage = $dta['birthday'];
                $dateage = explode("-", $dateage);
                $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                    ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

                if ($dta['expired'] > date("Y-m-d")) {
                    $vip = "1";
                } else {
                    $vip = "0";
                }

                if ($age <= $data['age_max'] && $data['age_min'] <= $age && $data['distance'] >= $dta['distance']) {
                    $out[] = [
                        'id' => $dta['id'],
                        'userid' => $dta['userid'],
                        'fullname' => $dta['fullname'],
                        'no_telepon' => $dta['no_telepon'],
                        'country_code' => $dta['country_code'],
                        'phone_number' => $dta['phone_number'],
                        'email' => $dta['email'],
                        'location' => $dta['location'],
                        'latitude' => $dta['latitude'],
                        'longitude' => $dta['longitude'],
                        'birthday' => $dta['birthday'],
                        'gender' => $dta['gender'],
                        'about' => $dta['about'],
                        'occupation' => $dta['occupation'],
                        'company' => $dta['company'],
                        'height' => $dta['height'],
                        'weight' => $dta['weight'],
                        'nation' => $dta['nation'],
                        'school' => $dta['school'],
                        'relationship' => $dta['relationship'],
                        'userimage' => $dta['userimage'],
                        'interesting' => $dta['interesting'],
                        'likeuser' => $dta['likeuser'],
                        'dislikeuser' => $dta['dislikeuser'],
                        'hideshow' => $dta['hideshow'],
                        'statususer' => $dta['statususer'],
                        'version' => $dta['version'],
                        'token' => $dta['token'],
                        'created' => $dta['created'],
                        'distance' => $dta['distance'],
                        'age' => "$age",
                        'vip' => $vip
                    ];
                }
            }
        }
        return $out;
    }

    public function selectmatches($userid, $matchid)
    {
        $this->db->select('*');
        $this->db->from('matches');
        $this->db->where('myid', $userid);
        $this->db->where('matchid', $matchid);
        return $this->db->get();
    }

    public function subs()
    {
        $this->db->select('*');
        $this->db->from('purchasepackage');
        $this->db->where('status', 1);
        return $this->db->get();
    }

    public function insertwallet($data_withdraw)
    {
        return $this->db->insert('purchaseuser', $data_withdraw);
    }

    public function matches($userid, $lat, $long)
    {
        $this->db->select("users.*,
            (6371 * acos(cos(radians($lat)) * cos(radians(users.latitude)) * cos(radians(users.longitude) - radians( $long)) + sin(radians($lat)) * sin( radians(users.latitude)))) AS distance
            ");
        $this->db->from('users');
        $this->db->join('matches', 'users.userid = matches.matchid', 'left');
        $this->db->where('matches.myid', $userid);
        $this->db->where('matchorno', 'true');
        $this->db->where('action_type', 'like');
        $this->db->order_by('distance');
        $datanearby = $this->db->get();

        $out = array();
        foreach ($datanearby->result_array() as $dta) {
            $rdata = $this->selectmatches($userid, $dta['userid']);
            $action_type = $rdata->row('action_type');
            if ($action_type == null) {
                $action_type = "false";
            }

            $dateage = $dta['birthday'];
            $dateage = explode("-", $dateage);
            $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

            if ($dta['expired'] > date("Y-m-d")) {
                $vip = "1";
            } else {
                $vip = "0";
            }

            $out[] = [
                'id' => $dta['id'],
                'userid' => $dta['userid'],
                'fullname' => $dta['fullname'],
                'no_telepon' => $dta['no_telepon'],
                'country_code' => $dta['country_code'],
                'phone_number' => $dta['phone_number'],
                'email' => $dta['email'],
                'location' => $dta['location'],
                'latitude' => $dta['latitude'],
                'longitude' => $dta['longitude'],
                'birthday' => $dta['birthday'],
                'gender' => $dta['gender'],
                'about' => $dta['about'],
                'occupation' => $dta['occupation'],
                'company' => $dta['company'],
                'height' => $dta['height'],
                'weight' => $dta['weight'],
                'nation' => $dta['nation'],
                'school' => $dta['school'],
                'relationship' => $dta['relationship'],
                'userimage' => $dta['userimage'],
                'interesting' => $dta['interesting'],
                'likeuser' => $dta['likeuser'],
                'dislikeuser' => $dta['dislikeuser'],
                'hideshow' => $dta['hideshow'],
                'statususer' => $dta['statususer'],
                'version' => $dta['version'],
                'token' => $dta['token'],
                'created' => $dta['created'],
                'distance' => $dta['distance'],
                'age' => "$age",
                'vip' => $vip
            ];
        }
        return $out;
    }

    public function like($userid, $lat, $long)
    {
        $this->db->select("users.*,
            (6371 * acos(cos(radians($lat)) * cos(radians(users.latitude)) * cos(radians(users.longitude) - radians( $long)) + sin(radians($lat)) * sin( radians(users.latitude)))) AS distance
            ");
        $this->db->from('users');
        $this->db->join('matches', 'users.userid = matches.myid', 'left');
        $this->db->where('matches.matchid', $userid);
        $this->db->where('action_type', 'like');
        $this->db->where('effected', 'true');
        $this->db->order_by('distance');
        $datanearby = $this->db->get();

        $out = array();
        foreach ($datanearby->result_array() as $dta) {
            $rdata = $this->selectmatches($userid, $dta['userid']);
            $action_type = $rdata->row('action_type');
            if ($action_type == null) {
                $action_type = "false";
            }

            $dateage = $dta['birthday'];
            $dateage = explode("-", $dateage);
            $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

            if ($dta['expired'] > date("Y-m-d")) {
                $vip = "1";
            } else {
                $vip = "0";
            }

            $out[] = [
                'id' => $dta['id'],
                'userid' => $dta['userid'],
                'fullname' => $dta['fullname'],
                'no_telepon' => $dta['no_telepon'],
                'country_code' => $dta['country_code'],
                'phone_number' => $dta['phone_number'],
                'email' => $dta['email'],
                'location' => $dta['location'],
                'latitude' => $dta['latitude'],
                'longitude' => $dta['longitude'],
                'birthday' => $dta['birthday'],
                'gender' => $dta['gender'],
                'about' => $dta['about'],
                'occupation' => $dta['occupation'],
                'company' => $dta['company'],
                'height' => $dta['height'],
                'weight' => $dta['weight'],
                'nation' => $dta['nation'],
                'school' => $dta['school'],
                'relationship' => $dta['relationship'],
                'userimage' => $dta['userimage'],
                'interesting' => $dta['interesting'],
                'likeuser' => $dta['likeuser'],
                'dislikeuser' => $dta['dislikeuser'],
                'hideshow' => $dta['hideshow'],
                'statususer' => $dta['statususer'],
                'version' => $dta['version'],
                'token' => $dta['token'],
                'created' => $dta['created'],
                'distance' => $dta['distance'],
                'age' => "$age",
                'vip' => $vip
            ];
        }
        return $out;
    }

    public function visitor($userid, $lat, $long)
    {
        $this->db->select("users.*,
            (6371 * acos(cos(radians($lat)) * cos(radians(users.latitude)) * cos(radians(users.longitude) - radians( $long)) + sin(radians($lat)) * sin( radians(users.latitude)))) AS distance
            ");
        $this->db->from('users');
        $this->db->join('visitor', 'users.userid = visitor.viuserid', 'left');
        $this->db->where('visitor.viuserid', $userid);
        $this->db->order_by('distance');
        $datanearby = $this->db->get();

        $out = array();
        foreach ($datanearby->result_array() as $dta) {
            $rdata = $this->selectmatches($userid, $dta['userid']);
            $action_type = $rdata->row('action_type');
            if ($action_type == null) {
                $action_type = "false";
            }

            $dateage = $dta['birthday'];
            $dateage = explode("-", $dateage);
            $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

            if ($dta['expired'] > date("Y-m-d")) {
                $vip = "1";
            } else {
                $vip = "0";
            }

            $out[] = [
                'id' => $dta['id'],
                'userid' => $dta['userid'],
                'fullname' => $dta['fullname'],
                'no_telepon' => $dta['no_telepon'],
                'country_code' => $dta['country_code'],
                'phone_number' => $dta['phone_number'],
                'email' => $dta['email'],
                'location' => $dta['location'],
                'latitude' => $dta['latitude'],
                'longitude' => $dta['longitude'],
                'birthday' => $dta['birthday'],
                'gender' => $dta['gender'],
                'about' => $dta['about'],
                'occupation' => $dta['occupation'],
                'company' => $dta['company'],
                'height' => $dta['height'],
                'weight' => $dta['weight'],
                'nation' => $dta['nation'],
                'school' => $dta['school'],
                'relationship' => $dta['relationship'],
                'userimage' => $dta['userimage'],
                'interesting' => $dta['interesting'],
                'likeuser' => $dta['likeuser'],
                'dislikeuser' => $dta['dislikeuser'],
                'hideshow' => $dta['hideshow'],
                'statususer' => $dta['statususer'],
                'version' => $dta['version'],
                'token' => $dta['token'],
                'created' => $dta['created'],
                'distance' => $dta['distance'],
                'age' => "$age",
                'vip' => $vip
            ];
        }
        return $out;
    }

    public function updatematch($userid)
    {
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );

        $data = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, firebaseDb . 'Match/.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $return = curl_exec($ch);
        $json_data = json_decode($return, true);

        if($json_data != NULL) {
            $datacount = count($json_data);
            } else {
                $datacount = 0;
            }

        if ($datacount != "0") {
            foreach ($json_data as $key => $item) {
                if ($key == $userid) {
                    foreach ($item as $key1 => $item1) {
                        $matches = $this->selectmatches($userid, $key1);
                        $matches2 = $this->selectmatches($key1, $userid);
                        if ($matches->num_rows() > 0 && $matches2->num_rows() > 0) {


                            $wheremyid = [
                                'myid' => $userid,
                                'matchid' => $key1
                            ];

                            $wherematchid = [
                                'myid' => $key1,
                                'matchid' => $userid
                            ];

                            if ($matches->row('action_type') == 'like' && $matches->row('effected') == 'false') {
                                if ($matches2->row('action_type') == 'like' && $matches2->row('effected') == 'true' && $item1['type'] == 'like') {
                                    $dataupdate = [
                                        'matchorno' => 'true'
                                    ];
                                    $dataupdate11 = [
                                        'action_type' => $item1['type'],
                                        'matchorno' => 'true',
                                        'effected' => 'true'
                                    ];
                                    $this->insertupdate('update', $dataupdate11, $dataupdate, $wheremyid, $wherematchid);
                                } else {
                                    $dataupdate = [
                                        'matchorno' => 'false'
                                    ];
                                    $dataupdate11 = [
                                        'action_type' => $item1['type'],
                                        'matchorno' => 'false',
                                        'effected' => 'true'
                                    ];
                                    $this->insertupdate('update', $dataupdate11, $dataupdate, $wheremyid, $wherematchid);
                                }
                            } elseif ($matches->row('action_type') == 'dislike' && $matches->row('effected') == 'false') {
                                $dataupdate2 = [
                                    'action_type' => $item1['type'],
                                    'matchorno' => 'false',
                                    'effected' => 'true'
                                ];

                                $dataupdate21 = [
                                    'action_type' => 'dislike',
                                    'matchorno' => 'false',
                                    'effected' => 'true'
                                ];
                                $this->insertupdate('update', $dataupdate2, $dataupdate21, $wheremyid, $wherematchid);
                            }
                            curl_setopt($ch, CURLOPT_URL, firebaseDb . 'Match/' . $userid . '/' . $key1 . '.json');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_exec($ch);
                        } else {
                            $datainsert = [
                                'myid' => $userid,
                                'matchid' => $key1,
                                'action_type' => $item1['type'],
                                'matchorno' => $item1['match'],
                                'effected' => 'true'
                            ];

                            $datainsert2 = [
                                'myid' => $key1,
                                'matchid' => $userid,
                                'action_type' => $item1['type'],
                                'matchorno' => $item1['match'],
                                'effected' => 'false'
                            ];

                            $wheremyid = [
                                'myid' => $userid,
                                'matchid' => $key1
                            ];

                            $wherematchid = [
                                'myid' => $key1,
                                'matchid' => $userid
                            ];

                            $this->insertupdate('insert', $datainsert, $datainsert2, $wheremyid, $wherematchid);
                            curl_setopt($ch, CURLOPT_URL, firebaseDb . 'Match/' . $userid . '/' . $key1 . '.json');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_exec($ch);
                        }
                    }
                }
            }
            return $return;
        } else {
            return $return;
        }
    }

    public function unmatch($userid, $usermatch)
    {

        $deletechat = $this->delete_chat($userid, $usermatch);
        if ($deletechat) {
            $user1 = [
                'myid' => $userid,
                'matchid' => $usermatch
            ];
            $user2 = [
                'matchid' => $userid,
                'myid' => $usermatch
            ];
            $this->db->where($user1);
            $datamatch = $this->db->delete('matches');

            $this->db->where($user2);
            $datamatch2 = $this->db->delete('matches');

            if ($datamatch && $datamatch2) {
                return true;
            }
        }
    }

    function delete_chat($otherid, $userid)
    {
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );
        $data3 = array();
        $url3 = firebaseDb . '/chat/' . $otherid . '-' . $userid . '/.json';
        $ch3 = curl_init($url3);

        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch3, CURLOPT_POSTFIELDS, json_encode($data3));
        curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers);

        $return3 = curl_exec($ch3);

        $json_data3 = json_decode($return3, true);

        $data2 = array();

        $url2 = firebaseDb . '/chat/' . $userid . '-' . $otherid . '/.json';
        $ch2 = curl_init($url2);

        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);

        $return2 = curl_exec($ch2);

        $json_data2 = json_decode($return2, true);

        $data1 = array();

        $url1 = firebaseDb . '/Inbox/' . $userid . '/' . $otherid . '/.json';
        $ch1 = curl_init($url1);

        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);

        $return1 = curl_exec($ch1);

        $json_data1 = json_decode($return1, true);

        $data = array();

        $url = firebaseDb . '/Inbox/' . $otherid . '/' . $userid . '/.json';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $return = curl_exec($ch);

        $json_data = json_decode($return, true);
        return $return;
    }

    public function ismatch($userid, $usermatch)
    {
        $out = array();
        $dataprofile = [
            'userid' => $usermatch
        ];
        $dataprofileuser = $this->get_data_pelanggan($dataprofile);
        $matches = $this->selectmatches($userid, $usermatch);
        foreach ($dataprofileuser as $dta) {
            if ($matches->num_rows() > 0) {
                if ($matches->row('action_type') == 'like' && $matches->row('matchorno') == 'true') {
                    $match = "match";
                } elseif ($matches->row('action_type') == 'dislike' && $matches->row('matchorno') == 'false') {
                    $match = "dislike";
                } else {
                    $match = "notmatch";
                }
            } else {
                $match = "notmatch";
            }

            $out[] = array(
                'matchstatus' => $match,
                'id' => $dta['id'],
                'userid' => $dta['userid'],
                'fullname' => $dta['fullname'],
                'no_telepon' => $dta['no_telepon'],
                'country_code' => $dta['country_code'],
                'phone_number' => $dta['phone_number'],
                'location' => $dta['location'],
                'latitude' => $dta['latitude'],
                'longitude' => $dta['longitude'],
                'birthday' => $dta['birthday'],
                'gender' => $dta['gender'],
                'about' => $dta['about'],
                'occupation' => $dta['occupation'],
                'company' => $dta['company'],
                'height' => $dta['height'],
                'weight' => $dta['weight'],
                'nation' => $dta['nation'],
                'school' => $dta['school'],
                'relationship' => $dta['relationship'],
                'userimage' => $dta['userimage'],
                'interesting' => $dta['interesting'],
                'likeuser' => $dta['likeuser'],
                'dislikeuser' => $dta['dislikeuser'],
                'hideshow' => $dta['hideshow'],
                'statususer' => $dta['statususer'],
                'version' => $dta['version'],
                'token' => $dta['token'],
                'created' => $dta['created'],
                'age' => $dta['age'],
                'vip' => $dta['vip']
            );
        }

        return $out;
    }

    public function insertupdate($status, $Sdata, $Sdata2, $wheremyid, $wherematchid)
    {
        if ($status == 'insert') {
            $insert1 = $this->db->insert('matches', $Sdata);
            $insert2 = $this->db->insert('matches', $Sdata2);
            if ($insert1 && $insert2) {
                return true;
            }
        } else {
            $this->db->where($wheremyid);
            $update = $this->db->update('matches', $Sdata);
            if ($update) {
                $update1 = $this->db->where($wherematchid);
                $update2 = $this->db->update('matches', $Sdata2);

                if ($update1 && $update2) {
                    return true;
                }
            }
        }
    }

    public function userdetail($userid, $myid, $lat, $long)
    {
        $this->db->select("users.*,
            (6371 * acos(cos(radians($lat)) * cos(radians(users.latitude)) * cos(radians(users.longitude) - radians( $long)) + sin(radians($lat)) * sin( radians(users.latitude)))) AS distance
            ");
        $this->db->from('users');
        $this->db->where('users.userid', $userid);
        $datanearby = $this->db->get();

        $out = array();
        foreach ($datanearby->result_array() as $dta) {
            $rdata = $this->selectmatches($myid, $dta['userid']);
            $action_type = $rdata->row('action_type');
            if ($action_type == null) {
                $action_type = "false";
            }
            if ($rdata->row('matchorno') == "false" && $rdata->row('action_type') == "like" && $rdata->row('effected') == "true") {
                $matchstatus = "like";
            } else if ($rdata->row('matchorno') == "false" && $rdata->row('action_type') == "dislike" && $rdata->row('effected') == "true") {
                $matchstatus = "dislike";
            } else if ($rdata->row('matchorno') == "true" && $rdata->row('action_type') == "like") {
                $matchstatus = "match";
            } else {
                $matchstatus = "nomatch";
            }
            $dateage = $dta['birthday'];
            $dateage = explode("-", $dateage);
            $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

            if ($dta['expired'] > date("Y-m-d")) {
                $vip = "1";
            } else {
                $vip = "0";
            }

            $out[] = [
                'matchstatus' => $matchstatus,
                'id' => $dta['id'],
                'userid' => $dta['userid'],
                'fullname' => $dta['fullname'],
                'no_telepon' => $dta['no_telepon'],
                'country_code' => $dta['country_code'],
                'phone_number' => $dta['phone_number'],
                'email' => $dta['email'],
                'location' => $dta['location'],
                'latitude' => $dta['latitude'],
                'longitude' => $dta['longitude'],
                'birthday' => $dta['birthday'],
                'gender' => $dta['gender'],
                'about' => $dta['about'],
                'occupation' => $dta['occupation'],
                'company' => $dta['company'],
                'height' => $dta['height'],
                'weight' => $dta['weight'],
                'nation' => $dta['nation'],
                'school' => $dta['school'],
                'relationship' => $dta['relationship'],
                'userimage' => $dta['userimage'],
                'interesting' => $dta['interesting'],
                'likeuser' => $dta['likeuser'],
                'dislikeuser' => $dta['dislikeuser'],
                'hideshow' => $dta['hideshow'],
                'statususer' => $dta['statususer'],
                'version' => $dta['version'],
                'token' => $dta['token'],
                'created' => $dta['created'],
                'distance' => $dta['distance'],
                'age' => "$age",
                'vip' => $vip
            ];
        }
        return $out;
    }

    public function gallery($userid)
    {
        $this->db->select("*");
        $this->db->from('gallery');
        $this->db->where('userid', $userid);
        return $this->db->get();
    }

    public function whereuser($userid)
    {
        $this->db->select("*");
        $this->db->from('visitor');
        $this->db->where($userid);
        return $this->db->get();
    }

    public function trending()
    {
        $this->db->select('users.*');
        $this->db->select('(SELECT COUNT(ti.visitorid)
        FROM visitor ti
        WHERE ti.viuserid = users.userid) total_visitor');
        $this->db->from('users');
        $this->db->order_by('total_visitor DESC');
        $this->db->limit('10');
        $datanearby = $this->db->get();

        $out = array();
        $i = 1;
        foreach ($datanearby->result_array() as $dta) {

            $dateage = $dta['birthday'];
            $dateage = explode("-", $dateage);
            $age = (date("md", date("U", @mktime(0, 0, 0, $dateage[0], $dateage[1], $dateage[2]))) > date("md")
                ? ((date("Y") - $dateage[0]) - 1) : (date("Y") - $dateage[0]));

            if ($dta['expired'] > date("Y-m-d")) {
                $vip = "1";
            } else {
                $vip = "0";
            }

            if ($dta['total_visitor'] != 0) {
                $out[] = [
                    "number" => $i,
                    'id' => $dta['id'],
                    'userid' => $dta['userid'],
                    'fullname' => $dta['fullname'],
                    'no_telepon' => $dta['no_telepon'],
                    'country_code' => $dta['country_code'],
                    'phone_number' => $dta['phone_number'],
                    'email' => $dta['email'],
                    'location' => $dta['location'],
                    'latitude' => $dta['latitude'],
                    'longitude' => $dta['longitude'],
                    'birthday' => $dta['birthday'],
                    'gender' => $dta['gender'],
                    'about' => $dta['about'],
                    'occupation' => $dta['occupation'],
                    'company' => $dta['company'],
                    'height' => $dta['height'],
                    'weight' => $dta['weight'],
                    'nation' => $dta['nation'],
                    'school' => $dta['school'],
                    'relationship' => $dta['relationship'],
                    'userimage' => $dta['userimage'],
                    'interesting' => $dta['interesting'],
                    'likeuser' => $dta['likeuser'],
                    'dislikeuser' => $dta['dislikeuser'],
                    'hideshow' => $dta['hideshow'],
                    'statususer' => $dta['statususer'],
                    'version' => $dta['version'],
                    'token' => $dta['token'],
                    'created' => $dta['created'],
                    'age' => "$age",
                    'vip' => $vip,
                    'total_visitor' => $dta['total_visitor']
                ];
                $i++;
            }
        }
        return $out;
    }

    public function clickview($data)
    {
        return $this->db->insert('visitor', $data);
    }

    public function updateclickview($data)
    {
        $dataupdate = [
            'created' => date("Y-m-d h:m:s")
        ];
        $this->db->where($data);
        return $this->db->update('visitor', $dataupdate);
    }

    function template1($subject, $text1, $text2, $web, $appname, $linkbtn, $linkgoogle, $address)
    {
        $msg = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml"><head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width" name="viewport">
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 610px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">

<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">


<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 26px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 31px; margin: 0;"><span style="font-size: 26px;"><strong>' . $subject . '</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 20px; padding-bottom: 10px; padding-left: 20px;" valign="top">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 5px solid ' . emailthemecolor . '; width: 50%;" valign="top" width="50%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">


<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">


<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">

<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: justify; mso-line-height-alt: 17px; margin: 0;">' . $text1 . '</p>
</div><div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">

</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt; width:192pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="' . emailthemecolor . '"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<a href="' . $linkbtn . '" rel="noopener" style="color: #ffffff" target="_blank"><div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:' . emailthemecolor . ';border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid ' . emailthemecolor . ';border-right:1px solid ' . emailthemecolor . ';border-bottom:1px solid ' . emailthemecolor . ';border-left:1px solid ' . emailthemecolor . ';padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong> Reset Password </strong></span></span></div></a>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>

<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">


<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">


<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">' . $text2 . ' .</p>
</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid two-up" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">


<div class="col num6" style="max-width: 320px; min-width: 295px; display: table-cell; vertical-align: top; width: 295px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">


<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: NaNpx; margin: 0;">' . $address . '</p>
</div>
</div>





</div>

</div>
</div>


<div class="col num6" style="max-width: 320px; min-width: 295px; display: table-cell; vertical-align: top; width: 295px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

<div align="center" class="img-container center fixedwidth" style="padding-right: 10px;padding-left: 10px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 10px;padding-left: 10px;" align="center"><![endif]--><a href="' . $linkgoogle . '"><img align="center" alt="Image" border="0" class="center fixedwidth" src="../images/googleplay.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 206px; display: block;" title="Image" width="206" data-iml="5150976.220000001"></a><a>
<!--[if mso]></td></tr></table><![endif]-->
</a></div></div><a>
<!--<![endif]-->
</a></div><a>
</a></div><a>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</a></div><a>
</a></div><a>
</a></div><a>
</a><div style="background-color:transparent;"><a>
</a><div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;"><a>
</a><div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;"><a>
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
</a><div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;"><a>
</a><div style="width:100% !important;"><a>
<!--[if (!mso)&(!IE)]><!-->
</a><div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><a>
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
</a><div style="color:#999999;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;"><a>
</a><div style="font-size: 14px; line-height: 1.2; color: #999999; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;"><a>
</a><p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;"><a>Copyright Â© 2020 </a><a href="' . $web . '" rel="noopener" style="text-decoration: underline; color: ' . emailthemecolor . ';" target="_blank">' . $appname . '</a>. All Rights Reserved</p>
</div><a>
</a></div><a>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</a></div><a>
<!--<![endif]-->
</a></div><a>
</a></div><a>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</a></div><a>
</a></div><a>
</a></div><a>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</a></td>
</tr>
</tbody>
</table>



</body></html>';
        return $msg;
    }

    function emailsend($subject, $emailuser, $content, $host, $port, $username, $password, $from, $appname, $secure)
    {
        require APPPATH . '/libraries/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = $secure;
        $mail->Host = $host; //host masing2 provider email
        $mail->SMTPDebug = 0;
        $mail->Port = $port;
        $mail->SMTPAuth = true;
        $mail->Username = $username; //user email
        $mail->Password = $password; //password email 
        $mail->SetFrom($from, $appname); //set email pengirim
        $mail->Subject = $subject; //subyek email
        $mail->AddAddress($emailuser, "User");  //tujuan email
        $mail->MsgHTML($content); //pesan dapat berupa html
        return $mail->Send();
    }
}
