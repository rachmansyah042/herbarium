<?php

class Herbarium_model extends CI_Model {

    public function GetFamili() 
    {

        return $this->db->get('familia')->result_array();

    }

    public function GetHerbarium() {

        $this->db->select('herbarium.species, familia.familia, herbarium.id_herbarium, herbarium.leaf_morphology, herbarium.location, herbarium.collection_date, herbarium.collector ');
        $this->db->from('herbarium');
        $this->db->join('familia','familia.id_familia=herbarium.id_familia');
        $query = $this->db->get();
        return $query->result_array();
    }

    private function herbariumImage()
    {
     
        $config['upload_path']          = './assets/images/herbarium';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = preg_replace('/\s+/', '', $this->input->post('species'));
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
			'notes' => $notes
            );
            
            
        // print_r($herbarium_pic);

        $this->db->insert('herbarium', $data);
    }

}


?>