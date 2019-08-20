<?php

class Admin extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index() {

        
        $data['familia'] = $this->db->get('familia')->result_array();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/admin_herbarium',$data);
        $this->load->view('templates/footer');

        // print_r($data);
       
    }


    public function famili() {

        $data['familia'] = $this->db->get('familia')->result_array();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/admin_famili',$data);
        $this->load->view('templates/footer');
        // print_r($data);
    }

    public function user() {
        $this->load->view('templates/header_admin');
        $this->load->view('admin/admin_user');
        $this->load->view('templates/footer');
    }


}

?>