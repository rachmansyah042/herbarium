<?php defined('BASEPATH') OR exit('No direct script access allowed');


Class Herbarium extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');	
        $this->load->model('herbarium_model');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index() {
        $data['familia'] = $this->herbarium_model->GetFamili();
        $data['herbarium'] = $this->herbarium_model->GetHerbarium();

        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin');
            $this->load->view('admin/admin_herbarium',$data);
            $this->load->view('templates/footer');
        }
        else{
            redirect('Auth');
        }
        // print_r($data);
    }

    public function addHerbarium() {

       $result = $this->herbarium_model->addHerb();
       print_r($result);
       

       if($result) {
        redirect('Herbarium');
       } else {
        redirect('Herbarium');
       }
        
    }
}

?>