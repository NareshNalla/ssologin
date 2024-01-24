<?php

class Purchase_model extends CI_model
{
    public function getpurchasetotalamount()
    {
        $this->db->select('id_purchase, SUM(amount) as totalamount');
        $this->db->from("purchaseuser");
        $this->db->where('status', 1);
        return $this->db->get()->row('totalamount');
    }

    public function getpaypaltotalamount()
    {
        $this->db->select('id_purchase, SUM(amount) as totalpaypal');
        $this->db->from("purchaseuser");
        $this->db->where('paymentmethod', 'paypal');
        $this->db->where('status', 1);
        return $this->db->get()->row('totalpaypal');
    }

    public function getstripetotalamount()
    {
        $this->db->select('id_purchase, SUM(amount) as totalstripe');
        $this->db->from("purchaseuser");
        $this->db->where('paymentmethod', 'stripe');
        $this->db->where('status', 1);
        return $this->db->get()->row('totalstripe');
    }
    
    public function getrazorpaytotalamount()
    {
        $this->db->select('id_purchase, SUM(amount) as totalrazorpay');
        $this->db->from("purchaseuser");
        $this->db->where('paymentmethod', 'razorpay');
        $this->db->where('status', 1);
        return $this->db->get()->row('totalrazorpay');
    }
    
    public function getflutterwavetotalamount()
    {
        $this->db->select('id_purchase, SUM(amount) as totalflutterwave');
        $this->db->from("purchaseuser");
        $this->db->where('paymentmethod', 'flutterwave');
        $this->db->where('status', 1);
        return $this->db->get()->row('totalflutterwave');
    }
}
