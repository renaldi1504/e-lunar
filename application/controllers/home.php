<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
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
		$data = ['category' => $this->category->getCategory(),
				 'title' => 'home',
				 'sliders' => $this->banners->getActiveBanner()
				];
		$this->_template($this->load->view('home',$data,true));
		$this->load->view('scriptfooter');
	}
	
}