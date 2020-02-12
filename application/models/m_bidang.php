<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bidang extends CI_Model{
	function getAll(){
		$hasil = $this->db->get('tb_bidang');

		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
}