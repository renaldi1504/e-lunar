<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
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
		 if (isset($_GET['search'])){
            $search = $_GET['search'];
			$data['product'] = $this->products->getProductByName($search);
		    $data['category'] = $this->category->getCategory();
		    $this->_template($this->load->view('list-product',$data,true));
		}
		else
		{
			$data['product'] = $this->products->getProductAllin();
		    $data['category'] = $this->category->getCategory();
			$this->_template($this->load->view('list-product',$data,true));
		}
        
	}
	function category($link_rewrite)
	{
		$category = $this->category->getIdCategory($link_rewrite);
		if(!empty($category))
		{
			$data['product'] = $this->products->getProductByCategory($category);
			$data['category'] = $this->category->getCategory();
			$this->_template($this->load->view('list-product',$data,true));
		}
		else
		{
			$data = ['heading' => '204',
					 'message' => 'Oops Product Not Found !'
					 ];
			$this->load->view('errors/html/error_404',$data);
		}
		
	}
	function details($slug='',$link_rewrite = '')
	{
		if ($link_rewrite == '') {
           redirect(base_url(), 'refresh');
        }
		$product = $this->products->getProductByLink($slug,$link_rewrite);
		if(!empty($product)){
	        $stock = $this->products->getProductStock($product[0]->id);
	        $medias = $this->products->getProductMedias($product[0]->id);
			$data = ['category' => $this->category->getCategory(),
					 'single' => $product,
					 'stock' => $stock,
					 'medias' => $medias,
					 'title' => $product[0]->name
					];

			$this->_template($this->load->view('single-product',$data,true));
			$this->load->view('singlescript');
		}
		else
		{
			$data = ['heading' => '204',
					 'message' => 'Oops Product Not Found !'
					 ];
			$this->load->view('errors/html/error_404',$data);
		}
	}
	
}