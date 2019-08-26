<?php

class Famili_model extends CI_Model {

    
    public function getFamili() 
    {

        return $this->db->get('familia')->result_array();

    }

    public function getPaginationFamili($number,$offset) 
    {

        return $this->db->get('familia',$number,$offset)->result_array();

    }

    public function totalFamiliRow()
    {

        return $this->db->get('familia')->num_rows();
    
    }

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