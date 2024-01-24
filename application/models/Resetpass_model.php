<?php

class Resetpass_model extends CI_model
{

    public function check_token($token)
    {
        return $this->db->get_where('forgot_password', ['token' => $token])->row_array();
    }

    public function resetpass()
    {

        $data = [
            "password" => sha1($this->input->post('password', true))
        ];

        $this->db->where('userid', $this->input->post('id'));
        return $this->db->update('users', $data);
    }

    public function deletetoken()
    {
        $this->db->delete('forgot_password', ['token' => $this->input->post('token')]);
        return true;
    }
}
