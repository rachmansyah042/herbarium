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
        $data['familia'] = $this->herbarium_model->getFamili();
        $data['herbarium'] = $this->herbarium_model->getHerbarium();
        $data['edit_herbarium'] = $this->herbarium_model->getEditHebarium();
        $data['id_role'] = $this->session->userdata('id_role');
        // print_r($data['edit_herbarium']);

        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin',$data);
            $this->load->view('admin/admin_herbarium',$data);
            $this->load->view('templates/footer');
        }
        else{
            redirect('Auth','refresh');
        }
        // print_r($data);
    }

    public function addHerbarium() {

       $result = $this->herbarium_model->addFamili();
    //    print_r($result);
       

       if($result) {

        // $this->session->set_flashdata('herbarium','<div class="alert alert-success" role="alert">
        // Herbarium Berhasil Ditambahkan
        // </div>');

        redirect('Herbarium','refresh');

       } else {
        
        redirect('Herbarium','refresh');
       
        }
        
    }

    public function editHerbarium($id) {

        $result = $this->herbarium_model->edit($id);
        // print_r($result);
        
 
        if($result) {
 
         // $this->session->set_flashdata('herbarium','<div class="alert alert-success" role="alert">
         // Herbarium Berhasil Ditambahkan
         // </div>');
 
         redirect('Herbarium','refresh');
 
        } else {
         
         redirect('Herbarium','refresh');
        
         }
         
     }
 

    public function delete($id) {
        
        $result = $this->herbarium_model->delete($id);
        // print_r($result);


        if($result) {
            // $this->session->set_flashdata('hapus','<div class="alert alert-success text-center" role="alert">
            // Herbarium Berhasil Dihapus
            // </div>');
            redirect('Herbarium');
           } else {
            redirect('Herbarium');
           }
    }
}

?>