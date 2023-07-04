<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminModel/Dashboard_model');
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function index()
	{
		$data['title']='Dashboard';
		
		#echo $this->db->last_query();exit;
		$doctors=$this->Dashboard_model->getAllDoctors();
		$nurse=$this->Dashboard_model->getAllNurse();
		$services=$this->Dashboard_model->getAllServices();

		$data['alldoctors']=count($doctors);
		$data['allnurse']=count($nurse);
		$data['allservices']=count($services);

		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		
			$this->load->view('admin/admin_header',$data);
			
			$this->load->view('admin/dashboard');

			$this->load->view('admin/admin_footer');
	}

	public function updateprofile()
	{
		$data['title']='Update Profile';
		$data['error_msg']='';
		$sessiondata=$this->session->userdata('logged_in');
		$session_admin_id=$sessiondata['admin_id']; 
		$data['session_admin_name']=$session_admin_name=$sessiondata['admin_name'];
		$session_user_type=$sessiondata['user_type'];

		/*if($session_user_type=="Admin")
		{*/
			$data['adminInfo'] =$this->Dashboard_model->getAdminDetails($session_admin_id,1);
			#print_r($data['adminInfo']);exit;
			if(isset($_POST['btn_updateprofile']))
			{
				$this->form_validation->set_rules('admin_name','Admin Name','required');
				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('admin_address','Address','required');
				$this->form_validation->set_rules('admin_email','Admin Email','required|valid_email');
				
				if($this->form_validation->run())
				{
					$admin_name=$this->input->post('admin_name');
					$admin_email=$this->input->post('admin_email');
					$username=$this->input->post('username');
					$admin_address=$this->input->post('admin_address');
					
					$mobile_number=$this->input->post('mobile_number');
					$status='Active';
					
					
					//$strUserType = "Admin";	
					
					//$latlong=$this->get_lat_long($admin_address);
						//$parts=explode(",",$latlong);
						//$address_lat=$parts[0];
						//$address_long=$parts[1];
						$address_lat="";
						$address_long="";
						
					$input_data=array(
										'admin_name'=>$admin_name,
										'admin_email'=>$admin_email,
										'username'=>$username,
										'admin_address'=>addslashes($admin_address),
										'mobile_number'=>$mobile_number,
										//'user_type'=>$strUserType,
										'status'=>$status,
										'address_lat'=>$address_lat,
										'address_long'=>$address_long,
										'dateupdated'=>date('Y-m-d H:i:s')
									);
					if($_POST['admin_password']!= "")
					{
						$admin_password=$_POST['admin_password'];
						$admin_password = md5($admin_password);
						$input_data['admin_password'] = $admin_password;
					}				
					$retid=$this->Dashboard_model->upt_admin($input_data,$session_admin_id);
					#echo $this->db->last_query();exit;
					if($retid)
					{
						$this->session->set_flashdata('success','Record updated successfully.');
						redirect(base_url().'backend/Dashboard/updateprofile');
					}
					else
					{
						$data['adminInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while updating record.');
						redirect(base_url().'backend/Dashboard/updateprofile');
					}
				}
				else
				{
					$data['adminInfo'] = $_POST;
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url().'backend/Dashboard/updateprofile');
				}
			}
			$this->load->view('admin/admin_header',$data);		
			$this->load->view('admin/admin_right',$data);		
			$this->load->view('admin/updateprofile',$data);		
			$this->load->view('admin/admin_footer');
		
	}

	// function to get  the address
	public function get_lat_long($address)
	{
		$address = str_replace(" ", "+", $address);
		//echo "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
		//exit;
		$json1 = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyD7CJZzaVXcO18AfuhbZkKzw7P2MKuivm8");
		$json = json_decode($json1);

		$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$longl = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
		return $lat.','.$longl;
		//return "19.95099258,73.84654236";
		//echo json_encode(array('lat'=>$lat,'longl'=>$longl));
	}
}

