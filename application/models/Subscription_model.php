<?php

class Subscription_model extends CI_model
{
    public function getAllsubs()
    {
        return $this->db->get('purchasepackage')->result_array();
    }

    public function addsubs($data)
    {
        return $this->db->insert('purchasepackage', $data);
    }

    public function getsubsbyid($id)
    {
        return  $this->db->get_where('purchasepackage', ['purchasepackage.id' => $id])->row_array();
    }

    public function editsubs($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('purchasepackage', $data);
    }

    public function deletesubsbyid($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('purchasepackage');
    }
}
