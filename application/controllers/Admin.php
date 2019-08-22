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

       
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }


}

?>