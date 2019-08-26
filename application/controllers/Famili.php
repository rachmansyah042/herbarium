<?php  defined('BASEPATH') OR exit('No direct script access allowed');


Class Famili extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('famili_model');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index() {   

        // pagination
        $jumlah_data = $this->famili_model->totalFamiliRow();
        $data['id_role'] = $this->session->userdata('id_role');

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-end">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['base_url'] = base_url().'Famili/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['familia'] = $this->famili_model->getPaginationFamili($config['per_page'],$from);

        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin',$data);
            $this->load->view('admin/admin_famili',$data);
            $this->load->view('templates/footer');
        }
        else{
            redirect('Auth'); 
        }
    }

    public function AddFamili() {
        $result = $this->famili_model->AddFamili();

        if($result) {
    
            redirect('Famili','refresh');
    
           } else {
            
            redirect('Famili','refresh');
           
            }
           
    }
}

?>