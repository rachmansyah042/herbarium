<?php

class Herbarium_model extends CI_Model {


    public function totalHerbariumRow()
    {

        return $this->db->get('herbarium')->num_rows();
    
    } 

    public function GetHerbariumById($idHerbarium){
        $this->db->select('*');
        $this->db->where('id_herbarium',$idHerbarium);
        $query = $this->db->get('herbarium');
        return $query;
    }

    public function getEditHebarium()  
    {

        return $this->db->get('herbarium')->result_array();

    }

    public function getHerbarium($number,$offset) {

        $this->db->select('herbarium.species, familia.familia, familia.id_familia, herbarium.id_herbarium, herbarium.leaf_morphology, herbarium.location, herbarium.collection_date, herbarium.collector ');
        $this->db->from('herbarium');
        $this->db->join('familia','familia.id_familia=herbarium.id_familia');
        $this->db->limit($number,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ViewHerbariumById($idHerbarium){
        $this->db->select('*');
        $this->db->where('id_herbarium',$idHerbarium);
        $this->db->join('familia','familia.id_familia=herbarium.id_familia');
        $query = $this->db->get('herbarium');
        return $query->result_array();
    }

    private function herbariumImage()
    {
     
        $config['upload_path']          = './assets/images/herbarium';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'herb_'.preg_replace('/\s+/', '', $this->input->post('species'));
        $config['overwrite']			= true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('herbarium_pict')) {
            return $this->upload->data("file_name");
        } else {
            return "default.jpg";
        }
        
    }

    private function realImage()
    {
     
        $config['upload_path']          = './assets/images/real';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'real_'.preg_replace('/\s+/', '', $this->input->post('species'));
        $config['overwrite']			= true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('real_pic')) {
            return $this->upload->data("file_name");
        } else {
            return "default.jpg";
        }
        
    }


    public function addHerb()
    {

        $user_id = $this->session->userdata('id_user');

        $genus = $this->input->post('genus');
        $id_familia = $this->input->post('id_familia');
        $id_user = $user_id;
        $species = $this->input->post('species');
        $local_name = $this->input->post('local_name');
        $leaf_morphology = $this->input->post('leaf_morphology');
        $herbarium_pic = $this->herbariumImage();
        $real_pic = $this->realImage();;
        $collection_num = $this->input->post('collection_num');
        $collection_date = $this->input->post('collection_date');
        $convertDate = date("Y-m-d", strtotime($collection_date));
        $location = $this->input->post('location');
        $habitat_type = $this->input->post('habitat_type');
        $collector = $this->input->post('collector');
        $identifier = $this->input->post('identifier');
        $notes = $this->input->post('notes');

        $data = array(
            'id_familia' => $id_familia,
            'id_user' => $id_user,
            'genus' => $genus,
			'species' => $species,
			'local_name' => $local_name,
			'leaf_morphology' => $leaf_morphology,
			'herbarium_pic' => $herbarium_pic,
			'real_pic' => $real_pic,
			'collection_num' => $collection_num,
			'collection_date' => $convertDate,
			'location' => $location,
			'habitat_type' => $habitat_type,
			'collector' => $collector,
			'identifier' => $identifier,
            'notes' => $notes,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            );

        // add herb     
        $this->db->insert('herbarium', $data);
        //update count herbarium
        $this->db->where('id_familia', $id_familia);
        $this->db->set('total_herbarium', 'total_herbarium + 1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->update('familia');
    }

    public function edit($id) 
    {

        $user_id = $this->session->userdata('id_user');

        
        $id_herbarium = $this->input->post('id_herbarium');
        $last_familia = $this->input->post('last_familia');


        $genus = $this->input->post('genus');
        $id_familia = $this->input->post('id_familia');
        $id_user = $user_id;
        $species = $this->input->post('species');
        $local_name = $this->input->post('local_name');
        $leaf_morphology = $this->input->post('leaf_morphology');
        $herbarium_pic = $this->herbariumImage();
        $real_pic = $this->realImage();;
        $collection_num = $this->input->post('collection_num');
        $collection_date = $this->input->post('collection_date');
        $convertDate = date("Y-m-d", strtotime($collection_date));
        $location = $this->input->post('location');
        $habitat_type = $this->input->post('habitat_type');
        $collector = $this->input->post('collector');
        $identifier = $this->input->post('identifier');
        $notes = $this->input->post('notes');

        $data = array(
            'id_familia' => $id_familia,
            'id_user' => $id_user,
            'genus' => $genus,
			'species' => $species,
			'local_name' => $local_name,
			'leaf_morphology' => $leaf_morphology,
			'herbarium_pic' => $herbarium_pic,
			'real_pic' => $real_pic,
			'collection_num' => $collection_num,
			'collection_date' => $convertDate,
			'location' => $location,
			'habitat_type' => $habitat_type,
			'collector' => $collector,
			'identifier' => $identifier,
            'notes' => $notes,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            );

        // update herb     
        $this->db->update('herbarium', $data, ['id_herbarium' => $id_herbarium]);
        // print_r($id_familia);
        // print_r($last_familia);

        // if familia not change
        if (!($last_familia == $id_familia)) {

            //update count herbarium
        $this->db->where('id_familia', $id_familia);
        $this->db->set('total_herbarium', 'total_herbarium + 1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->update('familia');

        // delete latest famili count
        $this->db->where('id_familia', $last_familia);
        $this->db->set('total_herbarium', 'total_herbarium - 1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->update('familia');


        }     

    }

    public function delete($id)
    {
        //update count herbarium
        $id_familia = $this->input->post('id_familia');

        $this->db->where('id_familia', $id_familia);
        $this->db->set('total_herbarium', 'total_herbarium - 1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->update('familia');

        $this->db->delete('herbarium', array("id_herbarium" => $id));

    }

}


?>