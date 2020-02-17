<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_opd extends CI_Model{
	
	var $table = 'tb_opd';
	var $column_order = array('id_opd','nama_opd',null,null); //set column field database for datatable orderable
	var $column_search = array('nama_opd'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_opd' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database(); 
	}

	function getAll(){
		$hasil = $this->db->get('tb_opd');

		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}



	private function _get_datatables_query() 
	{
		
		$this->db->from('tb_opd');

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

	public function get_by_id($id_opd)
	{
		$this->db->from($this->table);
		$this->db->where('id_opd',$id_opd);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id_opd, $data)
	{
		$this->db->where('id_opd', $id_opd);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_opd)
	{
		$this->db->where('id_opd', $id_opd);
		$this->db->delete($this->table);
	}
}