<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_session extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function store_session($getId){
		
		$this->session->set_userdata('session_id', $getId);
	}
	
	function getCek()
	{
		$this->db->select('*')
				 ->from('tb_login');
		$query = $this->db->get();
		return $query;
	}

	function absen_user($id)
	{
		$this->session->set_userdata('absen_id',$id);
	}

	function setCek($password)
	{
		$this->session->set_userdata('setCek',$password);
	}

	
}
?>