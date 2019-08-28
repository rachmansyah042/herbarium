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
     
        
        // pagination
        $jumlah_data = $this->user_model->totalUserRow();
        // $data['user'] = $this->user_model->getUser();
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

        $config['base_url'] = base_url().'User/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['user'] = $this->user_model->getPaginationUser($config['per_page'],$from);

        if($this->session->userdata('id_user')){
            $this->load->view('templates/header_admin',$data);
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

    public function editUser($id) {

        $result = $this->user_model->edit($id);
        // print_r($result);
        
 
        if($result) {
 
         redirect('user','refresh');
 
        } else {
         
         redirect('user','refresh');
        
         }
         
    }

    public function GetUserById(){
        $idUser = $this->input->post('idUser');
        $records = $this->user_model->GetUserById($idUser);
        
        // print_r($idFamili);
        $output='';

        foreach($records->result_array() as $row){
            $output .= 
            '                   
                <form class="form-signin" action="'.base_url('User/editUser/'.$row['id_user']).'" method="post" enctype="multipart/form-data">
                <div class="form-label-group mb-3">
                    <input name="id_user" value="'.$row['id_user'].'" hidden>
                    <input type="text" id="name" name="name" value="'.$row['name'].'" class="form-control" placeholder="Nama User">
                    <label for="name">Nama User</label>
                </div>   
                
                <div class="form-label-group mb-3">
                    <input type="text" id="username" name="username" value="'.$row['username'].'" class="form-control" placeholder="Username">
                    <label for="username">Username</label>
                </div> 

                <div class="form-group mb-3">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru">
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

    public function ViewUserById(){
        $idUser = $this->input->post('idUser');
        $records = $this->user_model->ViewUserById($idUser);
        $output = '';
        foreach($records as $row){
            $output .= '
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Nama User</label>
                <div class="form-control">'.$row["name"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Username</label>
                <div class="form-control">'.$row["username"].'</div>
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