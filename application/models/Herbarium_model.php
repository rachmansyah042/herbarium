<?php

class Herbarium_model extends CI_Model {

    public function GetFamili() 
    {

        return $this->db->get('familia')->result_array();

    }

    public function addHerb()
    {
        $genus = $this->input->post('genus');
        $id_familia = $this->input->post('id_familia');
        $id_user = 2;
        $species = $this->input->post('species');
        $local_name = $this->input->post('local_name');
        $leaf_morphology = $this->input->post('leaf_morphology');
        $herbarium_pic = 'oke';
        $real_pic = 'oke';
        $collection_num = $this->input->post('collection_num');
        $collection_date = $this->input->post('collection_date');
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
			'collection_date' => $collection_date,
			'location' => $location,
			'habitat_type' => $habitat_type,
			'collector' => $collector,
			'identifier' => $identifier,
			'notes' => $notes
			);

        print_r($data);

        $this->db->insert('herbarium', $data);
    }

}


?>