<?php

class Auth extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index() {

        // form validation

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong'
        ]);
      
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);
 
        if($this->session->userdata('id_user')){
            redirect('Herbarium');
        }
        else if($this->form_validation->run() == false) { 
            $this->load->view('templates/header');
            $this->load->view('sign_in');
            $this->load->view('templates/footer');
        }  
        else {
            $this->onLogin();   
        }      

    }

    public function onLogin() {
        $username = $this->input->post('username');
        $password = MD5($this->input->post('password'));

        $user = $this->db->get_where('user', ['username' => $username, 'password' => $password])->result_array();
        // var_dump($user[0]['is_active']);

        
        // if user exist
        if($user) {

            if($user[0]['is_active']) {
        
                foreach ($user as $apps) {

                    $session_data = array(
                        'id_role'   => $apps['id_role'],
                        'id_user' => $apps['id_user'],
                        'username' => $apps['username'],
                        'is_active' => $apps['is_active'],
                    );
                    $this->session->set_userdata($session_data);
                    // print_r($session_data);      
                    
                    redirect('Herbarium');
                }   
            }

            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Admin Tidak Aktif
                </div>');
                  redirect('Auth');
            }

        }         
        else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username / Password Salah !
            </div>');
              redirect('Auth');
        }
    }

}
?>