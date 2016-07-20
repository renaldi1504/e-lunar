<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class checkout extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$_session=$this->session->userdata('ctoken');
		if($_session == NULL){
			redirect('auth#login','refresh');
		}
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}
	function _template($content)
	{
 		$data['content']=$content;
 		$data['totalIDR'] = $this->cart->format_number($this->cart->total());
		$data['totalitem'] = 0;
		foreach ($this->cart->contents() as $qty) {
			$data['totalitem'] = $data['totalitem'] + $qty['qty'];
		}
		$this->load->view('_template',$data);

	}
	function index()
	{

		$id_cust = $this->session->userdata('id');
		$checkCart = $this->carts->checkCart($id_cust);
		$checkOrder = $this->order->getOrderbyCustomerId($id_cust);
		$details = $this->carts->getOrderDetails($checkCart->id);
		if(!empty($checkOrder))
		{
			$updateOrder = array(
						'customer_id'	   	  => $id_cust,
						'total_paid'   		  => $this->cart->total(),
						'total_paid_tax_excl' => $this->cart->total(),
						'total_products'   	  => $this->cart->total(),
						'secure_key'		  => $this->session->userdata('ctoken'),
						'total_products'   	  => $this->cart->total(),
						'total_products_wt'	  => $this->cart->total(),
						'updated_at'	   	  => date('Y-m-d H:i:s')
						);
			$order_id = $this->allcrud->update($checkOrder->id,'id','orders',$updateOrder);
			foreach ($details as $value) {
				$checkproduct = $this->order->checkDetailOrdersOnCarts($checkOrder->id,$value->id);
				if(!empty($checkproduct))
				{
					if(!empty($value->reduction) AND !empty($value->discount)){
						$reduction = $value->reduction;
						$discount = $value->discount;
					}else{
						$reduction = 0;
						$discount = 0;
					}
					$data_details = array(
						'order_id' 				 => $checkOrder->id, 
						'product_id' 			 => $value->id,
						'product_name' 			 => $value->product_name,
						'product_quantity' 		 => $value->quantity,
						'product_price' 		 => $value->price,
						'product_reference' 	 => $value->reference,
						'product_weight'    	 => $value->weight,
						'reduction_percent' 	 => $reduction,
						'reduction_amount' 		 => $discount,
						'total_price_tax_incl'   => ($value->price * $value->quantity),
						'total_price_tax_excl'   => ($value->price * $value->quantity),
						'original_product_price' => $value->original_price,
						'updated_at'			 => date('Y-m-d H:i:s')
					);
					$update = $this->allcrud->update($checkproduct->id,'id','order_details',$data_details);
				}
				else
				{
					$data_details = array(
						'order_id' 				 => $checkOrder->id, 
						'product_id' 			 => $value->id,
						'product_name' 			 => $value->product_name,
						'product_quantity' 		 => $value->quantity,
						'product_price' 		 => $value->price,
						'product_reference' 	 => $value->reference,
						'product_weight'    	 => $value->weight,
						'reduction_percent' 	 => $reduction,
						'reduction_amount' 		 => $discount,
						'total_price_tax_incl'   => ($value->price * $value->quantity),
						'total_price_tax_excl'   => ($value->price * $value->quantity),
						'original_product_price' => $value->original_price,
						'created_at'			 => date('Y-m-d H:i:s'),
						'updated_at'			 => date('Y-m-d H:i:s')
					);
					$this->allcrud->insert('order_details',$data_details);
				}
			}
			$detailupdate = $this->order->getDetailOrdersbyOrderID($checkOrder->id);
		}
		else
		{
			$dataOrder = array(
						'customer_id'	   	  => $id_cust,
						'total_paid'   		  => $this->cart->total(),
						'total_paid_tax_excl' => $this->cart->total(),
						'total_products'   	  => $this->cart->total(),
						'secure_key'		  => $this->session->userdata('ctoken'),
						'total_products'   	  => $this->cart->total(),
						'total_products_wt'	  => $this->cart->total(),
						'created_at'	   	  => date('Y-m-d H:i:s')
						);
			$order_id = $this->allcrud->insert('orders',$dataOrder);
			foreach ($details as $cart){
				if(!empty($cart->reduction) AND !empty($cart->discount)){
					$reduction = $cart->reduction;
					$discount = $cart->discount;
				}else{
					$reduction = 0;
					$discount = 0;
				}
				$data_details = array(
						'order_id' 				 => $order_id, 
						'product_id' 			 => $cart->id,
						'product_name' 			 => $cart->product_name,
						'product_quantity' 		 => $cart->quantity,
						'product_price' 		 => $cart->price,
						'product_reference' 	 => $cart->reference,
						'product_weight'    	 => $cart->weight,
						'reduction_percent' 	 => $reduction,
						'reduction_amount' 		 => $discount,
						'total_price_tax_incl'   => ($cart->price * $cart->quantity),
						'total_price_tax_excl'   => ($cart->price * $cart->quantity),
						'original_product_price' => $cart->original_price,
						'created_at'			 => date('Y-m-d H:i:s'),
						'updated_at'			 => date('Y-m-d H:i:s')
					);
				$this->allcrud->insert('order_details',$data_details);
			}
			
		}
		$data = [
				 'order_details' => $this->carts->getOrderDetails($checkCart->id),
				 'order'	     => $this->order->getOrderbyCustomerId($id_cust),
				 'category'      => $this->category->getCategory(),
				 'title'         => 'Checkout'
				];
		$this->_template($this->load->view('checkout',$data,true));
		
	}
	
}