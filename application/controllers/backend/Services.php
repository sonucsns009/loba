<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  $this->load->model('adminmodel/Service_model');
		  $this->load->model('Common_Model');
		// $this->load->library("pagination");
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function index()
	{
		$this->load->view('admin/admin_header');
	}
	// // code for manage Admin
	 public function manageService()
	{
		$data['title']='Manage Services';
		$data['serviceList']=$this->Service_model->getAllServices();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/manageService',$data);
		$this->load->view('admin/admin_footer');
	}
   
	## Add Service 
	public function addService()
	{
		$data['title']='Add New Service';
		//print_r($_POST);//exit;
		if(isset($_POST['btn_save_service']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('services_title','Service Title','required');
			$this->form_validation->set_rules('services_title_ch','Service Ttile','required');
			
			if($this->form_validation->run())
			{
				$services_title      =$this->input->post('services_title');
				$service_image       =$this->input->post('service_image');
				$service_description =$this->input->post('service_description');
				$tagline             =$this->input->post('tagline');
				$paytype             =$this->input->post('paytype');
				$pricetype           =$this->input->post('pricetype');
				$amount				 =$this->input->post('amount');
				$duration			 =$this->input->post('duration');
				$buffer_time		 =$this->input->post('buffer_time');
				$payment_preferences =$this->input->post('payment_preferences');
				$video_conference    =$this->input->post('video_conference');

				$services_title_ch      =$this->input->post('services_title_ch');
				$service_image_ch       =$this->input->post('service_image_ch');
				$service_description_ch =$this->input->post('service_description_ch');
				$tagline_ch             =$this->input->post('tagline_ch');
				$paytype_ch             =$this->input->post('paytype_ch');
				$pricetype_ch           =$this->input->post('pricetype_ch');
				$amount_ch				=$this->input->post('amount_ch');
				$duration_ch			=$this->input->post('duration_ch');
				$buffer_time_ch		    =$this->input->post('buffer_time_ch');
				$payment_preferences_ch =$this->input->post('payment_preferences_ch');
				
				// check already service exists
				$service_exists = $this->Service_model->check_serviceexists($services_title);

				if($service_exists == 0)
				{
					 //Image Upload Code 
					 if(count($_FILES) > 0) 
					 {
						 $ImageName = "service_image";
						 $target_dir = "uploads/service_img/";
						 $service_image= $this->Common_Model->ImageUpload($ImageName,$target_dir);
					 }

					  //Image Upload Code 
					  if(count($_FILES) > 0) 
					  {
						  $ImageName = "service_image_ch";
						  $target_dir = "uploads/service_img/";
						  $service_image_ch= $this->Common_Model->ImageUpload($ImageName,$target_dir);
					  }

					$input_data=array(
						'service_name'=>$services_title,
						'service_image'=>$service_image,
						'service_description'=>$service_description,
						'service_tagline'=>$tagline,
						'paytype'=>$paytype,
						'pricetype'=>$pricetype,
						'amount'=>$amount,
						'duration'=>$duration,
						'buffer_time'=>$buffer_time,
						'video_conferencing'=>$video_conference,
						'dateadded'=>date('Y-m-d H:i:s'),
						'dateupdated'=>date('Y-m-d H:i:s'),
					);

					$service_id=$this->Common_Model->insert_data('main_services',$input_data);
						//echo $this->db->last_query();//exit;
					if($service_id > 0)
					{
						if($services_title_ch!='' || $service_description_ch!='' )
						{
							$input_data_ch=array(
								'service_id'=>$service_id,
								'service_name'=>$services_title_ch,
								'service_image'=>$service_image_ch,
								'service_description'=>$service_description_ch,
								'service_tagline'=>$tagline_ch,
								'paytype'=>$paytype_ch,
								'pricetype'=>$pricetype_ch,
								'amount'=>$amount_ch,
								'duration'=>$duration_ch,
								'buffer_time'=>$buffer_time_ch,
								'dateadded'=>date('Y-m-d H:i:s'),
								'dateupdated'=>date('Y-m-d H:i:s'),
							);

							$service_id_ch=$this->Common_Model->insert_data('main_services_ch',$input_data_ch);
							//echo $this->db->last_query();
						}
						$this->session->set_flashdata('success','Record added successfully.');
						redirect(base_url().'backend/Services/manageService');	
					}
					else
					{	   
						$data['serviceInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while adding record.');
					}
				}
				else
				{
						$data['serviceInfo'] = $_POST;
						$this->session->set_flashdata('error','Service already exists.');		
				}
			}
			else
			{
				$data['adminInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addService',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function updateService()
	{
		$data['title']='Update Service';
		
		$service_id=base64_decode($this->uri->segment(4));
		//echo $service_id;
		//print_r($_POST);exit;
		if($service_id)
		{
			$data['serviceInfo']=$serviceInfo=$this->Service_model->getServiceDetails($service_id,1);
			$data['serviceInfo_ch']=$serviceInfo=$this->Service_model->getServiceDetails_ch($service_id,1);
			if(isset($_POST['btn_update_service']))
			{
				//print_r($_POST);
				$this->form_validation->set_rules('services_title','Service Title','required');
				$this->form_validation->set_rules('services_title_ch','Service Ttile','required');
				
				if($this->form_validation->run())
				{
					$services_title      =$this->input->post('services_title');
					$service_image       =$this->input->post('service_image');
					$service_description =$this->input->post('service_description');
					$tagline             =$this->input->post('tagline');
					$paytype             =$this->input->post('paytype');
					$pricetype           =$this->input->post('pricetype');
					$amount				 =$this->input->post('amount');
					$duration			 =$this->input->post('duration');
					$buffer_time		 =$this->input->post('buffer_time');
					$payment_preferences =$this->input->post('payment_preferences');
					$video_conference    =$this->input->post('video_conference');

					$services_title_ch      =$this->input->post('services_title_ch');
					$service_image_ch       =$this->input->post('service_image_ch');
					$service_description_ch =$this->input->post('service_description_ch');
					$tagline_ch             =$this->input->post('tagline_ch');
					$paytype_ch             =$this->input->post('paytype_ch');
					$pricetype_ch           =$this->input->post('pricetype_ch');
					$amount_ch				=$this->input->post('amount_ch');
					$duration_ch			=$this->input->post('duration_ch');
					$buffer_time_ch		    =$this->input->post('buffer_time_ch');
					$payment_preferences_ch =$this->input->post('payment_preferences_ch');
					
						//Image Upload Code 
						if(count($_FILES) > 0) 
						{
							$ImageName = "service_image";
							$target_dir = "uploads/service_img/";
							$service_image= $this->Common_Model->ImageUpload($ImageName,$target_dir);
						}

						//Image Upload Code 
						if(count($_FILES) > 0) 
						{
							$ImageName = "service_image_ch";
							$target_dir = "uploads/service_img/";
							$service_image_ch= $this->Common_Model->ImageUpload($ImageName,$target_dir);
						}
						if($service_image!='')
						{
							$input_data=array(
								'service_name'=>$services_title,
								'service_image'=>$service_image,
								'service_description'=>$service_description,
								'service_tagline'=>$tagline,
								'paytype'=>$paytype,
								'pricetype'=>$pricetype,
								'amount'=>$amount,
								'duration'=>$duration,
								'buffer_time'=>$buffer_time,
								'payment_preferences' => $payment_preferences,
								'video_conferencing'=>$video_conference,
								'dateadded'=>date('Y-m-d H:i:s'),
								'dateupdated'=>date('Y-m-d H:i:s'),
							);
						}
						else
						{
							$input_data=array(
								'service_name'=>$services_title,
								'service_description'=>$service_description,
								'service_tagline'=>$tagline,
								'paytype'=>$paytype,
								'pricetype'=>$pricetype,
								'amount'=>$amount,
								'duration'=>$duration,
								'buffer_time'=>$buffer_time,
								'payment_preferences' => $payment_preferences,
								'video_conferencing'=>$video_conference,
								'dateadded'=>date('Y-m-d H:i:s'),
								'dateupdated'=>date('Y-m-d H:i:s'),
							);
						}
						$this->Common_Model->update_data('main_services','service_id',$service_id,$input_data);
						//	echo $this->db->last_query();exit;
						if($service_id > 0)
						{
							if($services_title_ch!='' || $service_description_ch!='' )
							{
								if($service_image_ch!='')	
								{
									$input_data_ch=array(
										'service_id'=>$service_id,
										'service_name'=>$services_title_ch,
										'service_image'=>$service_image_ch,
										'service_description'=>$service_description_ch,
										'service_tagline'=>$tagline_ch,
										'paytype'=>$paytype_ch,
										'pricetype'=>$pricetype_ch,
										'amount'=>$amount_ch,
										'duration'=>$duration_ch,
										'buffer_time'=>$buffer_time_ch,
										'payment_preferences' => $payment_preferences_ch,									'dateadded'=>date('Y-m-d H:i:s'),
										'dateupdated'=>date('Y-m-d H:i:s'),
									);
								}
								else
								{
									$input_data_ch=array(
										'service_id'=>$service_id,
										'service_name'=>$services_title_ch,
										'service_description'=>$service_description_ch,
										'service_tagline'=>$tagline_ch,
										'paytype'=>$paytype_ch,
										'pricetype'=>$pricetype_ch,
										'amount'=>$amount_ch,
										'duration'=>$duration_ch,
										'buffer_time'=>$buffer_time_ch,
										'payment_preferences' => $payment_preferences_ch,									'dateadded'=>date('Y-m-d H:i:s'),
										'dateupdated'=>date('Y-m-d H:i:s'),
									);
								}
								$this->Common_Model->update_data('main_services_ch','service_id',$service_id,$input_data_ch);
							//	echo $this->db->last_query();exit;
							}
							$this->session->set_flashdata('success','Record updated successfully.');
							redirect(base_url().'backend/Services/manageService');	
						}
						else
						{	   
							$data['serviceInfo'] = $_POST;
							$this->session->set_flashdata('error','Error while adding record.');
						}
					
				}
				else
				{
					$data['serviceInfo'] = $_POST;
					$this->session->set_flashdata('error',$this->form_validation->error_string());
				}
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/updateService',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function serviceDetails()
	{
		$data['title']='Service Details';
		$service_id=base64_decode($this->uri->segment(4));
		//echo $service_id;
		//print_r($_POST);exit;
		if($service_id)
		{
			$data['serviceInfo']=$serviceInfo=$this->Service_model->getServiceDetails($service_id,1);
			$data['serviceInfo_ch']=$serviceInfo=$this->Service_model->getServiceDetails_ch($service_id,1);
		}
		//$arrSession = $this->session->userdata('logged_in');
		//$admin_id = $arrSession['admin_id'];
		$data['error_msg']='';
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/serviceDetails',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function deleteService()
	{
		$data['title']='Delete Service';
		
		$service_id=base64_decode($this->uri->segment(4));
		//echo $service_id;
		//print_r($_POST);exit;
		if($service_id)
		{
			$input_data=array(
				'service_status' => 'Delete',
				'dateupdated'=>date('Y-m-d H:i:s'),
			);
			$this->Common_Model->update_data('main_services','service_id',$service_id,$input_data);
			//	echo $this->db->last_query();exit;

			$input_data_ch=array(
				'service_status' => 'Delete',
				'dateupdated'=>date('Y-m-d H:i:s'),
			);
			$service_id_ch=$this->Common_Model->update_data('main_services_ch','service_id',$service_id,$input_data_ch);
			//	echo $this->db->last_query();exit;
		 
			$this->session->set_flashdata('success','Record delete successfully.');
			redirect(base_url().'backend/Services/manageService');	
		}
		else
		{	   
			$data['serviceInfo'] = $_POST;
			$this->session->set_flashdata('error','Error while adding record.');
		}
	}

	// // code for change Password
	// public function changePassword()
	// {
	// 	$arrSession = $this->session->userdata('logged_in');
	// 	$admin_id = $arrSession['admin_id'];
	// 	$data['title']='Change Password';
	// 	$data['error_msg']='';
	// 	if(isset($_POST['btn_chnagePassword']))
	// 	{
	// 		$this->form_validation->set_rules('old_password','Old Password','required');
	// 		$this->form_validation->set_rules('admin_password','New Password','required');
	// 		$this->form_validation->set_rules('confirm_password','Confirm Password','required');
	// 		if($this->form_validation->run())
	// 		{
	// 			$old_password=$this->input->post('old_password');
	// 			$admin_password=$this->input->post('admin_password');
	// 			$confirm_password=$this->input->post('confirm_password');
	// 			if($admin_password==$confirm_password)
	// 			{
	// 				$oldPass=$this->Admin_model->checkAdminPassword($old_password,$admin_id);
	// 				if($oldPass>0)
	// 				{  
	// 				   // echo "<pre>";print_r($arrSession); exit;
	// 					$asmin_id=$this->Admin_model->udatPassord($admin_password,$arrSession['admin_id']);
	// 					//echo $this->db->last_query();exit;
	// 					if($asmin_id)
	// 					{	// echo '///';exit;

	// 						$this->session->set_flashdata('success','Password change successfully.');
	// 						redirect(base_url().'Admin/ChangePassword');	
	// 					}
	// 					else
	// 					{
	// 						$this->session->set_flashdata('error','Error while updating record.');
	// 						redirect(base_url().'Admin/ChangePassword');
	// 					}							
	// 				}
	// 				else
	// 				{
	// 						$this->session->set_flashdata('error','Old password is not match');
	// 						redirect(base_url().'Admin/ChangePassword');								
	// 				}
	// 			}
	// 			else
	// 			{
	// 					$this->session->set_flashdata('error','Confirm password is npt match with new password');
	// 					redirect(base_url().'Admin/ChangePassword');								
	// 			}
	// 		}
	// 		else
	// 		{
	// 			$this->session->set_flashdata('error',$this->form_validation->error_string());
	// 			redirect(base_url().'Admin/ChangePassword');
	// 		}
	// 	}
	// 	$this->load->view('admin/admin_header',$data);
	// 	$this->load->view('admin/changePassword',$data);
	// 	$this->load->view('admin/admin_footer');
	// }
	
	// public function updateprofile()
	// {
	// 	$data['title']='Update Profile';
	// 	$data['error_msg']='';
	// 	 $sessiondata=$this->session->userdata('logged_in');
	// 	$session_admin_id=$sessiondata['admin_id']; 
	// 	$data['session_admin_name']=$session_admin_name=$sessiondata['admin_name'];
	// 	$session_user_type=$sessiondata['user_type'];

	// 	/*if($session_user_type=="Admin")
	// 	{*/
	// 		$data['adminInfo'] =$this->Admin_model->getAdminDetails($session_admin_id,1);
	// 		#print_r($data['adminInfo']);exit;
	// 		if(isset($_POST['btn_updateprofile']))
	// 		{
	// 			$this->form_validation->set_rules('admin_name','Admin Name','required');
	// 			$this->form_validation->set_rules('username','Username','required');
	// 			$this->form_validation->set_rules('admin_address','Address','required');
	// 			$this->form_validation->set_rules('admin_email','Admin Email','required|valid_email');
				
	// 			if($this->form_validation->run())
	// 			{
	// 				$admin_name=$this->input->post('admin_name');
	// 				$admin_email=$this->input->post('admin_email');
	// 				$username=$this->input->post('username');
	// 				$admin_address=$this->input->post('admin_address');
					
	// 				$mobile_number=$this->input->post('mobile_number');
	// 				$status='Active';
					
					
	// 				//$strUserType = "Admin";	
					
	// 				$latlong=$this->get_lat_long($admin_address);
	// 					$parts=explode(",",$latlong);
	// 					$address_lat=$parts[0];
	// 					$address_long=$parts[1];
						
	// 				$input_data=array(
	// 									'admin_name'=>$admin_name,
	// 									'admin_email'=>$admin_email,
	// 									'username'=>$username,
	// 									'admin_address'=>addslashes($admin_address),
	// 									'mobile_number'=>$mobile_number,
	// 									//'user_type'=>$strUserType,
	// 									'status'=>$status,
	// 									'address_lat'=>$address_lat,
	// 									'address_long'=>$address_long,
	// 									'dateupdated'=>date('Y-m-d H:i:s')
	// 								);
	// 				if($_POST['admin_password']!= "")
	// 				{
	// 					$admin_password=$_POST['admin_password'];
	// 					$admin_password = md5($admin_password);
	// 					$input_data['admin_password'] = $admin_password;
	// 				}				
	// 				$retid=$this->Admin_model->upt_admin($input_data,$session_admin_id);
	// 				#echo $this->db->last_query();exit;
	// 				if($retid)
	// 				{
	// 					$this->session->set_flashdata('success','Record updated successfully.');
	// 					redirect(base_url().'backend/Admin/updateprofile');
	// 				}
	// 				else
	// 				{
	// 					$data['adminInfo'] = $_POST;
	// 					$this->session->set_flashdata('error','Error while updating record.');
	// 					redirect(base_url().'backend/Admin/updateprofile');
	// 				}
	// 			}
	// 			else
	// 			{
	// 				$data['adminInfo'] = $_POST;
	// 				$this->session->set_flashdata('error',$this->form_validation->error_string());
	// 				redirect(base_url().'backend/Admin/updateprofile');
	// 			}
	// 		}
	// 		$this->load->view('admin/admin_header',$data);		
	// 		$this->load->view('admin/admin_right',$data);		
	// 		$this->load->view('admin/updateprofile',$data);		
	// 		$this->load->view('admin/admin_footer');
	// 	/*}
	// 	else
	// 	{
	// 		$data['subadminInfo']=$subadminInfo=$this->Admin_model->getSinglesubadminInfo($session_admin_id);
	// 		//print_r($data['adminInfo']);exit;
	// 		if(isset($_POST['btn_updateprofile']))
	// 		{
	// 			$this->form_validation->set_rules('subadmin_name','Subadmin Name','required');
	// 			$this->form_validation->set_rules('subusername','Username','required');
				
	// 			$this->form_validation->set_rules('subadmin_email','Subadmin Email','required|valid_email');
				
	// 			if($this->form_validation->run())
	// 			{
	// 				$subadmin_name=$this->input->post('subadmin_name');
	// 					$subadmin_email=$this->input->post('subadmin_email');
	// 					$subusername=$this->input->post('subusername');
	// 					$submobile_number=$this->input->post('submobile_number');
	// 				// check already category exists
	// 					$admin_exists = $this->Admin_model->check_SUBadminexists($subadmin_email,$subusername,$session_admin_id);
					
	// 					if($admin_exists == 0)
	// 					{
							
	// 						$input_data=array(
	// 											'subadmin_name'=>$subadmin_name,
	// 											'subadmin_email'=>$subadmin_email,
	// 											'subusername'=>$subusername,
	// 											'submobile_number'=>$submobile_number,
	// 											'dateupdated'=>date('Y-m-d H:i:s')
	// 										);
	// 						if($_POST['subadmin_password'] != "")
	// 						{
	// 							$subadmin_password = md5($_POST['subadmin_password']);
	// 							$input_data['subadmin_password'] = $subadmin_password;
	// 						}		
	// 						$session_admin_id=$this->Admin_model->upt_SUBadmin($input_data,$session_admin_id);
	// 							//	echo $this->db->last_query();exit;
	// 						if($session_admin_id > 0)
	// 						{
	// 							$this->session->set_flashdata('success','Details are updated successfully.');
	// 							redirect(base_url("backend/").'Admin/updateprofile');	
	// 						}
	// 						else
	// 						{	   
	// 							$data['subadminInfo'] = $_POST;
	// 							$this->session->set_flashdata('error','Error while updating details.');
	// 						}
	// 					}
	// 					else
	// 					{
	// 							$data['subadminInfo'] = $_POST;
	// 							$this->session->set_flashdata('error','Admin already exists.');				
	// 					}
	// 				}
	// 				else
	// 				{
	// 					$data['subadminInfo'] = $_POST;
	// 					$this->session->set_flashdata('error',$this->form_validation->error_string());
	// 				}
	// 		}
	// 		$this->load->view('admin/admin_header',$data);		
	// 		$this->load->view('admin/admin_right',$data);		
	// 		$this->load->view('admin/updateprofile',$data);		
	// 		$this->load->view('admin/admin_footer');
	// 	}*/
	// }
	
	// // function to get  the address
	// public function get_lat_long($address)
	// {
	// 	$address = str_replace(" ", "+", $address);
	// 	//echo "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
	// 	//exit;
	// 	$json1 = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyD7CJZzaVXcO18AfuhbZkKzw7P2MKuivm8");
	// 	$json = json_decode($json1);

	// 	$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	// 	$longl = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	// 	return $lat.','.$longl;
	// 	//return "19.95099258,73.84654236";
	// 	//echo json_encode(array('lat'=>$lat,'longl'=>$longl));
	// }
}