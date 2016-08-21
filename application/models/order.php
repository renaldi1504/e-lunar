<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getTotalItem()
	{
		$this->db->select('sum(product_quantity) as totalitem');
		$this->db->from('order_details');
		
		return $this->db->get()->result();
	}
	function getBannerbyId($id)
	{
		$this->db->select('*');
		$this->db->from('homesliders');
		$this->db->where('id',$id);
		return $this->db->get()->row();
	}
	function getOrderbyCustomerId($id)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('customer_id',$id);
		$this->db->where('reference',NULL);
		return $this->db->get()->row();
	}
	function getDetailOrdersbyOrderID($id)
	{
		$this->db->select('*');
		$this->db->from('order_details');
		$this->db->where('order_details.order_id',$id);
		return $this->db->get()->result();
	}
	function checkDetailOrdersOnCarts($id,$product_id)
	{
		$this->db->select('*');
		$this->db->from('order_details');
		$this->db->where('order_id',$id);
		$this->db->where('product_id',$product_id);
		return $this->db->get()->row();
	}
	function getOrderbyId($id)
	{
		$this->db->select('total_products,total_paid,total_shipping');
		$this->db->from('orders');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	function getWeightDetailsbyOrderId($id)
	{
		$this->db->select('sum(product_weight) as weight');
		$this->db->from('order_details');
		$this->db->where('order_id',$id);
		return $this->db->get()->row();
	}
	function getAreaPrice($id)
	{
		$this->db->select('*');
		$this->db->from('carrier_prices');
		$this->db->where('destination_area_id',$id);
		return $this->db->get()->row();
	}
}