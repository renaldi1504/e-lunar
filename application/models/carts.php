<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class carts extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function checkCart($id)
	{
		$this->db->select('*');
		$this->db->from('cart');
		$this->db->where('customer_id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;	
		}
	}
	function getDetailCarts($id)
	{
		$this->db->select('cart_details.*,product_stocks.size as size_name');
		$this->db->from('cart_details');
		$this->db->join('product_stocks','product_stocks.id = cart_details.size');
		$this->db->where('cart_id',$id);
		return $this->db->get()->result();
	}
	function checkDetailProduct($id,$size)
	{
		$this->db->select('*');
		$this->db->from('cart_details');
		$this->db->where('product_id',$id);
		$this->db->where('size',$size);
		return $this->db->get()->row();
	}
	function getCartCustomer($id)
	{
		$this->db->select('cart_details.id as cart_id,cart_details.product_id as id,cart_details.quantity as qty,cart_details.product_name as name,(cart_details.price * cart_details.quantity) as price,product_stocks.size,cart_details.image as img');
		$this->db->from('cart_details');
		$this->db->join('cart','cart.id = cart_details.cart_id');
		$this->db->join('product_stocks','product_stocks.id = cart_details.size');
		$this->db->where('cart.customer_id',$id);
		return $this->db->get()->result();
	}
	function getOrderDetails($id)
	{
		$this->db->select(" products.id,discount.reduction_type,products.reference,cart_details.image,
							discount.reduction,discount.price as discount,
							cart_details.product_name,products.price as original_price,products.height,
							products.depth,products.weight,products.width,cart_details.price,
							cart_details.quantity,cart_details.size,product_stocks.size as size_name,
							CASE
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('cart_details');
		$this->db->join('products', 'cart_details.product_id = products.id','left');
		$this->db->join('(SELECT * FROM specific_prices WHERE specific_prices.from <= NOW() and  specific_prices.to >= NOW()) discount', 'discount.product_id = products.id','left');
		$this->db->join('product_stocks','product_stocks.id = cart_details.size');
		$this->db->where('cart_details.cart_id',$id);
		return $this->db->get()->result();
	}
}