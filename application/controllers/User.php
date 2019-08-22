<?php 

Class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index() {
     
        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin');
            $this->load->view('admin/admin_user');
            $this->load->view('templates/footer');
        }
        else{
            redirect('Auth');
        }
    }
}

?>