<?php


class Dashboard_model extends CI_model
{
  public function getAllmatches()
  {
    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matches.matchorno', 'true');
    $this->db->where('matches.effected', 'true');
    $this->db->order_by('matches.id', 'DESC');
    $datamatch = $this->db->get();

    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getusersbyid($data['myid']);
      $user2 = $this->getusersbyid($data['matchid']);
      $matches = $this->getallmatcheslist($data['created']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'id2' => $user2->row('id'),
        'id2' => $user2->row('id'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'datem' => $matches->row('created'),
      );
    }

    return $out;
  }

  public function getallactivity()
  {
    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matchorno', 'true');
    $this->db->order_by('matches.id', 'DESC');
    $datamatch = $this->db->get();

    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('action_type', 'like');
    $this->db->where('effected', 'true');
    $this->db->order_by('matches.id', 'DESC');
    $datalike = $this->db->get();

    $this->db->select('visitor.*');
    $this->db->from('visitor');
    $this->db->order_by('visitor.visitorid', 'DESC');
    $datavisitor = $this->db->get();

    $out = array();
    $out2 = array();
    $out3 = array();
    foreach ($datavisitor->result_array() as $data) {
      $user1 = $this->getusersbyid($data['vimyid']);
      $user2 = $this->getusersbyid($data['viuserid']);
      $matches = $this->getallmatcheslist($data['created']);
      $out2[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'id2' => $user2->row('id'),
        'id2' => $user2->row('id'),
        'status1' => 'visitor',
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'datem' => $data['created'],
      );
    }

    foreach ($datalike->result_array() as $data) {
      $user1 = $this->getusersbyid($data['myid']);
      $user2 = $this->getusersbyid($data['matchid']);
      $matches = $this->getallmatcheslist($data['created']);
      $out3[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'id2' => $user2->row('id'),
        'id2' => $user2->row('id'),
        'status1' => 'like',
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'datem' => $data['created'],
      );
    }

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getusersbyid($data['myid']);
      $user2 = $this->getusersbyid($data['matchid']);
      $matches = $this->getallmatcheslist($data['created']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'id2' => $user2->row('id'),
        'id2' => $user2->row('id'),
        'status1' => 'match',
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'datem' => $data['created'],
      );
    }
    $merge = array_unique(array_merge($out, $out2), SORT_REGULAR);
    $merge2 = array_unique(array_merge($merge, $out3), SORT_REGULAR);

    return $merge2;
  }

  public function getAlllike()
  {
    $this->db->select('matches.*');
    $this->db->from('matches');
    $this->db->where('matches.action_type', 'like');
    $this->db->where('matches.effected', 'true');
    $this->db->order_by('matches.id', 'DESC');
    $datamatch = $this->db->get();

    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getusersbyid($data['myid']);
      $user2 = $this->getusersbyid($data['matchid']);
      $matches = $this->getallmatcheslist($data['created']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'datem' => $data['created'],
      );
    }

    return $out;
  }

  public function getAllvisit()
  {
    $this->db->select('visitor.*');
    $this->db->from('visitor');
    $this->db->order_by('visitor.visitorid', 'DESC');
    $datamatch = $this->db->get();

    $out = array();

    foreach ($datamatch->result_array() as $data) {

      $user1 = $this->getusersbyid($data['vimyid']);
      $user2 = $this->getusersbyid($data['viuserid']);
      $visitor = $this->getallvisitorlist($data['created']);
      $out[] = array(

        'userid1' => $user1->row('userid'),
        'userid2' => $user2->row('userid'),
        'namauser1' => $user1->row('fullname'),
        'namauser2' => $user2->row('fullname'),
        'userimage1' => $user1->row('userimage'),
        'userimage2' => $user2->row('userimage'),
        'datev' => $data['created'],
      );
    }

    return $out;
  }

  public function getusersbyid($id)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('userid', $id);
    return $this->db->get();
  }

  public function getallvisitorlist()
  {
    $this->db->select('*');
    $this->db->from('visitor');
    return $this->db->get();
  }

  public function getallmatcheslist()
  {
    $this->db->select('*');
    $this->db->from('matches');
    return $this->db->get();
  }

  public function chartuser($day, $month, $year)
  {
    $this->db->select("userid, count(*) as chartuser");
    $this->db->from("users");
    $this->db->where("DAY(created)", $day);
    $this->db->where("MONTH(created)", $month);
    $this->db->where("YEAR(created)", $year);
    return $this->db->get();
  }

  public function chartmatch($day, $month, $year)
  {
    $this->db->select("count(*) as chartmatch");
    $this->db->from("matches");
    $this->db->where("DAY(created)", $day);
    $this->db->where("MONTH(created)", $month);
    $this->db->where("YEAR(created)", $year);
    $this->db->where("matchorno", 'true');
    return $this->db->get();
  }

  public function chartvip($day, $month, $year)
  {
    $this->db->select("count(*) as chartvip");
    $this->db->from("purchaseuser");
    $this->db->where("DAY(created)", $day);
    $this->db->where("MONTH(created)", $month);
    $this->db->where("YEAR(created)", $year);
    return $this->db->get();
  }

  public function getchartdashboard($month, $year, $service)
  {
    $this->db->select("IFNULL(SUM(purchaseuser.amount), 0) as total");
    $this->db->from("purchaseuser");
    $this->db->where("MONTH(created)", $month);
    $this->db->where("YEAR(created)", $year);
    $this->db->where("paymentmethod", $service);
    $this->db->where("status", 1);
    return number_format($this->db->get()->row('total') / 100, 2, ".", ".");
  }

  public function getprogresstotalmatch()
  {
    $this->db->select('COUNT(*) as totalprogressmatch');
    $this->db->from("matches");
    $this->db->where("YEAR(created)", date('Y'));
    $this->db->where("MONTH(created)", date('m'));
    $this->db->where("effected", 'true');
    $this->db->where("action_type", 'like');
    return $this->db->get()->row('totalprogressmatch');
  }

  public function gettotalmatch()
  {
    $this->db->select('COUNT(*) as totalmatch');
    $this->db->from("matches");
    $this->db->where("YEAR(created)", date('Y'));
    $this->db->where("MONTH(created)", date('m'));
    $this->db->where('matchorno', 'true');
    $this->db->where('effected', 'true');

    $total = $this->db->get()->row('totalmatch');

    $count = $total / 2;
    return $count;
  }
}
