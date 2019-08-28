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

    public function GetFamiliById($id) 
    {
        $this->db->select('*');
        $this->db->where('id_familia',$id);
        $query = $this->db->get('familia');
        return $query;
    }

    public function ViewFamiliById($idFamili)
    {
    
        $this->db->select('*');
        $this->db->where('id_familia',$idFamili);
        $query = $this->db->get('familia');
        return $query->result_array();
    
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

    public function edit($id) 
    {

        $user_id = $this->session->userdata('id_user');

        $id_familia = $this->input->post('id_familia');
        $id_user = $user_id;
        $familia = $this->input->post('familia');
        $total = $this->input->post('total_herbarium');

        $data = array(
            'id_familia' => $id_familia,
            'id_user' => $id_user,
            'familia' => $familia,
            'total_herbarium' => $total,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            );

        // update herb     
        $this->db->update('familia', $data, ['id_familia' => $id_familia]);
    
    }
}

?>