<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class homeController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$_session=$this->session->userdata('token');
		if($_session == NULL){
			redirect('ngadmin/login','refresh');
		}

	}
	function index()
	{
		$_session=$this->session->userdata('id');
		$data = ['status' => 'success',
				 'title' => 'home'
				];
		$this->load->view('admin/home/home',$data);
	}
	
}