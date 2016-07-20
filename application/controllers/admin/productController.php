<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class productController extends CI_Controller {
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
	function index($paging = 1)
	{
		$id = $this->input->get('id');
		$name = $this->input->get('name');
		$reference = $this->input->get('reference');
		$category = $this->input->get('category');
		$stock = $this->input->get('stock');
		$status = $this->input->get('status');

			$config['base_url'] = site_url('ngadmin/product');
			$config['total_rows'] = $this->products->getcountproduct($id,$name,$reference,$category,$status);
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = "</li>";
			$config['cur_tag_open'] = "<li class='active'><a>";
			$config['cur_tag_close'] = "</a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			$config['per_page'] = 20;
			
			$config['reuse_query_string'] = TRUE;
			$config['use_page_numbers'] = TRUE;
			
			$config['num_links'] = 10;

			$this->pagination->initialize($config);	
		$data['paging'] = $this->pagination->create_links();
		$data['total'] = $this->products->getcountproduct($id,$name,$reference,$category,$status);	
		$data['product'] = $this->products->getproducts($config['per_page'],($paging - 1)*$config['per_page'],$id,$name,$reference,$category,$status);
		$data['status'] = 'success';
		$data['page'] = $paging;
		$data['title'] = 'Product';
		$this->load->view('admin/product/product',$data);
	}

	function changeStatus($id,$status,$page)
	{
		$data = array('active' => $status);
		$change = $this->products->changeStatus($id,$data);
		if($change == true)
		{
			redirect('ngadmin/product/'.$page,'refresh');
		}
		else
		{
			return false;
		}
	}
	function delete($id,$page)
	{
		$this->products->deleteProduct($id,'product_id','product_stocks');
		$this->products->deleteProduct($id,'product_id','product_medias');
		$delete = $this->products->deleteProduct($id,'id','products');
		if($delete == true)
		{
			redirect('ngadmin/product/'.$page,'refresh');
		}
		else
		{
			return false;
		}
	}
	function getFormProduct($id)
	{
		if($id !='insert'){
			$data['product'] = $this->products->getAllProduct($id);
			$data['stocks'] = $this->products->getProductStock($id);
			$data['medias'] = $this->products->getProductMedias($id);
			$data['title'] = 'Update Product';
		}
		else
		{
			$data['title'] = 'Add Product';
		}
		$data['category'] = $this->category->getCategory();
		
		$this->load->view('admin/product/product_detail',$data);
	}
	function deleteStock($product_id,$id)
	{
		$this->products->deleteProduct($id,'id','product_stocks');
		redirect('product/form/'.$product_id,'refresh');
	}
	function addStock($id)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('qty', 'Product Stock', 'numeric');
		$this->form_validation->set_rules('size', 'Product Size', 'required');
		$this->form_validation->set_rules('color', 'Product Color', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['product'] = $this->products->getAllProduct($id);
			$data['stocks'] = $this->products->getProductStock($id);
			$data['title'] = 'add Stock';
			$this->load->view('admin/product/add_stock',$data);
		}
		else
		{
			$size = $this->input->post('size');
			$color = $this->input->post('color');
			$quantity = $this->input->post('qty');
			$dataStock = array(
				'product_id'   => $id,
				'quantity'     => $quantity,
				'color'        => $color,
				'size'	  	   => $size,
				'out_of_stock' => 0,
				'created_at'   => date('Y-m-d H:i:s')
			);
			$this->products->insertproduct('product_stocks',$dataStock);
			redirect('product/form/'.$id,'refresh');
		}
	}
	function updateImage($id_product)
	{
		$id = $this->input->post('id');
		$position = $this->input->post('position');
		$cover = $this->input->post('cover');
		foreach ($id as $key => $value) {
			$data = array( 
						  'position' => $position[$key], 
						  'cover' => $cover[$key],
						  'updated_at'   => date('Y-m-d H:i:s')
					);
			$this->products->updateProduct($value,'id','product_medias',$data);
		}
		redirect('product/form/'.$id_product,'refresh');
	}

	function updateStock($id_product)
	{	
		$id = $this->input->post('id');
		$stock = $this->input->post('stock');
		$size = $this->input->post('size');
		$color = $this->input->post('color');
		foreach ($id as $key => $value) {
			$data = array( 
						  'quantity' => $stock[$key], 
						  'size' => $size[$key],
						  'color' => $color[$key],
						  'updated_at'   => date('Y-m-d H:i:s')
					);
			$this->products->updateProduct($value,'id','product_stocks',$data);
		}
		redirect('product/form/'.$id_product,'refresh');
	}
	function image($id)
	{
		$data['title'] = 'Upload Image';
		$data['product'] = $this->products->getAllProduct($id);
		$this->load->view('admin/product/upload_image',$data);
	}
	function deleteImage($id,$imgid)
	{
		$this->products->deleteProduct($imgid,'id','product_medias');
		redirect('product/form/'.$id,'refresh');	
	}
	function uploadImage($id)
	{
		if (empty($_FILES['userfile']['name']))
		{
		    $data['title'] = 'Upload Image';
			$data['product'] = $this->products->getAllProduct($id);
			$data['error'] = "Images must be selected !";
			$this->load->view('admin/product/upload_image',$data);
		}else
		{
			$path = 'img/p/'.date('Y-m-d');
			$filename = str_replace(' ', '-', strtolower($this->input->post('caption'))).'.jpg';
			$config['upload_path'] = './assets/img/p/'.date('Y-m-d');
			$config['allowed_types'] = 'jpg';
			$config['max_size']	= '100';
			$config['max_width']  = '768';
			$config['max_height']  = '1024';
			if (!is_dir('./assets/img/p/'.date('Y-m-d').'/')) {
				mkdir('./assets/img/p/'.date('Y-m-d').'/', 0777, TRUE);
			}
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$data['title'] = 'Upload Image';
				$data['product'] = $this->products->getAllProduct($id);
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin/product/upload_image',$data);
			}
			else
			{
				$this->upload->data();
				$uploadimage = array('product_id' => $id, 
									 'position' => 0,
									 'cover' => 0,
									 'path' => $path,
									 'filename' => $_FILES['userfile']['name'],
									 'created_at' => date('Y-m-d H:i:s'),
									 'updated_at' => date('Y-m-d H:i:s'),
									 'image_file_name' => $_FILES['userfile']['name'],
									 'image_file_size' => $_FILES['userfile']['size'],
									 'image_updated_at' => date('Y-m-d H:i:s')
					);
				$this->products->insertproduct('product_medias',$uploadimage);
				redirect('product/form/'.$id,'refresh');
			}
			
		}
	
	}
	function updateProduct($id)
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('reference', 'Product Reference', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'numeric');
		$this->form_validation->set_rules('width', 'Width', 'numeric');
		$this->form_validation->set_rules('height', 'Height', 'numeric');
		$this->form_validation->set_rules('depth', 'Depth', 'numeric');
		$this->form_validation->set_rules('weight', 'Weight', 'numeric');
		if ($this->form_validation->run() == FALSE)
		{
			$data['category'] = $this->category->getCategory();
			$data['product'] = $this->products->getAllProduct($id);
			$data['stocks'] = $this->products->getProductStock($id);
			$data['medias'] = $this->products->getProductMedias($id);
			$data['title'] = 'Update Product';
			$this->load->view('admin/product/product_detail',$data);
		}
		else
		{
			$name = $this->input->post('name');
			$reference = $this->input->post('reference');
			$enable = $this->input->post('status');
			$available = $this->input->post('available');
			$showprice = $this->input->post('showprice');
			$condition = $this->input->post('condition');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$width = $this->input->post('width');
			$height = $this->input->post('height');
			$depth = $this->input->post('depth');
			$weight = $this->input->post('weight');
			$metatitle = $this->input->post('metatitle');
			$metadesc = $this->input->post('metadesc');
			$category_default_id = $this->input->post('category_default_id');
			$category = $this->input->post('category_id');
			$data = array('name' => $name,
						  'description' =>$description,
						  'meta_description' =>$metadesc,
						  'meta_title' =>$metatitle,
						  'category_default_id' =>$category_default_id,
						  'price' =>$price,
						  'reference' =>$reference,
						  'link_rewrite' => str_replace(' ', '-', strtolower($name)),
						  'width' =>$width,
						  'height' =>$height,
						  'depth' =>$depth,
						  'weight' =>$weight,
						  'show_price' =>$showprice,
						  'condition' =>$condition,
						  'available_for_order' =>$available,
						  'active' =>$enable,
						  'updated_at' => date('Y-m-d H:i:s')
			 );

			$this->products->updateProduct($id,'id','products',$data);
			redirect('product/form/'.$id,'refresh');
		}
	}
	function addProduct()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('reference', 'Product Reference', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'numeric');
		$this->form_validation->set_rules('width', 'Width', 'numeric');
		$this->form_validation->set_rules('height', 'Height', 'numeric');
		$this->form_validation->set_rules('depth', 'Depth', 'numeric');
		$this->form_validation->set_rules('weight', 'Weight', 'numeric');
		$this->form_validation->set_rules('category_default_id', 'Product Category', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$data['category'] = $this->category->getCategory();
			$data['title'] = 'Add Product';
			$this->load->view('admin/product/product_detail',$data);
		}
		else
		{
			$name = $this->input->post('name');
			$reference = $this->input->post('reference');
			$enable = $this->input->post('status');
			$available = $this->input->post('available');
			$showprice = $this->input->post('showprice');
			$condition = $this->input->post('condition');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$width = $this->input->post('width');
			$height = $this->input->post('height');
			$depth = $this->input->post('depth');
			$weight = $this->input->post('weight');
			$metatitle = $this->input->post('metatitle');
			$metadesc = $this->input->post('metadesc');
			$category_default_id = $this->input->post('category_default_id');
			$category = $this->input->post('category_id');
			$data = array('name' => $name,
						  'description' =>$description,
						  'meta_description' =>$metadesc,
						  'meta_title' =>$metatitle,
						  'category_default_id' =>$category_default_id,
						  'price' =>$price,
						  'link_rewrite' => str_replace(' ', '-', strtolower($name)),
						  'reference' =>$reference,
						  'width' =>$width,
						  'height' =>$height,
						  'depth' =>$depth,
						  'weight' =>$weight,
						  'show_price' =>$showprice,
						  'condition' =>$condition,
						  'available_for_order' =>$available,
						  'active' =>$enable,
						  'created_at' => date('Y-m-d H:i:s'),
						  'updated_at' => date('Y-m-d H:i:s')
			 );

			$id = $this->products->insertproduct('products',$data);
			redirect('product/form/'.$id,'refresh');
		}
	}
}