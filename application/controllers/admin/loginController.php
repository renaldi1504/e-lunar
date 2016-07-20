<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loginController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}
	function index()
	{
		$data = ['status' => 'success'];
		$this->load->view('admin/login',$data);
	}
	function postLogin()
	{
		$user = $_POST['email'];
		$pswd = $_POST['pass'];
		
		$datauserlog = array('email' => $user, 'password' => md5($pswd) ,'active' => 1);
		
		$log = $this->employees->dologin($datauserlog);
		if($log==false){
				$msg = "Username or Password is wrong | [Not Registered]";	
				$data = ['message' => $msg,
						 'status' => 'error'
						];
				$this->load->view('admin/login',$data);
		}
		else{
			$datauser = array('email' => $user);
			$account = $this->employees->getemployees($datauser);
			$security = 'LunarO123';
			$dt = date('Y-m-d H:i:s');
			$token = md5($security.$dt);
			$_session = array(
			    'id' 		 => $account->id,
			    'ip_address' => $_SERVER['REMOTE_ADDR'],
			    'last_activity' => $dt,
			    'token'		=> $token,
			    'user_agent'=> $account->email
			);
			$this->session->set_userdata($_session);
					
			$data = [
					 'status'  => 'success'
					];
			redirect('ngadmin','refresh');

		}

	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('ngadmin/login');
	}
}