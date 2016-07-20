<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pricerules extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getPrice()
	{
		$this->db->select('*');
		$this->db->from('specific_price_rules');
		return $this->db->get()->result();
	}
	
}