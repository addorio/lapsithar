<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model{
	function check_credential($email, $password){
		$username = set_value('username');
		$password = set_value('password');

		$hasil = $this->db->where('username', $username)
						  ->where('password', $password)
						  ->limit(1)
						  ->get('tb_user');

		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}				  
	}
}