<?php 

Class Famili extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('herbarium_model');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index() {

        $data['familia'] = $this->herbarium_model->getFamili();

        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin');
            $this->load->view('admin/admin_famili',$data);
            $this->load->view('templates/footer');
        }
        else{
            redirect('Auth');
        }
    }
}

?>