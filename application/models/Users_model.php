<?php


class Users_model extends CI_model
{
  public function getAllusers()
  {
    $this->db->select('users.*');
    return $this->db->get('users')->result_array();
  }

  public function getAllpurchase()
  {
    $this->db->select('purchaseuser.*, users.fullname as username, 
        users.userimage as userimage');
    $this->db->from('purchaseuser');
    $this->db->join('users', 'users.userid = purchaseuser.id_user', 'left outer');
    return $this->db->get()->result_array();
  }

  public function getuserpurchase($id)
  {
    $this->db->select('purchaseuser.*, users.fullname as username, 
        users.userimage as userimage');
    $this->db->from('purchaseuser');
    $this->db->join('users', 'users.userid = purchaseuser.id_user', 'left outer');
    $this->db->where('purchaseuser.id_user', $id);
    return $this->db->get()->result_array();
  }

  public function getusersbyid($id)
  {
    return  $this->db->get_where('users', ['users.userid' => $id])->row_array();
  }


  public function getAlllike($id)
  {
    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matches.action_type', 'like');
    $this->db->where('matches.myid', $id);
    $this->db->where('matches.effected', 'true');
    $this->db->order_by('matches.id', 'DESC');

    $datamatch = $this->db->get();



    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getlistbyid($data['myid']);
      $user2 = $this->getlistbyid($data['matchid']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'created' => $data['created'],
      );
    }

    return $out;
  }

  public function getAllvisit($id)
  {
    $this->db->select('visitor.*');
    $this->db->from('visitor');
    $this->db->where('visitor.vimyid', $id);
    $this->db->order_by('visitor.visitorid', 'DESC');
    $datamatch = $this->db->get();

    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getlistbyid($data['vimyid']);
      $user2 = $this->getlistbyid($data['viuserid']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'created' => $data['created'],
      );
    }

    return $out;
  }

  public function getAllvisitor($id)
  {
    $this->db->select('visitor.*');
    $this->db->from('visitor');
    $this->db->where('visitor.viuserid', $id);
    $this->db->order_by('visitor.visitorid', 'DESC');
    $datamatch = $this->db->get();

    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getlistbyid($data['vimyid']);
      $user2 = $this->getlistbyid($data['viuserid']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
      );
    }

    return $out;
  }

  public function getAllliked($id)
  {
    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matches.action_type', 'like');
    $this->db->where('matches.matchid', $id);
    $this->db->where('matches.effected', 'true');
    $this->db->order_by('matches.id', 'DESC');

    $datamatch = $this->db->get();



    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getlistbyid($data['myid']);
      $user2 = $this->getlistbyid($data['matchid']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
      );
    }

    return $out;
  }

  public function getAllusermatch($id)
  {
    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matches.matchorno', 'true');
    $this->db->where('matches.myid', $id);
    $this->db->order_by('matches.id', 'DESC');
    $datamatch = $this->db->get();

    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getlistbyid($data['myid']);
      $user2 = $this->getlistbyid($data['matchid']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'id2' => $user2->row('id'),
        'id2' => $user2->row('id'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'created' => $data['created'],
      );
    }

    return $out;
  }

  public function getAllusergallery($id)
  {
    $this->db->select('*');
    $this->db->from('gallery');
    $this->db->where('gallery.userid', $id);
    $this->db->order_by('gallery.id', 'DESC');
    return $this->db->get()->result_array();
  }



  public function getlistbyid($id)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('userid', $id);
    return $this->db->get();
  }

  public function adduser($data)
  {
    return $this->db->insert('users', $data);
  }

  public function edituser($data)
  {
    $this->db->where('userid', $data['userid']);
    return $this->db->update('users', $data);
  }

  public function addgallery($data)
  {
    $this->db->where('userid', $data['userid']);
    return $this->db->insert('gallery', $data);
  }

  public function getgallerybyid($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('gallery')->row_array();
  }

  public function deletegallerybyid($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('gallery');
  }


  public function trending()
  {
    $this->db->select('users.*');
    $this->db->select('(SELECT COUNT(ti.visitorid)
        FROM visitor ti
        WHERE ti.viuserid = users.userid) total_visitor');
    $this->db->from('users');
    $this->db->order_by('total_visitor DESC');
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

  public function trendingbyid($id)
  {
    $this->db->select('users.*');
    $this->db->select('(SELECT COUNT(ti.visitorid)
        FROM visitor ti
        WHERE ti.vimyid = users.userid) total_visitor');
    $this->db->where('userid', $id);
    $this->db->from('users');
    $this->db->order_by('total_visitor DESC');
    $datanearby = $this->db->get()->row_array();
  }

  public function getusergallery($id)
  {
    $this->db->where('userid', $id);
    return $this->db->get('gallery')->result_array();
  }

  public function deletedatauserbyid($id)
  {

    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matches.matchorno', 'true');
    $this->db->where('matches.myid', $id);
    $this->db->order_by('matches.id', 'DESC');
    $datamatch = $this->db->get()->result_array();

    foreach ($datamatch as $dtm) {

      $this->delete_chat($dtm['matchid'], $dtm['myid']);
    }

    $this->db->where('userid', $id);
    $this->db->delete('users');

    $this->db->where('userid', $id);
    $this->db->delete('gallery');

    $this->db->where('myid', $id);
    $this->db->delete('matches');

    $this->db->where('matchid', $id);
    $this->db->delete('matches');

    $this->db->where('vimyid', $id);
    $this->db->delete('visitor');

    $this->db->where('viuserid', $id);
    $this->db->delete('visitor');

    return true;
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

  public function blockusersById($id)
  {
    $this->db->set('statususer', 0);
    $this->db->where('userid', $id);
    return $this->db->update('users');
  }

  public function unblockusersById($id)
  {
    $this->db->set('statususer', 1);
    $this->db->where('userid', $id);
    return $this->db->update('users');
  }

  public function totalvipuser()
  {
    $this->db->select('users.*');
    $this->db->select('(SELECT COUNT(ti.visitorid)
        FROM visitor ti
        WHERE ti.vimyid = users.userid) total_visitor');
    $this->db->from('users');
    $this->db->order_by('total_visitor DESC');
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

      if ($vip > 0) {
        $out[] = [
          "number" => $i,
          'id' => $dta['id'],
        ];
        $i++;
      }
    }

    return count($out);
  }

  public function usertotallikebyid($id)
  {
    $this->db->select('IFNULL(COUNT(*), 0) as totaluserlike');
    $this->db->from("matches");
    $this->db->where("YEAR(created)", date('Y'));
    $this->db->where("MONTH(created)", date('m'));
    $this->db->where("effected", 'true');
    $this->db->where("action_type", 'like');
    $this->db->where("myid", $id);
    return $this->db->get()->row('totaluserlike');
  }

  public function usertotalmatchbyid($id)
  {
    $this->db->select('IFNULL(COUNT(*), 0) as totalusermatch');
    $this->db->from("matches");
    $this->db->where("YEAR(created)", date('Y'));
    $this->db->where("MONTH(created)", date('m'));
    $this->db->where("effected", 'true');
    $this->db->where("action_type", 'like');
    $this->db->where("matchorno", 'true');
    $this->db->where("matchid", $id);
    return $this->db->get()->row('totalusermatch');
  }
}
