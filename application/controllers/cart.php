<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$_session=$this->session->userdata('ctoken');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('user_agent');
		if($_session == NULL){
			$data['totalitem'] = 0;
			$data['totalIDR'] = $this->cart->format_number($this->cart->total());
			foreach ($this->cart->contents() as $qty) {
				$data['totalitem'] = $data['totalitem'] + $qty['qty'];
			}
		}

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
		if(!empty($id_cust)){
			$this->cart->destroy();
			$checkCart = $this->carts->checkCart($id_cust);
			if($checkCart){
				$details = $this->carts->getDetailCarts($checkCart->id);

				foreach ($details as $value) {
					$cart_insert = array(
					    'id'      => $value->product_id,
					    'qty'     => $value->quantity,
					    'price'   => $value->price,
					    'name'    => $value->product_name,
					    'size'    => $value->size.'-'.$value->size_name,
					    'img'	  => $value->image
					    );
					$this->cart->insert($cart_insert);
				}
			}
		}
		$_session=$this->session->userdata('ctoken');
		$data = ['category' => $this->category->getCategory(),
				 'title'    => 'bag',
				 'cart'     =>$this->cart->contents(),
				 'total'    => $this->cart->format_number($this->cart->total())
				];
		
		$this->_template($this->load->view('shopping-cart',$data,true));
		
	}
	function add()
	{
		$id = $this->session->userdata('id');
		$cart = json_decode($this->input->get('cart'), true);
		$data = array(
               'id'      => $cart['id'],
               'qty'     => $cart['qty'],
               'price'   => $cart['price'],
               'name'    => $cart['name'],
               'size'    => $cart['size'],
               'size_name' => $cart['size_name'],
               'discount' => $cart['discount'],
               'img'	  => $cart['img'],
            );
		if(!empty($id)){
			$checkCart = $this->carts->checkCart($id);
			if($checkCart != false)
			{
				$id_size = explode('-', $cart['size']);
				$data_cart = array(
		               'cart_id'    => $checkCart->id,
		               'product_id' => $cart['id'],
		               'price'   => $cart['price'],
		               'product_name' => $cart['name'],
		               'quantity' => $cart['qty'],
		               'size'    => $id_size[0],
		               'image'	  => $cart['img'],
		            );
				$this->cart->insert($data);
				$temp = $this->carts->checkDetailProduct($cart['id'],$id_size[0]);
				if(!empty($temp))
				{
					$update_cart = array(
			               'quantity'      => $temp->quantity+$cart['qty'],
			               'size'     => $id_size[0]
			            );
					$update = $this->allcrud->update($temp->id,'id','cart_details',$update_cart);
				}
				else{
		            $insert = $this->allcrud->insert('cart_details',$data_cart);    
	        	}
			}
			else
			{
				$cart_state = array(
			               'customer_id'      => $id,
			               'created_at'     => date('Y-m-d H:i:s')
			            );
				$insert = $this->allcrud->insert('cart',$cart_state);
				$id_size = explode('-', $cart['size']);
				$data_cart = array(
	               'cart_id'    => $insert,
	               'product_id' => $cart['id'],
	               'price'   => $cart['price'],
	               'product_name' => $cart['name'],
	               'quantity' => $cart['qty'],
	               'size'    => $id_size[0],
	               'image'	  => $cart['img'],
	            );
	            $insert = $this->allcrud->insert('cart_details',$data_cart);
	            $this->cart->insert($data);
			}
		}else{
			$this->cart->insert($data);
		}
		redirect($this->agent->referrer());
		
	}
	function update()
	{
		$id_cust = $this->session->userdata('id');
		$id = $this->input->post('id');	
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		$data = array(
				'rowid' => $rowid,
				'qty'	=> $qty
			);
		$update_cart = array(
				'quantity'	=> $qty
			);
		$this->cart->update($data);
		$checkCart = $this->carts->checkCart($id_cust);
		$update = $this->allcrud->update2($id,'product_id',$checkCart->id,'cart_id','cart_details',$update_cart);
		redirect($this->agent->referrer());
	}
	function delete($id,$rowid)
	{
		$this->cart->remove($rowid);
		$id_cust = $this->session->userdata('id');
		if(!empty($id_cust)){
			$checkCart = $this->carts->checkCart($id_cust);
			$this->allcrud->delete2($checkCart->id,'cart_id',$id,'product_id','cart_details');
			$checkOrder = $this->order->getOrderbyCustomerId($id_cust);
			if(!empty($checkOrder))
			{
				$this->allcrud->delete2($checkOrder->id,'order_id',$id,'product_id','order_details');
			}
		}
		redirect($this->agent->referrer());
	}

}