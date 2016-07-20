<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends CI_Controller {
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
		$_session=$this->session->userdata('id');
		$data = ['status' => 'success',
				 'title' => 'Banner',
				 'banner' => $this->banners->getbanner()
				];
		$this->load->view('admin/banner/list_banner',$data);
	}
	function delete($id)
	{
		$delete = $this->allcrud->delete($id,'id','homesliders');
		if($delete == true)
		{
			redirect('ngadmin/banner','refresh');
		}
	}
	function change($id,$status)
	{
		$data = array('status' => $status);
		$this->allcrud->update($id,'id','homesliders',$data);
		redirect('ngadmin/banner','refresh');
	}
	function insert()
	{
		$this->form_validation->set_rules('position', 'Position', 'numeric|required');
		$this->form_validation->set_rules('title', 'title', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Banner';
		 	$this->load->view('admin/banner/form_banner',$data);
		}
		else
		{
			if (empty($_FILES['userfile']['name']))
			{
			    $data['title'] = 'Banner';
				$data['error'] = "Images must be selected !";
				$this->load->view('admin/banner/form_banner',$data);
			}else
			{
				$type = $this->input->post('type');
				$note = $this->input->post('noted');
				$title = $this->input->post('title');
				$status = $this->input->post('status');
				$description = $this->input->post('description');
				$position = $this->input->post('position');
				$data = array( 
						  'type' => $type, 
						  'note' => $note,
						  'title' => $title,
						  'status' => $status,
						  'description' => $description,
						  'position' => $position,
						  'created_at'   => date('Y-m-d H:i:s')
					);
				$save = $this->allcrud->insert('homesliders',$data);
				$path = 'banner/'.date('Y-m-d');
				$config['upload_path'] = './assets/banner/'.date('Y-m-d');
				$config['file_name'] = $save.'-'.$_FILES['userfile']['name'];
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '300';
				$config['max_width']  = '1400';
				$config['max_height']  = '850';
				if (!is_dir('./assets/banner/'.date('Y-m-d').'/')) {
					mkdir('./assets/banner/'.date('Y-m-d').'/', 0777, TRUE);
				}
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$data['title'] = 'Banner';
					$data['banner'] = $this->banners->getBannerbyId($save);
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/banner/form_banner',$data);
				}
				else
				{
					$this->upload->data();
					$uploadimage = array(
										 'image_web' => $path.'/'.$config['file_name'],
										 'updated_at' => date('Y-m-d H:i:s')			 
										);
					$save = $this->allcrud->update($save,'id','homesliders',$uploadimage);
				}
				$data['banner'] =$this->banners->getbanner();
				$data['title'] = 'Banner';
		 		$this->load->view('admin/banner/list_banner',$data);
			}
		}
		 
	}
	function update($id)
	{
		$banner = $this->banners->getBannerbyId($id);

		if(!empty($banner)){
			$this->form_validation->set_rules('position', 'Position', 'numeric|required');
			$this->form_validation->set_rules('title', 'title', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['banner'] = $banner;
				$data['title'] = 'Banner';
			 	$this->load->view('admin/banner/form_banner',$data);
			}
			else
			{
				$type = $this->input->post('type');
				$note = $this->input->post('noted');
				$title = $this->input->post('title');
				$status = $this->input->post('status');
				$description = $this->input->post('description');
				$position = $this->input->post('position');
				$data = array( 
						  'type' => $type, 
						  'note' => $note,
						  'title' => $title,
						  'status' => $status,
						  'description' => $description,
						  'position' => $position,
						  'updated_at'   => date('Y-m-d H:i:s')
					);
				$this->allcrud->update($id,'id','homesliders',$data);
				if (!empty($_FILES['userfile']['name']))
				{
					$path = 'banner/'.date('Y-m-d');
					$config['upload_path'] = './assets/banner/'.date('Y-m-d');
					$config['file_name'] = $id.'-'.$_FILES['userfile']['name'];
					$config['allowed_types'] = 'jpg';
					$config['max_size']	= '300';
					$config['max_width']  = '1400';
					$config['max_height']  = '850';
					if (!is_dir('./assets/banner/'.date('Y-m-d').'/')) {
						mkdir('./assets/banner/'.date('Y-m-d').'/', 0777, TRUE);
					}
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload())
					{
						$data['title'] = 'Banner';
						$data['banner'] = $this->banners->getBannerbyId($id);
						$data['error'] = $this->upload->display_errors();
						$this->load->view('admin/banner/form_banner',$data);
					}
					else
					{
						$this->upload->data();
						$uploadimage = array(
											 'image_web' => $path.'/'.$config['file_name'],
											 'updated_at' => date('Y-m-d H:i:s')			 
											);
						$this->allcrud->update($id,'id','homesliders',$uploadimage);
					}
				}
			 	$data = ['status' => 'success',
				 'title' => 'Banner',
				 'msg' => 'Banner updated !',
				 'banner' => $this->banners->getbanner()
				];
				$this->load->view('admin/banner/list_banner',$data);
				//$this->load->view('admin/banner/form_banner',$data);
			}
		}
		else
		{
			$data = ['status' => 'success',
				 'title' => 'Banner',
				 'msg' => 'Banner not found !'
				];
			$this->load->view('admin/banner/list_banner',$data);
		}
	}


}