<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminModel/User_model');
		 $this->load->model('Common_Model');
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	// // code for manage User
	public function manageUser()
	{
		$data['title']='Manage Users';
		$data['userList']=$this->User_model->getAllUsers();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/manageUsers',$data);
		$this->load->view('admin/admin_footer');
	}
	
}

