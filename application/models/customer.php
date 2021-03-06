<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function authlogin($email,$password)
	{
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get()->row();
	}
	function dologin($datauserlog)
	{
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->where($datauserlog);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;	
		}
	}
	function getAddress($id)
	{
		$this->db->select('a.*,b.price');
		$this->db->from('addresses a');
		$this->db->join('carrier_prices b','a.area_id = b.destination_area_id');
		$this->db->where('a.customer_id',$id);
		return $this->db->get()->row();
	}
}