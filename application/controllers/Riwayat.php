<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
 class Riwayat extends CI_Controller {  
    public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('username') || $this->session->userdata('id_level') != 1){
            $this->session->set_flashdata('error','<div class="alert alert-danger">Maaf, anda harus login terlebih dahulu</div>');
            redirect('Auth');
        }
    // $this->load->library('pdf');
    //$this->load->library('form_validation');
    $this->load->model('m_log');  
  }
      //functions  
      function index(){  
           $data['title'] = "LAPSITHAR | Log Activity";
           view('admin.log.log', $data);
      }


      public function ajax_list()
      {
        $list = $this->m_log->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
          $row = array();

          $row[] = '<span style="font-style: italic;">'.$person->time.'</span>';
          $row[] = '<span style="font-style: italic;">'.$person->username.'</span>';
          $row[] = '<span style="font-style: italic;">'.$person->deskripsi.'</span>';

          $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_log->count_all(),
                "recordsFiltered" => $this->m_log->count_filtered(),
                "data" => $data,
            );
        //output to json format
        echo json_encode($output);
      }  
 }  