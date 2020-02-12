<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Auth extends CI_Controller {  
    public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('username')){
            redirect('Dashboard');
        }
    $this->load->model('m_user');   
  }
      //functions  
      function index(){  

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            view('auth', $data); 
        } else {
            // validasinya success
            $this->_login();
        }  
           view('auth', $data);  
      }   
 }  
