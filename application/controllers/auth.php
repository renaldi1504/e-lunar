<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('user_agent');
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
		$_session=$this->session->userdata('ctoken');
		if($_session != NULL){
			redirect('/','refresh');
		}
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$data = ['category' => $this->category->getCategory(),
				     'title' => 'Login'
				];
			$this->_template($this->load->view('login',$data,true));
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$datauserlog = array('email' => $email, 'password' => md5($password) ,'active' => 1);
			$log = $this->customer->dologin($datauserlog);
			if($log==false){
				$msg = "Username or Password is wrong | [Not Registered]";	
				$data = [
						 'category' => $this->category->getCategory(),
				 		 'title' => 'Login',
						 'error' => $msg
						];
				$this->_template($this->load->view('login',$data,true));
			}
			else
			{
				$checkCart = $this->carts->checkCart($log->id);
				$checkSessionCart = $this->cart->contents();
				if(!empty($checkSessionCart))
				{
					foreach ($checkSessionCart as $value) {
						$id_size = explode('-', $value['size']);
						$checkproduct = $this->carts->checkDetailProduct($value['id'],$id_size[0]);
						if(!empty($checkproduct))
						{
							$update_cart = array(
				               'quantity'      => $checkproduct->quantity+$value['qty'],
				               'size'     => $id_size[0],
					            );
							$update = $this->allcrud->update($checkproduct->id,'id','cart_details',$update_cart);
						}else
						{
							$data_cart = array(
				               'cart_id'    => $checkCart->id,
				               'product_id' => $value['id'],
				               'price'   => $value['price'],
				               'product_name' => $value['name'],
				               'quantity' => $value['qty'],
				               'size'    => $id_size[0],
				               'image'	  => $value['img'],
				            );
				            $insert = $this->allcrud->insert('cart_details',$data_cart);
						}
					}
				}
				if($checkCart != false)
				{
					$this->cart->destroy();
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

				$security = 'LunarO123';
				$dt = date('Y-m-d H:i:s');
				$token = md5($security.$dt);
				$_session = array(
				    'id' 		 => $log->id,
				    'ip_address' => $_SERVER['REMOTE_ADDR'],
				    'last_activity' => $dt,
				    'ctoken'		=> $token,
				    'user_agent' => $log->email
				);
				$this->session->set_userdata($_session);
				redirect('cart');
			}
		}
		
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}
	
}