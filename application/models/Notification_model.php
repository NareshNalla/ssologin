<?php

class Notification_model extends CI_model
{
  public function send_notif($title, $message, $topic)
  {

    $data = array(
      'title' => $title,
      'message' => $message,
      'type' => 4
    );
    $senderdata = array(
      'data' => $data,
      'to' => '/topics/' . $topic
    );

    $headers = array(
      'Content-Type : application/json',
      'Authorization: key=' . keyfcm
    );
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($senderdata),
      CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    return $response;
  }
}
