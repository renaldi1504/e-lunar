<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getCategory()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->order_by('position');
		return $this->db->get()->result();
	}
	function getActiveCategory()
	{
		$this->db->select('t1.id,t1.parent_id,t1.name,t1.link_rewrite,t1.created_at,t1.description');
		$this->db->from('categories t1');
		$this->db->join('categories t2','t2.id = t1.id');
		$this->db->where('t2.active',1);
		$this->db->where('t1.active',1);
		$this->db->where('t1.parent_id != "1"');
		$this->db->where('t1.parent_id != "0"');
		$this->db->order_by('t1.parent_id');
		return $this->db->get()->result();
	}
	function getCategoryParentID($id)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('active',1);
		$this->db->where('parent_id',$id);
		return $this->db->get()->result();
	}
	function getCategoryByLink($link)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('link_rewrite',$link);
		return $this->db->get()->result();
	}
	function getIdCategory($link_rewrite)
	{
		$this->db->select('id');
		$this->db->from('category');
		$this->db->where('link_rewrite',$link_rewrite);
		$query = $this->db->get();
		$ret = $query->row();
		return $ret->id;
	}
	function getCategoryJSON($name)
	{
		$this->db->select('id,name');
		$this->db->from('category');
		$this->db->like('name',$name);
		return $this->db->get();
	}
	
}