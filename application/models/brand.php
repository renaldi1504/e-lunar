<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class brand extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getBrand()
	{
		$this->db->select('*');
		$this->db->from('brands');
		$this->db->where('active',1);	
		return $this->db->get()->result();
	}
	function getActiveCategory()
	{
		$this->db->select('t1.id,t1.parent_id,t1.name,t1_rewrite');
		$this->db->from('categories t1');
		$this->db->join('categories t2','t2.id = t1.id');
		$this->db->where('t2.active',1);
		$this->db->where('t1.active',1);
		$this->db->where('t1.parent_id != "1"');
		$this->db->where('t1.parent_id != "0"');
		$this->db->order_by('t1.parent_id');
		return $this->db->get()->result();
	}
	
}