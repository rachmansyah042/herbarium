<?php

class User_model extends CI_Model {

    public function getUser() 
    {

        return $this->db->get('user')->result_array();

    }
    public function addUser() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');

        $data = array(
            'username' => $username,
            'password' => MD5($password),
            'name' => $name,
            'id_role' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->insert('user', $data);
    }
}

?>