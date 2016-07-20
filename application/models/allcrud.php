<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class allcrud extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function delete($id,$where,$tablename)
	{
		$this->db->where($where,$id);
		$this->db->delete($tablename);
		return true;
	}
	function delete2($id,$where,$id2,$where2,$tablename)
	{
		$this->db->where($where,$id);
		$this->db->where($where2,$id2);
		$this->db->delete($tablename);
		return true;
	}
	function update($id,$where,$tablename,$data)
	{
		$this->db->where($where,$id);
		$this->db->update($tablename,$data);
		return true;
	}
	function insert($tablename,$data)
	{
		$this->db->insert($tablename, $data); 
		$id = $this->db->insert_id();
		return $id;
	}
	function update2($id,$where,$id2,$where2,$tablename,$data)
	{
		$this->db->where($where,$id);
		$this->db->where($where2,$id2);
		$this->db->update($tablename,$data);
		return true;
	}
	
}