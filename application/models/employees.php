<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employees extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function dologin($datauserlog)
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where($datauserlog);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;	
		}
	}
	function getemployees($datauserlog)
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where($datauserlog);
		return $this->db->get()->row();
	}
	function Auth($data)
	{
		$this->db->insert('login_attemp', $data); 
		return 200;
	}
	function logout($id,$email)
	{
		if($id != "" && $email !=""){
			$this->db->where('id',$id);
			$this->db->where('email',$email);
			$this->db->delete('login_attemp');
		}
		return true;
	}
	function check($id,$email)
	{
		if($id != "" && $email !=""){
		$this->db->select('*');
		$this->db->from('login_attemp');
		$this->db->where('id',$id);
		$this->db->where('email',$email);
		$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->row();
			}
			else{
				return false;	
			}
		}
	
	}
}