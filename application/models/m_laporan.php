<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_laporan extends CI_Model  
 {  
      var $table = "tb_laporan";  
      var $select_column = array("id_laporan", "id_opd", "tanggal", "judul", "nama_bidang", "isi_laporan", "tindakan", "keterangan");  
      var $order_column = array("id_laporan", "id_opd", "tanggal", "judul", "nama_bidang", "isi_laporan", "tindakan", "keterangan", null, null);  
      function make_query()  
      {  
           // $this->db->select($this->select_column);  
           // $this->db->from($this->table);
           $this->db->select('*');
           $this->db->from('tb_laporan');
           $this->db->join('tb_opd','tb_opd.id_opd=tb_laporan.id_opd');  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nama_opd", $_POST["search"]["value"]);  
                $this->db->or_like("tanggal", $_POST["search"]["value"]);
                $this->db->or_like("judul", $_POST["search"]["value"]);
                $this->db->or_like("nama_bidang", $_POST["search"]["value"]);
                $this->db->or_like("isi_laporan", $_POST["search"]["value"]);
                $this->db->or_like("tindakan", $_POST["search"]["value"]);
                $this->db->or_like("keterangan", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_laporan', 'ASC');  
           }  
      }  

      function make_query1($id)  
      {  
           $this->db->from('tb_opd')->where('tb_laporan.id_opd',$id)->join('tb_laporan', 'tb_opd.id_opd = tb_laporan.id_opd');
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nama_opd", $_POST["search"]["value"]);  
                $this->db->or_like("tanggal", $_POST["search"]["value"]);
                $this->db->or_like("judul", $_POST["search"]["value"]);
                $this->db->or_like("nama_bidang", $_POST["search"]["value"]);
                $this->db->or_like("isi_laporan", $_POST["search"]["value"]);
                $this->db->or_like("tindakan", $_POST["search"]["value"]);
                $this->db->or_like("keterangan", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_laporan', 'ASC');  
           }
           
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function make_datatables1($id){  
           //  $this->db->select("l.*");  
           //  $this->db->from('tb_laporan l');
           //  $this->db->join('tb_opd o', 'l.nama_opd = o.nama_opd');
           //  $this->db->join('tb_user u', 'o.id_opd = u.id_opd');
           //  $this->db->where('u.id_opd', $id);

           //  $this->db->from('tb_opd')->where('id_opd',$id)->join('tb_laporan', 'tb_opd.id_opd = tb_laporan.id_opd');  
           // if(isset($_POST["search"]["value"]))  
           // {  
           //      $this->db->like("l.nama_opd", $_POST["search"]["value"]);  
           //      $this->db->or_like("l.tanggal", $_POST["search"]["value"]);
           //      $this->db->or_like("l.judul", $_POST["search"]["value"]);
           //      $this->db->or_like("l.nama_bidang", $_POST["search"]["value"]);
           //      $this->db->or_like("l.isi_laporan", $_POST["search"]["value"]);
           //      $this->db->or_like("l.tindakan", $_POST["search"]["value"]);
           //      $this->db->or_like("l.keterangan", $_POST["search"]["value"]);  
           // }  
           // if(isset($_POST["order"]))  
           // {  
           //       $query = $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           // }  
           // else  
           // {  
           //       $query =  $this->db->order_by('id_laporan', 'ASC');  
           // }  
            $this->make_query1($id);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
           return $query;  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function insert_crud($data)  
      {  
           $this->db->insert('tb_laporan', $data);  
      }  
      function fetch_single_laporan($id_laporan)  
      {  
           $this->db->where("id_laporan", $id_laporan);  
           $query=$this->db->get('tb_laporan');  
           return $query->result();  
      }  
      function update_crud($id_laporan, $data)  
      {  
           $this->db->where("id_laporan", $id_laporan);  
           $this->db->update("tb_laporan", $data);  
      }  
      function delete_single_laporan($id_laporan)  
      {  
           $this->db->where("id_laporan", $id_laporan);  
           $this->db->delete("tb_laporan");  
           //DELETE FROM users WHERE id = '$user_id'  
      }  
 }  