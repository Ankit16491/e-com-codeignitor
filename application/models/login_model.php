<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function admin_login($username,$pass){
		
		// echo "<pre>";
		// print_r($username);
		// print_r($pass);


		$q=$this->db->select()
					->where(['username'=>$username,'pass'=>$pass])
					->get('admin');

		return $q->row();
	}
}
