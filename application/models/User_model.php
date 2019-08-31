<?php

class User_model extends CI_Model {

    public function getUser() 
    {

        return $this->db->get('user')->result_array();

    } 

    public function getPaginationUser($number,$offset) 
    {

        return $this->db->get('user',$number,$offset)->result_array();

    }

    public function totalUserRow()
    {

        return $this->db->get('user')->num_rows();
    
    }

    public function GetUserById($id)
    {
        $this->db->select('*');
        $this->db->where('id_user',$id);
        $query = $this->db->get('user');
        return $query;
    }

    public function ViewUserById($idUser)
    {
    
        $this->db->select('*');
        $this->db->where('id_user',$idUser);
        $query = $this->db->get('user');
        return $query->result_array();
    
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

    public function edit($id) 
    {

        $id_user = $this->input->post('id_user');
        $id_role = '2';
        $is_active = 1;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');

        if ($password == '') {
            $data = array(
                'id_user' => $id_user,
                'username' => $username,
                'name' => $name,
                'is_active' => $is_active,
                'id_role' => $id_role,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                );
        } 
        else {
            $data = array(
                'id_user' => $id_user,
                'username' => $username,
                'password' => MD5($password),
                'name' => $name,
                'is_active' => $is_active,
                'id_role' => $id_role,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                );
        }

        // update user    
        $this->db->update('user', $data, ['id_user' => $id_user]);
    
    }

    public function isActive()
    {
        $id_user = $this->input->post('id_user');
        $id_role = '2';
        $is_active = $this->input->post('is_active');

            $data = array(
                'id_user' => $id_user,
                'is_active' => $is_active,
                'id_role' => $id_role,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                );
      

        // update user    
        $this->db->update('user', $data, ['id_user' => $id_user]);
    
    }
}

?>