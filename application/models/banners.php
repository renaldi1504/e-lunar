<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banners extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getBanner()
	{
		$this->db->select('*');
		$this->db->from('homesliders');
		return $this->db->get()->result();
	}
	function getBannerbyId($id)
	{
		$this->db->select('*');
		$this->db->from('homesliders');
		$this->db->where('id',$id);
		return $this->db->get()->row();
	}
	function changeStatus($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('homesliders', $data);
		return true;
	}
	function getActiveBanner()
	{
		$this->db->select('*');
		$this->db->from('homesliders');
		$this->db->where('status',1);
		$this->db->order_by('position');
		return $this->db->get()->result();
	}
}