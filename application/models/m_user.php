<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	var $table = 'tb_user';
	var $column_order = array('id_user','nama_opd','nama','username','id_level',null,null); //set column field database for datatable orderable
	var $column_search = array('nama_opd','nama','username'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_user' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query() 
	{
		
		$this->db->from('tb_opd')->join('tb_user', 'tb_opd.id_opd = tb_user.id_opd');

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

	private function _get_datatables_query1($id_user)
	{
		
		$this->db->from('tb_opd')->where('id_user',$id_user)->join('tb_user', 'tb_opd.id_opd = tb_user.id_opd');

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

	function get_datatables1($id)
	{
		$this->_get_datatables_query1($id);
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

	public function get_by_id($id_user)
	{
		$this->db->from($this->table);
		$this->db->where('id_user',$id_user);
		$query = $this->db->get();

		return $query->row();
	}

	public function check_user($username)
	{
		$this->db->select('*'); 
	    $this->db->from('tb_user');
	    $this->db->where('username', $username);
	    $query = $this->db->get();
	    if ($query->num_rows() == 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	public function getbyid($id_user){
		$this->db->from('tb_opd')->where('id_user',$id_user)->join('tb_user', 'tb_opd.id_opd = tb_user.id_opd');
		$query = $this->db->get();
		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete($this->table);
	}


}
