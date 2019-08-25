<?php

class Famili_model extends CI_Model {

    public function addFamili() 
    {
        $user_id = $this->session->userdata('id_user');
        
        $familia = $this->input->post('familia');

        $data = array(
            'familia' => $familia,
            'id_user' => $user_id,
            'total_herbarium' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->insert('familia', $data);
    }
}

?>