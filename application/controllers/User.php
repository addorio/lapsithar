<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
 class User extends CI_Controller {  
    public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('username') || $this->session->userdata('id_level') != 1){
            $this->session->set_flashdata('error','<div class="alert alert-danger">Maaf, anda harus login terlebih dahulu</div>');
            redirect('Auth');
        }
    // $this->load->library('pdf');
    //$this->load->library('form_validation');
    $this->load->model('m_opd');
    $this->load->model('m_bidang');
    $this->load->model('m_laporan');
    $this->load->model('m_user');
    $this->load->model('m_level');    
  }
      //functions  
      function index(){  
           $data['title'] = "Si Waspada | User";
           $data['opd'] = $this->m_opd->getAll();
           $data['op'] = $this->m_opd->getAll();
           $data['level'] = $this->m_level->getAll();
           // $data['users'] = $this->m_user->getAll();
           view('admin.usermanagement.user', $data);  
      }  
  //     public function index()
  // {
  //   $this->load->helper('url');
  //   $this->load->view('person_view');
  // }

  public function ajax_list()
  {
    $list = $this->m_user->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $person->nama_opd;
      $row[] = $person->nama;
      $row[] = $person->username;
      if($person->id_level == 1){
        $row[] = 'Admin';
      } elseif ($person->id_level == 2) {
        $row[] = 'User';
      }
      if($person->id_user != $this->session->userdata('id_user')){

      //add html for action
      $row[] = '<div class="btn-group"><a class="btn mb-1 btn-flat btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_user."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a><a class="btn mb-1 btn-flat btn-outline-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_user."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></div>';
      } else {
      $row[] = '';
      }
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_user->count_all(),
            "recordsFiltered" => $this->m_user->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id_user)
  {
    $data = $this->m_user->get_by_id($id_user);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
        'id_opd' => $this->input->post('id_opd'),
        'nama' => htmlspecialchars($this->input->post('nama')),
        'username' => htmlspecialchars($this->input->post('username')),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'id_level' => $this->input->post('id_level'),
      );
    $insert = $this->m_user->save($data);
    helper_log("add", "Menambah user baru");
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $id_user = $this->input->post('id_user');
    $data = array(
        'id_user' => $this->input->post('id_user'),
        'id_opd' => $this->input->post('id_opd'),
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'id_level' => $this->input->post('id_level'),
      );
    helper_log("edit", "Mengubah detail user");
    $this->m_user->update($id_user, $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id_user)
  {
    helper_log("delete", "Menghapus user");
    $this->m_user->delete_by_id($id_user);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('id_opd') == '')
    {
      $data['inputerror'][] = 'id_opd';
      $data['error_string'][] = 'OPD name is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('nama') == '')
    {
      $data['inputerror'][] = 'nama';
      $data['error_string'][] = 'Nama is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('username') == '')
    {
      $data['inputerror'][] = 'username';
      $data['error_string'][] = 'Username is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('password') == '')
    {
      $data['inputerror'][] = 'password';
      $data['error_string'][] = 'Password is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('id_level') == '')
    {
      $data['inputerror'][] = 'id_level';
      $data['error_string'][] = 'Level is required';
      $data['status'] = FALSE;
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  } 

  private function _validate2()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('id_opd') == '')
    {
      $data['inputerror'][] = 'id_opd';
      $data['error_string'][] = 'OPD name is required'; 
      $data['status'] = FALSE;
    }

    if($this->input->post('nama') == '')
    {
      $data['inputerror'][] = 'nama';
      $data['error_string'][] = 'Nama is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('username') == '')
    {
      $data['inputerror'][] = 'username';
      $data['error_string'][] = 'Username is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('password') == '')
    {
      $data['inputerror'][] = 'password';
      $data['error_string'][] = 'Password is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('id_level') == '')
    {
      $data['inputerror'][] = 'id_level';
      $data['error_string'][] = 'Level is required';
      $data['status'] = FALSE;
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  } 
 }  
