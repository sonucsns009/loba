<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
		  parent::__construct();
		  $this->load->model('frontmodel/Home_model');
		  $this->load->library("pagination");	
		  $cookie_name = 'site_lang';
		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}

		if($lang=="english")
		{
			$this->lang->load('rest_controller_lang');
		}
		else
		{
			$this->lang->load('rest_controller_lang','chinese');

		}
         // $this->lang->load('rest_controller_lang','chinese');
		//   if(! $this->session->userdata('logged_in'))
		//   {
		// 	 redirect('Login', 'refresh');
		//   }
	}
    public function index()
	{
        $data['title']= $this->lang->line('dashboard');

		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		if(isset($bookingData) && count($bookingData)>0){
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		}
		$data['user_id']=$user_id;

		$this->load->view('front/front_header');
		$this->load->view('front/dashboard',$data);
		$this->load->view('front/front_footer');
	}
}
?>