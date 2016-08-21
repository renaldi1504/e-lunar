<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
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
	function addAddress()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('postcode', 'Postal Code', 'numeric');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('Address1', 'Address 1', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'numeric|required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['error'] = 204;
		}
		else
		{
			$id  	   = $this->input->post('id');
			$firstname = $this->input->post('firstname');
			$lastname  = $this->input->post('lastname');
			$postcode  = $this->input->post('postcode');
			$city 	   = $this->input->post('city');
			$phone     = $this->input->post('phone');
			$address1  = $this->input->post('address1');
			$address2  = $this->input->post('address2');
			$data = array('customer_id' => $id,
						  'firstname' 	=> $firstname,
						  'address1' 	=> $address1,
						  'address2' 	=> $address2,
						  'postcode' 	=> $postcode,
						  'phone' 		=> $phone,
						  'area_id' 	=> $city,
						  'created_at'	=> date('Y-m-d H:i:s'),
						  'updated_at'	=> date('Y-m-d H:i:s')
			 );

			$insert = $this->products->insertproduct('addresses',$data);
			if($insert)
			{
				$data['error'] = 200;
			}
		}
		echo json_encode($data);
	}
	
}