<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoryController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$_session=$this->session->userdata('token');
		if($_session == NULL){
			redirect('ngadmin/login','refresh');
		}
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');

	}
	function index()
	{
		$data = ['status' => 'success',
				 'title' => 'Category',
				 'category' => $this->category->getCategory(),
				];
		$this->load->view('admin/category/category',$data);
	}
	function getFormCategory($id)
	{
		if($id !='insert'){
			$data['title'] = 'Update Category';
		}
		else
		{
			$data['title'] = 'Add Category';
		}
		$data['category'] = $this->category->getCategoryByLink($id);
		$this->load->view('admin/category/form',$data);
	}
	function updateCategory($id)
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Category Name', 'required');
		$this->form_validation->set_rules('metatitle', 'Meta Title', 'required');
		$this->form_validation->set_rules('position', 'Position', 'numeric');
		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Update Category';
			$data['category'] = $this->category->getCategoryByLink($id);
			$this->load->view('admin/category/form',$data);
		}
		else
		{
			$name = $this->input->post('name');
			$position = $this->input->post('position');
			$description = $this->input->post('description');
			$metatitle = $this->input->post('metatitle');

			$data = array('name' => $name,
						  'description' =>$description,
						  'meta_title' =>$metatitle,
						  'link_rewrite' => str_replace(' ', '-', strtolower($name)),
						  'position' =>$position
			 );

			$this->products->updateProduct($id,'link_rewrite','category',$data);
			redirect('ngadmin/category','refresh');
		}
	}
	function insertCategory()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Category Name', 'required');
		$this->form_validation->set_rules('metatitle', 'Meta Title', 'required');
		$this->form_validation->set_rules('position', 'Position', 'numeric');
		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Add Category';
			$this->load->view('admin/category/form',$data);
		}
		else
		{
			$name = $this->input->post('name');
			$position = $this->input->post('position');
			$description = $this->input->post('description');
			$metatitle = $this->input->post('metatitle');

			$data = array('name' => $name,
						  'description' =>$description,
						  'meta_title' =>$metatitle,
						  'link_rewrite' => str_replace(' ', '-', strtolower($name)),
						  'position' =>$position
			 );

			$this->products->insertproduct('category',$data);
			redirect('ngadmin/category','refresh');
		}
	}
	function deleteCategory($id)
	{
		$this->products->deleteProduct($id,'id','category');
		redirect('ngadmin/category','refresh');	
	}
}