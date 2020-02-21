<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
 class Bidang extends CI_Controller {  
    public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('username') || $this->session->userdata('id_level') != 1){
            $this->session->set_flashdata('error','<div class="alert alert-danger">Maaf, anda harus login terlebih dahulu</div>');
            redirect('Auth');
        }
    // $this->load->library('pdf');
    //$this->load->library('form_validation');
    $this->load->model('m_bidang'); 
  }
      //functions  
      function index(){  
           $data['title'] = "LAPSITHAR | OPD";
           view('admin.bidang.bidang', $data);  
      }  
  //     public function index()
  // {
  //   $this->load->helper('url');
  //   $this->load->view('person_view');
  // }

  public function ajax_list()
  {
    $list = $this->m_bidang->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $person->nama_bidang;
      //add html for action
      $row[] = '<a class="btn mb-1 btn-flat btn-outline-primary" href="javascript:void(0)" title="Edit" onclick="edit_laporan('."'".$person->id_bidang."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>';
      $row[] = '<a class="btn mb-1 btn-flat btn-outline-danger" href="javascript:void(0)" title="Hapus" onclick="delete_laporan('."'".$person->id_bidang."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_bidang->count_all(),
            "recordsFiltered" => $this->m_bidang->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id_user)
  {
    $data = $this->m_bidang->get_by_id($id_user);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
        'id_bidang' => $this->input->post('id_bidang'),
        'nama_bidang' =>$this->input->post('nama_bidang'),
      );
    $insert = $this->m_bidang->save($data);
    echo json_encode(array("status" => TRUE));
    helper_log("add", "menambahkan ".$this->input->post('nama_bidang')." pada tabel bidang");
  }

  public function ajax_update()
  {
    $this->_validate();
    $id_bidang = $this->input->post('id_bidang');
    $data = array(
        'id_bidang' => $this->input->post('id_bidang'),
        'nama_bidang' => $this->input->post('nama_bidang'),
      );
    $this->m_bidang->update($id_bidang, $data);
    echo json_encode(array("status" => TRUE));
    helper_log("edit", "mengubah ".$this->input->post('nama_bidang')." pada tabel bidang");
  }

  public function ajax_delete($id_user)
  {
    helper_log("hapus", "menghapus data sebuah bidang dari tabel bidang");
    $this->m_bidang->delete_by_id($id_user);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('nama_bidang') == '')
    {
      $data['inputerror'][] = 'nama_bidang';
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