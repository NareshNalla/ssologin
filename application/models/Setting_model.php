<?php

class Setting_model extends CI_model
{
    public function getcurrency()
    {
        $this->db->select('app_currency as currency');
        $this->db->where('id', '1');
        return $this->db->get('app_settings')->row('currency');
    }

    public function getappbyid()
    {
        return $this->db->get_where('app_settings', ['id' => '1'])->row_array();
    }

    public function editdataappsettings($data)
    {
        $this->db->where('id', '1');
        return $this->db->update('app_settings', $data);
    }
}
