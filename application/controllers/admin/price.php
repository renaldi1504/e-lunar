<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class price extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$_session=$this->session->userdata('token');
		if($_session == NULL){
			redirect('ngadmin/login','refresh');
		}
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	function index()
	{
		$data = ['status' => 'success',
				 'title' => 'Price Rules',
				 'list' => $this->pricerules->getPrice()
				];
		$this->load->view('admin/pricerules/price_list',$data);
	}

	function insert()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('reduction', 'Reduction', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data = ['status' => 'success',
				'title' => 'Price Rules',
				];
			$this->load->view('admin/pricerules/form_price',$data);
		}
		else
		{
			$price ='';
			$reduction='';
			$name =$this->input->post('name');
			$type = $this->input->post('type');
			$from = $this->input->post('from');
			$to = $this->input->post('to');
			if($type =='percentage'){
				$reduction = $this->input->post('reduction');
			}
			else
			{
				$price = $this->input->post('reduction');
			}
			// $category = $this->input->post('category_id');
			$product = $this->input->post('product_id');

			$rule = array( 
						  'name' => $name, 
						  'from_quantity' => 1,
						  'price' => $price,
						  'reduction' => $reduction,
						  'reduction_type' => $type,
						  'from' => $from.' 00:00.01',
						  'to' => $to.' 23:59:59',
						  'created_at'   => date('Y-m-d H:i:s')
					);
			$ruleid = $this->allcrud->insert('specific_price_rules',$rule);
			// if(!empty($category)){
			// 	$cat = implode(',', $category);
			// 	$condition = array(
			// 					'spesific_price_rule_condition_group_id' => $ruleid,
			// 					'type' => 'category',
			// 					'value'=> $cat,
			// 					'created_at' => date('Y-m-d H:i:s')
			// 				  );
			// 	$category = $this->allcrud->insert('specific_price_rule_conditions',$condition);
			// }
			if(!empty($product)){
				$pr = implode(',', $product);
				$cons = array(
								'spesific_price_rule_condition_group_id' => $ruleid,
								'type' => 'product',
								'value'=> $pr,
								'created_at' => date('Y-m-d H:i:s')
							  );
				$this->allcrud->insert('specific_price_rule_conditions',$cons);
				foreach ($product as $value) {
					$cons = array(
								'specific_price_rule_id' => $ruleid,
								'product_id' => $value,
								'from_quantity' => 1,
						  		'price' => $price,
						  		'reduction' => $reduction,
						  		'reduction_type' => $type,
								'from' => $from.' 00:00.01',
								'to' => $to.' 23:59:59',
								'created_at' => date('Y-m-d H:i:s')
							  );
					$this->allcrud->insert('specific_prices',$cons);
				}
			}
			$data = ['status' => 'success',
				 'title' => 'Price Rules',
				 'list' => $this->pricerules->getPrice(),
				 'msg' => 'data insert successfully !'
				];
			$this->load->view('admin/pricerules/price_list',$data);
		}
	}
	function product_json()
	{
		$name = $this->input->get('name');
		$product = $this->products->getProductJson($name);
		$data['data']=$product->result_array();
		echo json_encode($data);
	}
	function category_json()
	{
		$name = $this->input->get('name');
		$product = $this->category->getCategoryJSON($name);
		$data['data']=$product->result_array();
		echo json_encode($data);
	}

	function delete($id)
	{
		$delete = $this->allcrud->delete($id,'id','specific_price_rules');
		if($delete == true)
		{
			$delete = $this->allcrud->delete($id,'spesific_price_rule_condition_group_id','specific_price_rule_conditions');
			$delete = $this->allcrud->delete($id,'specific_price_rule_id','specific_prices');
			$data = ['status' => 'success',
				 'title' => 'Price Rules',
				 'list' => $this->pricerules->getPrice(),
				 'msg' => 'data delete successfully !'
				];
			$this->load->view('admin/pricerules/price_list',$data);
		}
	}
	function update($id)
	{
		var_dump($this->products->showAllProductDiscount());
	}
}