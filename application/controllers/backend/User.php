<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminmodel/User_model');
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

	public function userDetails()
	{
		$data['title']='User Details';
		$user_id=base64_decode($this->uri->segment(4));
		//echo $service_id;
		//print_r($_POST);exit;
		if($user_id)
		{
			$data['serviceproviderInfo']=$serviceproviderInfo=$this->User_model->getServiceproviderDetails($user_id,1);
			$data['addressList']=$addressList=$this->User_model->getUserAddress($user_id,1);
			$data['serviceproviderInfo_ch']=$serviceproviderInfo_ch=$this->User_model->getServiceproviderDetails_ch($user_id,1);
		}
		$data['error_msg']='';
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/userDetails',$data);
		$this->load->view('admin/admin_footer');
	}
	
}

