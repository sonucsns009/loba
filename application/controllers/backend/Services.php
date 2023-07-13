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

	## Update Service 
	public function change_status()
	{
		$data['title']='Change Status';
		
		$service_id=base64_decode($this->uri->segment(4));
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
}