<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_laporan extends CI_Model  
 {  
      // var $table = "tb_laporan";  
      // var $select_column = array("id_laporan", "id_opd", "tanggal", "judul", "nama_bidang", "isi_laporan", "tindakan", "keterangan");  
      // var $order_column = array("id_laporan", "id_opd", "tanggal", "judul", "nama_bidang", "isi_laporan", "tindakan", "keterangan", null, null);  
      // function make_query()  
      // {  
      //      $this->db->select('*');
      //      $this->db->from('tb_laporan');
      //      $this->db->join('tb_opd','tb_opd.id_opd=tb_laporan.id_opd');  
      //      if(isset($_POST["search"]["value"]))  
      //      {  
      //           $this->db->like("nama_opd", $_POST["search"]["value"]);  
      //           $this->db->or_like("tanggal", $_POST["search"]["value"]);
      //           $this->db->or_like("judul", $_POST["search"]["value"]);
      //           $this->db->or_like("nama_bidang", $_POST["search"]["value"]);
      //           $this->db->or_like("isi_laporan", $_POST["search"]["value"]);
      //           $this->db->or_like("tindakan", $_POST["search"]["value"]);
      //           $this->db->or_like("keterangan", $_POST["search"]["value"]);  
      //      }  
      //      if(isset($_POST["order"]))  
      //      {  
      //           $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
      //      }  
      //      else  
      //      {  
      //           $this->db->order_by('id_laporan', 'ASC');  
      //      }  
      // }  

      // function make_query1($id)  
      // {  
      //      $this->db->from('tb_opd')->where('tb_laporan.id_opd',$id)->join('tb_laporan', 'tb_opd.id_opd = tb_laporan.id_opd');
      //      if(isset($_POST["search"]["value"]))  
      //      {  
      //           $this->db->like("nama_opd", $_POST["search"]["value"]);  
      //           $this->db->or_like("tanggal", $_POST["search"]["value"]);
      //           $this->db->or_like("judul", $_POST["search"]["value"]);
      //           $this->db->or_like("nama_bidang", $_POST["search"]["value"]);
      //           $this->db->or_like("isi_laporan", $_POST["search"]["value"]);
      //           $this->db->or_like("tindakan", $_POST["search"]["value"]);
      //           $this->db->or_like("keterangan", $_POST["search"]["value"]);  
      //      }  
      //      if(isset($_POST["order"]))  
      //      {  
      //           $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
      //      }  
      //      else  
      //      {  
      //           $this->db->order_by('id_laporan', 'ASC');  
      //      }
           
      // }  
      // function make_datatables(){  
      //      $this->make_query();  
      //      if($_POST["length"] != -1)  
      //      {  
      //           $this->db->limit($_POST['length'], $_POST['start']);  
      //      }  
      //      $query = $this->db->get();  
      //      return $query->result();  
      // }  
      // function make_datatables1($id){   
      //       $this->make_query1($id);  
      //      if($_POST["length"] != -1)  
      //      {  
      //           $this->db->limit($_POST['length'], $_POST['start']);  
      //      }  
      //      $query = $this->db->get();  
      //      return $query->result();  
      //      return $query;  
      // }  
      // function get_filtered_data(){  
      //      $this->make_query();  
      //      $query = $this->db->get();  
      //      return $query->num_rows();  
      // }       
      // function get_all_data()  
      // {  
      //      $this->db->select("*");  
      //      $this->db->from($this->table);  
      //      return $this->db->count_all_results();  
      // }  
      // function insert_crud($data)  
      // {  
      //      $this->db->insert('tb_laporan', $data);  
      // }  
      // function fetch_single_laporan($id_laporan)  
      // {  
      //      $this->db->where("id_laporan", $id_laporan);  
      //      $query=$this->db->get('tb_laporan');  
      //      return $query->result();  
      // }  
      // function update_crud($id_laporan, $data)  
      // {  
      //      $this->db->where("id_laporan", $id_laporan);  
      //      $this->db->update("tb_laporan", $data);  
      // }  
      // function delete_single_laporan($id_laporan)  
      // {  
      //      $this->db->where("id_laporan", $id_laporan);  
      //      $this->db->delete("tb_laporan");   
      // }
var $table = 'tb_laporan';
var $column_order = array("id_laporan", "nama_opd", "tanggal", "judul", "nama_bidang", "isi_laporan", "tindakan", "keterangan", "file", null, null); 
//set column field database for datatable orderable    
var $column_search = array("id_laporan", "nama_opd", "tanggal", "judul", "nama_bidang", "isi_laporan", "tindakan", "keterangan"); //set column field database for datatable searchable   
var $order = array('id_laporan' => 'desc'); // default order

public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $tanggal_mulai = $this->session->userdata('tanggal_mulai');
        $tanggal_akhir = $this->session->userdata('tanggal_akhir');
        if($tanggal_mulai != '' && $tanggal_akhir != ''){
               $this->db->where('tb_laporan.tanggal >=', $tanggal_mulai);
               $this->db->where('tb_laporan.tanggal <=', $tanggal_akhir);
           }
        $ket = $this->session->userdata('ket');
        if($ket != ''){
               $this->db->where('tb_laporan.keterangan =', $ket);
           }
        $this->db->from('tb_laporan');
        $this->db->join('tb_opd','tb_opd.id_opd=tb_laporan.id_opd');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
     
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables1($id_opd)
    {
        $this->_get_datatables_query1($id_opd);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id_laporan)
    {
        $this->db->from($this->table);
        $this->db->where('id_laporan',$id_laporan);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id_laporan)
    {
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete($this->table);
    }

    function filterTanggal()
      {
           $sesi_tanggal = [
                'tanggal_mulai'=>$this->input->post('start_date'),
                'tanggal_akhir'=>$this->input->post('end_date')
          ]; 
           $this->session->set_userdata($sesi_tanggal);
      }

      function filterKet()
      {
          $ket = $this->input->post('ket');
  
          $this->session->set_userdata($ket);
      }

      function ambilSatuLap($id_laporan)
    {
        $this->db->from('tb_laporan l');
        $this->db->join('tb_opd','tb_opd.id_opd=l.id_opd');
        $this->db->where('l.id_laporan',$id_laporan);
        return $this->db->get($this->table)->result();
    }
 }  