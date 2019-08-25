<?php 

Class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index() {
     
        $data['user'] = $this->user_model->getUser();

        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin');
            $this->load->view('admin/admin_user',$data);
            $this->load->view('templates/footer');
        }
        else{
            redirect('Auth');
        }
    }

    public function addUser() {
        $result = $this->user_model->addUser();

        if($result) {
    
            redirect('User','refresh');
    
           } else {
            
            redirect('User','refresh');
           
            }
           
    }
}

?>