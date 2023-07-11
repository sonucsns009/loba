<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Serviceprovider extends CI_Controller {

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
	public function manageServiceproviders()
	{
		$data['title']='Manage Service Providers';
		$data['userList']=$this->User_model->getAllServiceproviders();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/manageServiceProviders',$data);
		$this->load->view('admin/admin_footer');
	}

	// Add User
	public function addServiceprovider()
	{
		$data['title']='Add New User';
		$data['serviceList']=$this->User_model->getAllServices();
       // echo $this->db->last_query();exit;

		if(isset($_POST['btn_save_user']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('full_name_ch','Full Name','required');
			
			if($this->form_validation->run())
			{
				$full_name           =$this->input->post('full_name');
				$email               =$this->input->post('email');
				$mobile              =$this->input->post('mobile');
				$alt_mobile          =$this->input->post('alt_mobile');
				$address             =$this->input->post('address');
				$gender	             =$this->input->post('gender');
				$weight	             =$this->input->post('weight');
				$mobility_aid	     =$this->input->post('mobility_aid');
				$id_proof_no	     =$this->input->post('id_proof_no');
				$medical_history	 =$this->input->post('medical_history');
				$status              =$this->input->post('status');
				$user_type           ='Service Provider';//$this->input->post('user_type');

                // CH
				$full_name_ch        =$this->input->post('full_name_ch');
				$email_ch            =$this->input->post('email_ch');
				$mobile_ch           =$this->input->post('mobile_ch');
				$alt_mobile_ch       =$this->input->post('alt_mobile_ch');
 				$address_ch          =$this->input->post('address_ch');
				$gender_ch           =$this->input->post('gender_ch');
				$weight_ch	         =$this->input->post('weight_ch');
				$mobility_aid_ch	 =$this->input->post('mobility_aid_ch');
				$id_proof_no_ch	     =$this->input->post('id_proof_no_ch');
				$medical_history_ch  =$this->input->post('medical_history_ch');
                $password            =md5($this->input->post('password'));
                $service_ids         =$this->input->post('service_ids');

				// check already service exists
				$userexists = $this->User_model->check_userexists($mobile);
				//print_r($_FILES);
				if($userexists == 0)
				{
					if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name'] != '') 
					{
						$ImageName = "profile_pic";
						$target_dir = "uploads/user/profile_pic/";
						$profile_pic= $this->Common_Model->ImageUpload($ImageName,$target_dir);
					}

					if(isset($_FILES['id_proof_front']['name']) && $_FILES['id_proof_front']['name'] != '') 
					{
						$ImageName = "id_proof_front";
						$target_dir = "uploads/user/id_proof/";
						$id_proof_front= $this->Common_Model->ImageUpload($ImageName,$target_dir);
					}
					if(isset($_FILES['id_proof_back']['name']) && $_FILES['id_proof_back']['name'] != '') 
					{
						$ImageName = "id_proof_back";
						$target_dir = "uploads/user/id_proof/";
						$id_proof_back= $this->Common_Model->ImageUpload($ImageName,$target_dir);
					}

					$input_data=array(
                        'full_name'=>$full_name,
                        'email'=>$email,
                        'mobile'=>$mobile,
                        'alt_mobile'=>$alt_mobile,
                        'password'=>$password,
                        'address'=>$address,
                        'user_type'=>$user_type,
                        'gender'=>$gender,
                        'weight'=>$weight,
						'mobility_aid' => $mobility_aid,
                        'medical_history'=>$medical_history,
                        'id_proof_no'=>$id_proof_no,
                        'profile_pic'=>$profile_pic,
                        'id_proof_front'=>$id_proof_front,
                        'id_proof_back'=>$id_proof_back,
                        'status_flag'=>$status,
                        'added_date'=>date('Y-m-d H:i:s'),
                        'edit_date'=>date('Y-m-d H:i:s')
					);

					$user_id=$this->Common_Model->insert_data('users',$input_data);
						//echo $this->db->last_query();//exit;
					if($user_id > 0)
					{
						if($full_name_ch!='' )
						{
							if(isset($_FILES['id_proof_front_ch']['name']) && $_FILES['id_proof_front_ch']['name'] != '') 
							{
								$ImageName = "id_proof_front_ch";
								$target_dir = "uploads/user/id_proof/";
								$id_proof_front_ch= $this->Common_Model->ImageUpload($ImageName,$target_dir);
							}
							if(isset($_FILES['id_proof_back_ch']['name']) && $_FILES['id_proof_back_ch']['name'] != '') 
							{
								$ImageName = "id_proof_back_ch";
								$target_dir = "uploads/user/id_proof/";
								$id_proof_back_ch= $this->Common_Model->ImageUpload($ImageName,$target_dir);
							}

							$input_data_ch=array(
                                'user_id'=>$user_id,
								'full_name'=>$full_name_ch,
								'email'=>$email_ch,
								'mobile'=>$mobile_ch,
								'alt_mobile'=>$alt_mobile_ch,
								'address'=>$address_ch,
								'gender'=>$gender_ch,
								'weight'=>$weight_ch,
								'mobility_aid' => $mobility_aid_ch,
								'medical_history'=>$medical_history_ch,
								'id_proof_no'=>$id_proof_no_ch,
								'id_proof_front'=>$id_proof_front_ch,
								'id_proof_back'=>$id_proof_back_ch,
								'user_type'=>$user_type,
                                'added_date'=>date('Y-m-d H:i:s'),
                                'edit_date'=>date('Y-m-d H:i:s')
							);
							$user_id_ch=$this->Common_Model->insert_data('users_ch',$input_data_ch);
						}

						foreach($service_ids as $service_id)
                        {
                            $arrData=array(
                                'user_id'=> $user_id,
                                'service_id'=>$service_id
                            );
                            $serviceexist= $this->User_model->checkserviceexist($service_id,$user_id);
                            if($serviceexist<=0)
                            {
                                $this->Common_Model->insert_data('user_services',$arrData);
								//echo $this->db->last_query();
                            }
                        }
                        $this->session->set_flashdata('success','Record added successfully.');
						redirect(base_url().'backend/Serviceprovider/manageServiceproviders');	
					}
					else
					{	   
						$data['doctorInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while adding record.');
					}
				}
				else
				{
						$data['doctorInfo'] = $_POST;
						$this->session->set_flashdata('error','User already exists.');		
				}
			}
			else
			{
				$data['doctorInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addServiceprovider',$data);
		$this->load->view('admin/admin_footer');
	}

	public function ServiceproviderDetails()
	{
		$data['title']='Service Provider Details';
		$user_id=base64_decode($this->uri->segment(4));
		//echo $service_id;
		//print_r($_POST);exit;
		if($user_id)
		{
			$data['serviceproviderInfo']=$serviceproviderInfo=$this->User_model->getServiceproviderDetails($user_id,1);
			$data['serviceproviderInfo_ch']=$serviceproviderInfo_ch=$this->User_model->getServiceproviderDetails_ch($user_id,1);
			$data['serviceList']=$serviceproviderInfo_ch=$this->User_model->getServiceproviderServices($user_id,1);
		}
		//$arrSession = $this->session->userdata('logged_in');
		//$admin_id = $arrSession['admin_id'];
		$data['error_msg']='';
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/ServiceproviderDetails',$data);
		$this->load->view('admin/admin_footer');
	}
}

