<?php defined('BASEPATH') OR exit('No direct script access allowed');


Class Herbarium extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');	
        $this->load->model('herbarium_model');
        $this->load->model('famili_model');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index() {

        
        // pagination
        $jumlah_data = $this->herbarium_model->totalHerbariumRow();

        $data['familia'] = $this->famili_model->getFamili();
        $data['row'] = $this->herbarium_model->getEditHebarium();
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

        $config['base_url'] = base_url().'Herbarium/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['herbarium'] = $this->herbarium_model->getHerbarium($config['per_page'],$from);




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

    public function GetHerbariumById(){
        $idHerbarium = $this->input->post('idHerbarium');
        $familia = $this->famili_model->getFamili();
        // print_r($familia);
        $records = $this->herbarium_model->GetHerbariumById($idHerbarium);
        $output='';

        foreach($records->result_array() as $row){
            $output .= 
            '                   
                <form class="form-signin" action="'.base_url('Herbarium/editHerbarium/'.$row['id_herbarium']).'" method="post" enctype="multipart/form-data">
                <div class="form-label-group mb-3">
                    <input name= "id_herbarium" value="'.$row['id_herbarium'].'" hidden>
                    <input name= "last_familia" value="'.$row['id_familia'].'" hidden>
                    <input type="text" id="spesies" name="species" value="'.$row['species'].'" class="form-control" placeholder="Nama Spesies">
                    <label for="spesies">Nama Spesies</label>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id ="genus" name="genus" value="'.$row['genus'].'" class="form-control" placeholder="Nama Genus">
                    <label for="genus">Nama Genus</label>
                </div>
        
                <div class="form-group mb-3">
                <label for="catatan">Nama Famili</label>
                <select name="id_familia" class="form-control" id="id_familia">';

                foreach ($familia as $nama_famili) {
                    $output .= 
                    '<option value="'.$nama_famili['id_familia'].'"'; 
                    ($row['id_familia'] == $nama_famili['id_familia']) ? $output .= ' selected >' :  $output .= ' >';
                    
                    $output .= $nama_famili['familia'].'</option>';
                }
                $output .=' 
                </select>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="lokal" name="local_name" value="'.$row['local_name'].'" class="form-control" placeholder="Nama Lokal">
                    <label for="lokal">Nama Lokal</label>
                </div>
        
                <div class="input-group mb-3">
                    <div class="col-6"> 
                        <span>Gambar Herbarium</span>
                        <img class="img-collection" id="herb_pic" src="'.base_url('assets/images/herbarium/'.$row['herbarium_pic']).'">
                        <input type="file" name="herbarium_pict" class="form-control-file" id="herbarium_pict" onchange="previewImage();">
                    </div>
        
                    <div class="col-6"> 
                        <span>Gambar Asli</span>
                        <img class="img-collection" id="r_pic" src="'.base_url('assets/images/real/'.$row['real_pic']).'"> 
                        <input type="file" name="real_pic" class="form-control-file" id="real_pic" onchange="realImage();">
                    </div>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="morfologi" name="leaf_morphology" value="'.$row['leaf_morphology'].'" class="form-control" placeholder="Morfologi">
                    <label for="morfologi">Morfologi</label>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="koleksi" name="collection_num" value="'.$row['collection_num'].'" class="form-control" placeholder="No Koleksi">
                    <label for="koleksi">No Koleksi</label>
                </div>
        
                <div class="form-group mb-3">
                <label for="catatan">Tanggal Koleksi</label>
                    <input  id="datepicker" class="form-control" name="collection_date" value="'.$row['collection_date'].'" placeholder="Tanggal Koleksi">
                    <!-- <label for="datepicker">Tanggal Koleksi</label> -->
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="lokasi" name="location" value="'.$row['location'].'" class="form-control" placeholder="Lokasi">
                    <label for="lokasi">Lokasi</label>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="habitat" name="habitat_type" value="'.$row['habitat_type'].'" class="form-control" placeholder="Tipe Habitat">
                    <label for="habitat">Tipe Habitat</label>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="kolektor" name="collector" value="'.$row['collector'].'" class="form-control" placeholder="Kolektor">
                    <label for="kolektor">Kolektor</label>
                </div>
        
                <div class="form-label-group mb-3">
                    <input type="text" id="identifikator" name="identifier" value="'.$row['identifier'].'" class="form-control" placeholder="Identifikator">
                    <label for="identifikator">Identifikator</label>
                </div>
        
                <div class="form-group mb-3">
                <label for="catatan">Catatan Lain</label>
                    <textarea type="text" rows="3" id="notes" name="notes" class="form-control notes" placeholder="Catatan Lain"> '.$row['notes'].'</textarea>
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

    public function ViewHerbariumById(){
        $idHerbarium = $this->input->post('idHerbarium');
        $records = $this->herbarium_model->ViewHerbariumById($idHerbarium);
        $output = '';
        foreach($records as $row){
            $output .= '
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Nama Spesies</label>
                <div class="form-control">'.$row["species"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Nama Genus</label>
                <div class="form-control">'.$row["genus"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Nama Famili</label>
                <div class="form-control">'.$row["familia"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Nama Lokal</label>
                <div class="form-control">'.$row["local_name"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Gambar Herbarium</label>
                <div class="form-control"><img class="img-collection" id="r_pic" src="assets/images/herbarium/'.$row["herbarium_pic"].'"></div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Gambar Asli</label>
                <div class="form-control"><img class="img-collection" id="r_pic" src="assets/images/real/'.$row["real_pic"].'"></div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Morfologi</label>
                <div class="form-control">'.$row["leaf_morphology"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">No Koleksi</label>
                <div class="form-control">'.$row["collection_num"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Tanggal Koleksi</label>
                <div class="form-control">'.$row["collection_date"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Lokasi</label>
                <div class="form-control">'.$row["location"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Tipe Habitat</label>
                <div class="form-control">'.$row["habitat_type"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Kolektor</label>
                <div class="form-control">'.$row["collector"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Identifikator</label>
                <div class="form-control">'.$row["identifier"].'</div>
            </div>
            <div class="form-group mb-3">
                <label class="data-title" for="catatan">Catatan Lain</label>
                <div class="form-control">'.$row["notes"].'</div>
            </div>'
            ;
        }
        echo $output;
    }


    public function addHerbarium() {

       $result = $this->herbarium_model->addHerb();
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