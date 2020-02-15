<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
 class Userpage extends CI_Controller {  
    public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('username')){
            $this->session->set_flashdata('error','<div class="alert alert-danger">Maaf, anda harus login terlebih dahulu</div>');
            redirect('Auth');
        }
    // $this->load->library('pdf');
    //$this->load->library('form_validation');
    $this->load->model('m_opd');
    $this->load->model('m_bidang');
    $this->load->model('m_laporan');
    $this->load->model('m_user');   
  }
      //functions  
      function index(){  
            $this->session->userdata('id_opd');
            $data['title'] = "LAPSITHAR | Laporan";
            $data['opd'] = $this->m_opd->getAll();
            $data['bidang'] = $this->m_bidang->getAll();
            $data['bid'] = $this->m_bidang->getAll();

           view('user.laporan', $data);  
      }  
      function fetch_laporan(){ 
          $id = $this->session->userdata('id_opd');
           $this->load->model("m_laporan");  
           $fetch_data = $this->m_laporan->make_datatables1($id);  
           $data = array(); 
           $i=1;
           foreach($fetch_data as $row)  
           {  
             if($row->id_opd == $id){
                $sub_array = array();  
                  
                $sub_array[] = $i++;
                $sub_array[] = $row->nama_opd;  
                $sub_array[] = $row->tanggal;
                $sub_array[] = $row->judul;
                $sub_array[] = $row->nama_bidang;
                $sub_array[] = $row->isi_laporan;
                $sub_array[] = $row->tindakan;
                if($row->keterangan == "Selesai"){
                  $sub_array[] = '<span class="text-success">'.$row->keterangan.'</span>';
                } elseif ($row->keterangan == "Belum Selesai"){
                  $sub_array[] = '<span class="text-danger">'.$row->keterangan.'</span>';
                }
                // $sub_array[] = $row->file;  
                $sub_array[] = '<button type="button" name="update" id="'.$row->id_laporan.'" class="btn btn-primary update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id_laporan.'" class="btn btn-danger btn delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array; 
 }
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->m_laporan->get_all_data(),  
                "recordsFiltered"     =>     $this->m_laporan->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
      function user_action(){  
           if($_POST["action"] == "Add")  
           {  
                $insert_data = array(  
                     'id_opd'          =>     $this->input->post('id_opd'),  
                     'tanggal'               =>     $this->input->post("tanggal"),
                     'judul'          =>     $this->input->post('judul'),  
                     'nama_bidang'               =>     $this->input->post("nama_bidang"),
                     'isi_laporan'          =>     $this->input->post('isi_laporan'),  
                     'tindakan'               =>     $this->input->post("tindakan"),
                     'keterangan'               =>     $this->input->post("keterangan"),  
                     'file'                    =>     $this->upload_file()  
                );  
                $this->load->model('m_laporan');  
                $this->m_laporan->insert_crud($insert_data);    
           }  
           if($_POST["action"] == "Edit")  
           {  
                $file = $_FILES["file"]["name"];  
                if($_FILES["file"]["name"] != '')  
                {                    
                    $file = $this->upload_file();  
                }  
                else  
                {  
                     $file = $this->input->post("hidden_user_image");  
                }  
                $updated_data = array(  
                     'id_laporan'          =>     $this->input->post('id_laporan'),
                     'id_opd'          =>     $this->input->post('id_opd'),  
                     'tanggal'               =>     $this->input->post("tanggal"),
                     'judul'          =>     $this->input->post('judul'),  
                     'nama_bidang'               =>     $this->input->post("nama_bidang"),
                     'isi_laporan'          =>     $this->input->post('isi_laporan'),  
                     'tindakan'               =>     $this->input->post("tindakan"),
                     'keterangan'               =>     $this->input->post("keterangan"),  
                     'file'                    =>     $file  
                );  
                $this->load->model('m_laporan');  
                $this->m_laporan->update_crud($this->input->post("id_laporan"), $updated_data);  
                echo 'Data Updated';  
           }  
      }  
      function upload_file()  
      {  
           if(isset($_FILES["file"]))  
           {  
                $extension = explode('.', $_FILES['file']['name']);
                $filesize = '';  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/' . $new_name;  
                move_uploaded_file($_FILES['file']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  
      function fetch_single_laporan()  
      {  
           $output = array();  
           $this->load->model("m_laporan");  
            $data = $this->m_laporan->fetch_single_laporan($_POST['id_laporan']);
           foreach($data as $row)  

           {  
                $output['id_laporan'] = $row->id_laporan;
                $output['id_opd'] = $row->id_opd;  
                $output['tanggal'] = $row->tanggal;
                $output['judul'] = $row->judul;  
                $output['nama_bidang'] = $row->nama_bidang; 
                $output['isi_laporan'] = $row->isi_laporan;  
                $output['tindakan'] = $row->tindakan; 
                $output['keterangan'] = $row->keterangan;
                $output['file'] = $row->file;     
                if($row->file != '')  
                {  
                     $output['file'] = $row->file;  
                }  
                else  
                {  
                     $output['file'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  
      function delete_single_laporan()  
      {  
           $this->load->model("m_laporan");  
           $this->m_laporan->delete_single_laporan($_POST['id_laporan']);  
           echo 'Data Deleted';  
      }  
 }  
