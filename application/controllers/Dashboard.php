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

		$this->load->view('front/front_header');
		$this->load->view('front/dashboard',$data);
		$this->load->view('front/front_footer');
	}
}
?>