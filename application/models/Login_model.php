<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function login($username,$password){
		$query="select * from admin where username='".$username."' and password='".$password."'";
		$sql=$this->db->query($query);
		return $sql->num_rows();
	}

}
