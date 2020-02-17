<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Userpage extends CI_Controller {     
  public function __construct(){         
    parent::__construct();         
     $this->load->model('m_opd');
    $this->load->model('m_bidang');
    $this->load->model('m_laporan', 'laporan'); 
    $this->load->model('m_user'); 
    }
 
    public function index()
    {
        $data['title'] = "LAPSITHAR | Dashboard";
        $data['opd'] = $this->m_opd->getAll();
        $data['bidang'] = $this->m_bidang->getAll();  
        view('user.laporan', $data);
    }
 
    public function ajax_list()
    {    
        $id_opd = $this->session->userdata('id_opd');
        $list = $this->laporan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $laporan) {
          if ($laporan->id_opd == $id_opd) {
          
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $laporan->nama_opd;
            $row[] = $laporan->tanggal;
            $row[] = $laporan->judul;
            $row[] = $laporan->nama_bidang;
            $row[] = $laporan->isi_laporan;
            $row[] = $laporan->tindakan;
            if($laporan->keterangan == 'Selesai'){
              $row[] = '<span class="text-success">'.$laporan->keterangan.'</span>';
            } else {
              $row[] = '<span class="text-danger">'.$laporan->keterangan.'</span>';
            }
            if($laporan->file)
                $row[] = '<a class="open btn btn-sm btn-success" href="javascript:void(0)" data-toggle="modal" data-id="'.$laporan->file.'"><i class="glyphicon glyphicon-pencil"></i>Lihat</a>';
            else
                $row[] = '(Tidak ada lampiran)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_laporan('."'".$laporan->id_laporan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_laporan('."'".$laporan->id_laporan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
            }
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->laporan->count_all(),
                        "recordsFiltered" => $this->laporan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id_laporan)
    {
        $data = $this->laporan->get_by_id($id_laporan);
        $data->tanggal = ($data->tanggal == '0000-00-00 00-00-00') ? '' : $data->tanggal;
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'id_laporan'          =>     $this->input->post('id_laporan'),
                     'id_opd'          =>     $this->input->post('id_opd'),  
                     'tanggal'               =>     $this->input->post("tanggal"),
                     'judul'          =>     $this->input->post('judul'),  
                     'nama_bidang'               =>     $this->input->post("nama_bidang"),
                     'isi_laporan'          =>     $this->input->post('isi_laporan'),  
                     'tindakan'               =>     $this->input->post("tindakan"),
                     'keterangan'               =>     $this->input->post("keterangan"),
            );
 
        if(!empty($_FILES['file']['name']))
        {
            $upload = $this->_do_upload();
            $data['file'] = $upload;
        }
 
        $insert = $this->laporan->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'id_laporan'          =>     $this->input->post('id_laporan'),
                     'id_opd'          =>     $this->input->post('id_opd'),  
                     'tanggal'               =>     $this->input->post("tanggal"),
                     'judul'          =>     $this->input->post('judul'),  
                     'nama_bidang'               =>     $this->input->post("nama_bidang"),
                     'isi_laporan'          =>     $this->input->post('isi_laporan'),  
                     'tindakan'               =>     $this->input->post("tindakan"),
                     'keterangan'               =>     $this->input->post("keterangan"),
            );
 
        if($this->input->post('remove_file')) // if remove file checked
        {
            if(file_exists('upload/'.$this->input->post('remove_file')) && $this->input->post('remove_file'))
                unlink('upload/'.$this->input->post('remove_file'));
            $data['file'] = '';
        }
 
        if(!empty($_FILES['file']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $laporan = $this->laporan->get_by_id($this->input->post('id_laporan'));
            if(file_exists('upload/'.$laporan->file) && $laporan->file)
                unlink('upload/'.$laporan->file);
 
            $data['file'] = $upload;
        }
 
        $this->laporan->update(array('id_laporan' => $this->input->post('id_laporan')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id_laporan)
    {
        //delete file
        $laporan = $this->laporan->get_by_id($id_laporan);
        if(file_exists('upload/'.$laporan->file) && $laporan->file)
            unlink('upload/'.$laporan->file);
         
        $this->laporan->delete_by_id($id_laporan);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _do_upload()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('file')) //upload and validate
        {
            $data['inputerror'][] = 'file';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
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
            $data['error_string'][] = 'OPD is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tanggal') == '')
        {
            $data['inputerror'][] = 'tanggal';
            $data['error_string'][] = 'Tanggal is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('judul') == '')
        {
            $data['inputerror'][] = 'judul';
            $data['error_string'][] = 'Judul is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('nama_bidang') == '')
        {
            $data['inputerror'][] = 'nama_bidang';
            $data['error_string'][] = 'Please select Bidang';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('isi_laporan') == '')
        {
            $data['inputerror'][] = 'isi_laporan';
            $data['error_string'][] = 'Isi is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tindakan') == '')
        {
            $data['inputerror'][] = 'tindakan';
            $data['error_string'][] = 'Tindakan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('keterangan') == '')
        {
            $data['inputerror'][] = 'keterangan';
            $data['error_string'][] = 'Please select Keterangan';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    function filter_tanggal(){
          $data = $this->laporan->filterTanggal();
          json_encode($data);
     }
 
}