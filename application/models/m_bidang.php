<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bidang extends CI_Model{
	
	var $table = 'tb_bidang';
	var $column_order = array('id_bidang','nama_bidang',null,null); //set column field database for datatable orderable
	var $column_search = array('nama_bidang'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_bidang' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database(); 
	}

	function getAll(){
		$hasil = $this->db->get('tb_bidang');

		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}



	private function _get_datatables_query() 
	{
		
		$this->db->from('tb_bidang');

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

	public function get_by_id($id_bidang)
	{
		$this->db->from($this->table);
		$this->db->where('id_bidang',$id_bidang);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id_bidang, $data)
	{
		$this->db->where('id_bidang', $id_bidang);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_bidang)
	{
		$this->db->where('id_bidang', $id_bidang);
		$this->db->delete($this->table);
	}
}