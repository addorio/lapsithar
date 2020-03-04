<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
 class Opd extends CI_Controller {  
    public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('username') || $this->session->userdata('id_level') != 1){
            $this->session->set_flashdata('error','<div class="alert alert-danger">Maaf, anda harus login terlebih dahulu</div>');
            redirect('Auth');
        }
    // $this->load->library('pdf');
    //$this->load->library('form_validation');
    $this->load->model('m_opd');  
  }
      //functions  
      function index(){  
           $data['title'] = "Si Waspada | OPD";
           // $data['users'] = $this->m_opd->getAll();
           view('admin.opd.opd', $data);  
      }  
  //     public function index()
  // {
  //   $this->load->helper('url');
  //   $this->load->view('person_view');
  // }

  public function ajax_list()
  {
    $list = $this->m_opd->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $person->nama_opd;
      //add html for action
      $row[] = '<div class="btn-group"><a class="btn mb-1 btn-flat btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_laporan('."'".$person->id_opd."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a><a class="btn mb-1 btn-flat btn-outline-danger btn-sm"  href="javascript:void(0)" title="Hapus" onclick="delete_laporan('."'".$person->id_opd."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></div>';
    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_opd->count_all(),
            "recordsFiltered" => $this->m_opd->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id_user)
  {
    $data = $this->m_opd->get_by_id($id_user);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
        'id_opd' => $this->input->post('id_opd'),
        'nama_opd' =>$this->input->post('nama_opd'),
      );
    $insert = $this->m_opd->save($data);
    helper_log("add", "Menambah OPD dengan nama ".$this->input->post('nama_opd'));
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $id_opd = $this->input->post('id_opd');
    $data = array(
        'id_opd' => $this->input->post('id_opd'),
        'nama_opd' => $this->input->post('nama_opd'),
      );
    $this->m_opd->update($id_opd, $data);
    helper_log("edit", "Mengubah OPD dengan menjadi ".$this->input->post('nama_opd'));
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id_user)
  {
    helper_log("delete", "Menghapus data OPD");
    $this->m_opd->delete_by_id($id_user);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('nama_opd') == '')
    {
      $data['inputerror'][] = 'nama_opd';
      $data['error_string'][] = 'OPD name is required';
      $data['status'] = FALSE;
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  } 
 }  