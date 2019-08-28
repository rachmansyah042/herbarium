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

    public function editFamili($id) {

        $result = $this->famili_model->edit($id);
        // print_r($result);
        
 
        if($result) {
 
         redirect('famili','refresh');
 
        } else {
         
         redirect('famili','refresh');
        
         }
         
     }

    public function GetFamiliById(){
        $idFamili = $this->input->post('idFamili');
        $records = $this->famili_model->GetFamiliById($idFamili);
        
        // print_r($idFamili);
        $output='';

        foreach($records->result_array() as $row){
            $output .= 
            '                   
                <form class="form-signin" action="'.base_url('Famili/editFamili/'.$row['id_familia']).'" method="post" enctype="multipart/form-data">
                <div class="form-label-group mb-3">
                    <input name= "id_familia" value="'.$row['id_familia'].'" hidden>
                    <input type="text" id="familia" name="familia" value="'.$row['familia'].'" class="form-control" placeholder="Nama Famili">
                    <label for="familia">Nama Famili</label>
                </div>   
                
                <div class="form-label-group mb-3">
                    <input type="text" id="familia" name="total_herbarium" value="'.$row['total_herbarium'].'" class="form-control" placeholder="Jumlah Herbarium">
                    <label for="familia">Jumlah Herbarium</label>
                </div> 
        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                ' ;
            
        }

        echo($output);
    }

    public function ViewFamiliById(){
        $idFamili = $this->input->post('idFamilia');
        $records = $this->famili_model->ViewFamiliById($idFamili);
        $output = '';
        foreach($records as $row){
            $output .= '
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Nama Famili</label>
                <div class="form-control">'.$row["familia"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Tanggal Pembuatan</label>
                <div class="form-control">'.date("d-M-Y", strtotime($row["created_at"])).'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Tanggal Pembaharuan</label>
                <div class="form-control">'.date("d-M-Y", strtotime($row["updated_at"])).'</div>
            </div>'
            ;
        }
        echo $output;
    }
}

?>