<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
	{
		  parent::__construct();
		  $this->load->model('frontmodel/Home_model');
		  $this->load->library("pagination");	
		//   if(!$this->session->userdata('logged_in'))
		//   {
		// 	 redirect(base_url().'Home/login');
		//   }
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
	}
    public function index()
	{
		$data['title']="Home";
		$data['page_title']="home";
		$this->load->view('front/front_header');
		$this->load->view('front/home',$data);
		$this->load->view('front/front_footer');
	}
	public function aboutus()
	{
		$data['title']="About Us";
		$data['page_title']="about_us";
		$this->load->view('front/front_header');
		$this->load->view('front/about',$data);
		$this->load->view('front/front_footer');
	}
	public function contactus()
	{
		$data['title']="Contact Us";
		$data['page_title']="contact_us";

		$this->load->view('front/front_header');
		$this->load->view('front/contact',$data);
		$this->load->view('front/front_footer');
	}
	//code for sign up user
	public function signUp()
	{
		if(isset($_POST['btn_signup']))
		{
			
			#print_r($_POST);exit;
			$this->form_validation->set_rules('fullName','Full Name','required');
			//$this->form_validation->set_rules('banner_maincategoryid','Banner Category','required');
			$this->form_validation->set_rules('mobileNo','Mobile Number','required');

			if($this->form_validation->run())
			{
				$fullName=$this->input->post('fullName');
				$mobileNo=$this->input->post('mobileNo');
				//$banner_url=$this->input->post('banner_url');
				$emailAddress=$this->input->post('emailAddress');
				$emergencyno=$this->input->post('emergencyno');
				$banner_type='App';
				$address=$this->input->post('address');
			    $selectGender=$this->input->post('selectGender');
			    $selectWeight=$this->input->post('selectWeight');
			    $mobilityAid=$this->input->post('mobilityAid');
			    $idNumber=$this->input->post('idNumber');
			    $medicalHistory=$this->input->post('medicalHistory');

				$chk_exist=$this->Home_model->chkExistUser($emailAddress,$mobileNo,0);

				if($chk_exist > 0)
				{
					$this->session->set_flashdata('error','User is already exist.');
					redirect(base_url().'Home/signUp');	
				}
				else
				{
					$front_id_file='';
					if(isset($_FILES['front_id_file']))
					{
						if($_FILES['front_id_file']['name']!="")
						{
							$photo_imagename='';
							$new_image_name = rand(1, 99999).$_FILES['front_id_file']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('front_id_file'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['front_id_file']['error']==0)
							{ 
								$front_id_file=$photo_imagename;
							}
						}
					}
					$front_id_file_es='';
					if(isset($_FILES['front_id_file_es']))
					{
						if($_FILES['front_id_file_es']['name']!="")
						{
							$photo_imagename1='';
							$new_image_name = rand(1, 99999).$_FILES['front_id_file_es']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('front_id_file_es'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename1 =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['front_id_file_es']['error']==0)
							{ 
								$front_id_file_es=$photo_imagename1;
							}
						}
					}

					$back_id_file='';
					if(isset($_FILES['back_id_file']))
					{
						if($_FILES['back_id_file']['name']!="")
						{
							$photo_imagename='';
							$new_image_name = rand(1, 99999).$_FILES['back_id_file']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('back_id_file'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['front_id_file']['error']==0)
							{ 
								$front_id_file=$photo_imagename;
							}
						}
					}
					$back_id_file_es='';
					if(isset($_FILES['back_id_file_es']))
					{
						if($_FILES['back_id_file_es']['name']!="")
						{
							$photo_imagename1='';
							$new_image_name = rand(1, 99999).$_FILES['back_id_file_es']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('back_id_file_es'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename1 =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['back_id_file_es']['error']==0)
							{ 
								$back_id_file_es=$photo_imagename1;
							}
						}
					}
					$input_data=array(
										'full_name'=>$fullName,
										'email'=>$emailAddress,
										'mobile'=>$mobileNo,
										'alt_mobile'=>$emergencyno,
										'gender'=>$selectGender,
										'id_proof_front'=>$front_id_file,
										'id_proof_back'=>$back_id_file,
										'id_proof_no'=>$idNumber,
										'medical_history'=>$medicalHistory,
										'weight'=>$selectWeight,
										'mobility_aid'=>$mobilityAid,
										'address'=>$address,
										'user_type'=>"Customer",
										'is_verify'=>'no',
										'status_flag'=>'Active',
										'added_date'=>date('Y-m-d H:i:s'),
										'edit_date'=>date('Y-m-d H:i:s')
									);
					
					$banner_id=$this->Home_model->add_card($input_data);
					//echo $this->db->last_query();exit;
					if($banner_id>0)
					{
						$input_data_ch=array(
							'user_id'=>$banner_id,
							'full_name'=>$fullName,
							'email'=>$emailAddress,
							'mobile'=>$mobileNo,
							'alt_mobile'=>$emergencyno,
							'gender'=>$selectGender,
							'id_proof_front'=>$front_id_file_es,
							'id_proof_back'=>$back_id_file_es,
							'id_proof_no'=>$idNumber,
							'medical_history'=>$medicalHistory,
							'weight'=>$selectWeight,
							'mobility_aid'=>$mobilityAid,
							'address'=>$address,
							'user_type'=>"Customer",
							'id_proof_front'=>$front_id_file_es,
							'status_flag'=>'Active',
							'added_date'=>date('Y-m-d H:i:s'),
							'edit_date'=>date('Y-m-d H:i:s')
						);
		
						$banner_id=$this->Home_model->add_customer_ch($input_data_ch);

						$this->session->set_flashdata('success','Registered successfully.');
						redirect(base_url().'Home/signUp');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while registration.');
						redirect(base_url().'Home/signUp');	
					}
				}
					
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Home/signUp');
			}
		}
		$this->load->view('front/front_header');
		$this->load->view('front/signup');
		$this->load->view('front/front_footer');
	}
	//code for login user
	public function login()
	{

		if(isset($_POST['btn_login']))
		{
			$this->form_validation->set_rules('phone_no','Phone Number','required');

				if($this->form_validation->run())
				{

					$phone_no=$this->input->post('phone_no');

					$userdata=$this->Home_model->getUserDataByMobileno($phone_no,1);

					if(isset($userdata) && count($userdata)>0)
					{
						if($userdata['is_verify']=="no")
						{
							//$rnd=rand(pow(10, 3),pow(10, 4)-1);// Crate 4 Digit Random Number for OTP 
							$rnd = "1234";
							//$x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							//$updateData['utoken'] 		= md5(substr(str_shuffle($x), 0, 5));
							$updateData['mobile_otp'] 	= $rnd;
							//$updateData['fcm_token'] 	= $fcm_token;
							$updateOtp 					= $this->Home_model->updateData($userdata['user_id'],$updateData);
							$strMessage  = urlencode("OTP for your login is $rnd . Do not share it with anyone.");
							// if(isset($userdata['mobile']))
							// {
							// 	$this->load->helper('commonfunctions_helper');
							// 	$strMessageSid  = fnSendSms($strMessage,$userdata['mobile']);
							// }
							$this->session->set_flashdata('success','OTP sent successfully.');
							redirect('Home/verify_otp/'.base64_encode($userdata['user_id']), 'refresh');
						}
						else
						{
							//$user_profile=
							$session_data = array('user_id' => $userdata['user_id'],
											'full_name' => $userdata['full_name'],
											'email' => $userdata['email'],
											'mobile' => $userdata['mobile'],
											'profile_pic' => $userdata['profile_pic'],
											'gender' => $userdata['gender'],
											'is_verify' => $userdata['is_verify'],
											'user_type' => $userdata['user_type'],
											'status_flag'=>$userdata['status_flag']);
								
								$this->session->set_userdata('logged_in', $session_data);
								redirect('Dashboard/index', 'refresh');
						}
					}
					else
					{
						$this->session->set_flashdata('error','User does not exist.');
						redirect(base_url().'Home/login');	
					}
					
				}
				else
				{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url().'Home/signUp');
				}

		}

		$this->load->view('front/front_header');
		$this->load->view('front/login');
		$this->load->view('front/front_footer');
	}

	//code for login user
	public function verify_otp($user_id=0)
	{
		$user_id=base64_decode($user_id);
		if(isset($_POST['btn_verify_otp']))
		{
			$mobile_otp=$this->input->post('mobile_otp');
			//$user_id=$this->input->post('user_id');

			$userdata=$this->Home_model->getCheckOtp($user_id,$mobile_otp,1);
			if(isset($userdata) && count($userdata)>0)
			{
				$updateData['is_verify'] 	= "yes";
				//$updateData['fcm_token'] 	= $fcm_token;
				$updateOtp 					= $this->Home_model->updateData($userdata['user_id'],$updateData);
				

				$session_data = array('user_id' => $userdata['user_id'],
											'full_name' => $userdata['full_name'],
											'email' => $userdata['email'],
											'mobile' => $userdata['mobile'],
											'profile_pic' => $userdata['profile_pic'],
											'gender' => $userdata['gender'],
											'is_verify' => $userdata['is_verify'],
											'user_type' => $userdata['user_type'],
											'status_flag'=>$userdata['status_flag']);
								
								$this->session->set_userdata('logged_in', $session_data);
								
				$this->session->set_flashdata('success','Welcome '.$userdata['full_name'].'.');
				redirect('Dashboard/index', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('error','OTP does not exist.');
				redirect(base_url().'Home/verify_otp/'.base64_encode($user_id));	
			}
		}
		$data['user_id']=$user_id;
		
		$this->load->view('front/front_header');
		$this->load->view('front/verify_otp',$data);
		$this->load->view('front/front_footer');
	}

	//code for login user
	public function resendOtp($user_id=0)
	{
		$user_id=base64_decode($user_id);

		$userdata=$this->Home_model->getUserProfileInfo($user_id,1);
		
		if(isset($userdata) && count($userdata)>0)
		{
			
				$rnd=rand(pow(10, 3),pow(10, 4)-1);// Crate 4 Digit Random Number for OTP 
				$rnd = "1234";
				//$x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				//$updateData['utoken'] 		= md5(substr(str_shuffle($x), 0, 5));
				$updateData['mobile_otp'] 	= $rnd;
				//$updateData['fcm_token'] 	= $fcm_token;
				$updateOtp 					= $this->Home_model->updateData($userdata['user_id'],$updateData);
				
				$strMessage  = urlencode("OTP for your login is $rnd . Do not share it with anyone.");
				// if(isset($userdata['mobile']))
				// {
				// 	$this->load->helper('commonfunctions_helper');
				// 	$strMessageSid  = fnSendSms($strMessage,$userdata['mobile']);
				// }
				$this->session->set_flashdata('success','OTP sent successfully.');
				redirect('Home/verify_otp/'.base64_encode($userdata['user_id']), 'refresh');
			
		}

		$data['user_id']=$user_id;
		
		$this->load->view('front/front_header');
		$this->load->view('front/verify_otp',$user_id);
		$this->load->view('front/front_footer');
	}
	//code for logout user
	public function signOut()
	{
		$this->session->unset_userdata('logged_in');

		redirect('Home', 'refresh');
			

	}

	//code for my profile details
	public function myProfile()
	{
		$sessiondata=$this->session->userdata('logged_in');

		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		
		$userdata=$this->Home_model->getUserProfileInfo($user_id,1);
			
		$data['userdata']=$userdata;
		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('front/front_header');
		$this->load->view('front/my_profile',$data);
		$this->load->view('front/front_footer');
	}

	//code for edit profile details
	public function editProfile()
	{
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		if(isset($_POST['btn_signup']))
		{
			
			#print_r($_POST);exit;
			$this->form_validation->set_rules('fullName','Full Name','required');
			//$this->form_validation->set_rules('banner_maincategoryid','Banner Category','required');
			$this->form_validation->set_rules('mobileNo','Mobile Number','required');

			if($this->form_validation->run())
			{
				$fullName=$this->input->post('fullName');
				$mobileNo=$this->input->post('mobileNo');
				//$banner_url=$this->input->post('banner_url');
				$emailAddress=$this->input->post('emailAddress');
				$emergencyno=$this->input->post('emergencyno');
				$banner_type='App';
				$address=$this->input->post('address');
			    $selectGender=$this->input->post('selectGender');
			    $selectWeight=$this->input->post('selectWeight');
			    $mobilityAid=$this->input->post('mobilityAid');
			    $idNumber=$this->input->post('idNumber');
			    $medicalHistory=$this->input->post('medicalHistory');
			    $hide_front_id_file=$this->input->post('hide_front_id_file');
			    $hide_back_id_file=$this->input->post('hide_back_id_file');
			    $hide_profile_photo=$this->input->post('hide_profile_photo');

				$profile_pic_file='';
				if(isset($_FILES['profile_pic']))
				{
					
					if($_FILES['profile_pic']['name']!="")
					{
						$photo_imagename='';
						$new_image_name = rand(1, 99999).$_FILES['profile_pic']['name'];
						$config = array(
								'upload_path' => "uploads/user/profile_photo/",
								'allowed_types' => "gif|jpg|png|bmp|jpeg",
								'max_size' => "0", 
								'file_name' =>$new_image_name
								);
						$this->load->library('upload', $config);
						if($this->upload->do_upload('profile_pic'))
						{ 
							$imageDetailArray = $this->upload->data();								
							$photo_imagename =  $imageDetailArray['file_name'];
						}
						else
						{
							//echo $this->upload->display_errors();
						}
						if($_FILES['profile_pic']['error']==0)
						{ 
							$profile_pic_file=$photo_imagename;
						}
						else
						{
							$profile_pic_file=$hide_profile_photo;
						}
					}
					else
					{
						$profile_pic_file=$hide_profile_photo;
					}
				}
				else
				{
					
					$profile_pic_file=$hide_profile_photo;
				}
				
					$front_id_file='';
					if(isset($_FILES['front_id_file']))
					{
						
						if($_FILES['front_id_file']['name']!="")
						{
							$photo_imagename='';
							$new_image_name = rand(1, 99999).$_FILES['front_id_file']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('front_id_file'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['front_id_file']['error']==0)
							{ 
								$front_id_file=$photo_imagename;
							}
							else
							{
								$front_id_file=$hide_front_id_file;
							}
						}
						else
						{
							$front_id_file=$hide_front_id_file;
						}
					}
					else
					{
						
						$front_id_file=$hide_front_id_file;
					}
					
					$front_id_file_es='';
					if(isset($_FILES['front_id_file_es']))
					{
						if($_FILES['front_id_file_es']['name']!="")
						{
							$photo_imagename1='';
							$new_image_name = rand(1, 99999).$_FILES['front_id_file_es']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('front_id_file_es'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename1 =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['front_id_file_es']['error']==0)
							{ 
								$front_id_file_es=$photo_imagename1;
							}
							else
							{
								$front_id_file_es=$hide_front_id_file;
							}
						}
						else
						{
							$front_id_file_es=$hide_front_id_file;
						}
					}
					else
					{
						$front_id_file_es=$hide_front_id_file;
					}

					$back_id_file='';
					if(isset($_FILES['back_id_file']))
					{
						if($_FILES['back_id_file']['name']!="")
						{
							$photo_imagename='';
							$new_image_name = rand(1, 99999).$_FILES['back_id_file']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('back_id_file'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['back_id_file']['error']==0)
							{ 
								$back_id_file=$photo_imagename;
							}
							else
							{
								$back_id_file=$hide_back_id_file;
							}
						}
						else
						{
							$back_id_file=$hide_back_id_file;
						}
					}
					else
					{
						$back_id_file=$hide_back_id_file;
					}
					$back_id_file_es='';
					if(isset($_FILES['back_id_file_es']))
					{
						if($_FILES['back_id_file_es']['name']!="")
						{
							$photo_imagename1='';
							$new_image_name = rand(1, 99999).$_FILES['back_id_file_es']['name'];
							$config = array(
									'upload_path' => "uploads/id_proof/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('back_id_file_es'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename1 =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['back_id_file_es']['error']==0)
							{ 
								$back_id_file_es=$photo_imagename1;
							}
							else
							{
								$back_id_file_es=$hide_back_id_file;
							}
						}
						else
						{
							$back_id_file_es=$hide_back_id_file;
						}
					}
					else
					{
						$back_id_file_es=$hide_back_id_file;
					}
					
					$input_data=array(
										'full_name'=>$fullName,
										'profile_pic'=>$profile_pic_file,
										'email'=>$emailAddress,
										'mobile'=>$mobileNo,
										'alt_mobile'=>$emergencyno,
										'gender'=>$selectGender,
										'id_proof_front'=>$front_id_file,
										'id_proof_back'=>$back_id_file,
										'id_proof_no'=>$idNumber,
										'medical_history'=>$medicalHistory,
										'weight'=>$selectWeight,
										'mobility_aid'=>$mobilityAid,
										'address'=>$address,
										'user_type'=>"Customer",
										'is_verify'=>'no',
										'status_flag'=>'Active',
										'added_date'=>date('Y-m-d H:i:s'),
										'edit_date'=>date('Y-m-d H:i:s')
									);
					
					$banner_id=$this->Home_model->updateData($user_id,$input_data);
					//echo $this->db->last_query();exit;
					if($user_id>0)
					{
						$input_data_ch=array(
							'user_id'=>$user_id,
							'full_name'=>$fullName,
							'profile_pic'=>$profile_pic_file,
							'email'=>$emailAddress,
							'mobile'=>$mobileNo,
							'alt_mobile'=>$emergencyno,
							'gender'=>$selectGender,
							'id_proof_front'=>$front_id_file_es,
							'id_proof_back'=>$back_id_file_es,
							'id_proof_no'=>$idNumber,
							'medical_history'=>$medicalHistory,
							'weight'=>$selectWeight,
							'mobility_aid'=>$mobilityAid,
							'address'=>$address,
							'user_type'=>"Customer",
							'id_proof_front'=>$front_id_file_es,
							'status_flag'=>'Active',
							'added_date'=>date('Y-m-d H:i:s'),
							'edit_date'=>date('Y-m-d H:i:s')
						);
		
						$banner_id=$this->Home_model->updateDataEs($user_id,$input_data_ch);

						$session_data = array('user_id' =>$user_id,
											'full_name' => $fullName,
											'email' => $emailAddress,
											'mobile' => $mobileNo,
											'profile_pic' => $profile_pic_file,
											'gender' => $selectGender,
											'is_verify' => "yes",
											'user_type' => "Customer",
											'status_flag'=>"active");
								
								$this->session->set_userdata('logged_in', $session_data);

						$this->session->set_flashdata('success','User details updated successfully.');
						redirect(base_url().'Home/editProfile');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while updating.');
						redirect(base_url().'Home/editProfile');	
					}
				
					
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Home/editProfile');
			}
		}
		
		
		$userdata=$this->Home_model->getUserProfileInfo($user_id,1);
			
		$data['userdata']=$userdata;
		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('front/front_header');
		$this->load->view('front/edit_profile',$data);
		$this->load->view('front/front_footer');
	}

	//code for service booking
	public function bookService($category=0)
	{
		$data['title']="Service Booking";
		$data['page_title']="book_service";
		
		$cookie_name = 'site_lang';
		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['category_id']=$category;
		$data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);
		$data['doctorList']=$doctorList=$this->Home_model->getDoctorList($user_id,1,$lang);
		$data['selectedAddress']=$selectedAddress=$this->Home_model->getSelectedPickupAddress($user_id,1,$lang);
		$data['selectedDropAddress']=$selectedDropAddress=$this->Home_model->getSelectedDropAddress($user_id,1,$lang);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);

		// print_r($data['selectedAddress']);
		// exit;
		$this->load->view('front/front_header');
		if($category==1 || $category==2)
		{
			$this->load->view('front/service_booking',$data);
		}
		else
		{
			$this->load->view('front/doctor_booking_list',$data);
		}
		$this->load->view('front/front_footer');
	}

	//code for service booking
	public function getTimeSlot()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	

		$booking_date=$_POST['booking_date'];
		$todays_date=date("Y-m-d");

		$current_time=date("H:i");
		$StartTime    ="";
		$EndTime      ="";
		$ReturnArray = array ();// Define output
		$duration="60";
		if($todays_date==$booking_date)
		{
			$StartTime    = strtotime ($booking_date." "."00:00"); //Get Timestamp
			$EndTime      = strtotime ($booking_date." "."23:59"); //Get Timestamp
		}
		else
		{
			$StartTime    = strtotime ($booking_date." 00:00"); //Get Timestamp
			$EndTime      = strtotime ($booking_date." "."23:59"); //Get Timestamp
		}
		
	
		$AddMins  = $duration * 60;
		
		while ($StartTime <= $EndTime) //Run loop
		{
			$ReturnArray[] = date ("G:i", $StartTime);
			$StartTime += $AddMins; //Endtime check
		 }
		//  print_r($ReturnArray);
		//  exit;
		$todaysdate=date("Y-m-d");
		$todaysTime=date("H:i");
		$flagechk=0;
		$output='<label for="SelectGender" class="form-label">Select Time slot</label>
					<div class="contact-form-style mb-20" >';
		if(count($ReturnArray)>0)
		{
			$cnt=0;
			foreach($ReturnArray as $row)
			{
				$cnt++;
				$todate= date('h:i A', strtotime($row));
				if($booking_date >= $todaysdate)
				{
					$output.=' <div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Timeslot" id="Timeslot1'.$cnt.'" value="'.$todate.'" onclick="setBookingTime('.$cnt.')" checked>
									<label class="form-check-label" for="Timeslot1">'.$todate.'</label>
								</div>';
				}
				else
				{
					$flagechk=1;
				}
				
			}
		}
		$output.='</div>';
		if($flagechk==1)
		{
			$output='<label for="SelectGender" class="form-label" style="color:red;">Time is not available for previous date. Please select another date</label>';
		}
		echo $output;
	}

	//code for select address
	public function getSelectAddress()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$id=$_POST['id'];

		$updatedata=array(
			"is_seleted"=>0,
		);
		//$this->db->where('address_id',$id);
		$this->db->update('loba_adresses',$updatedata);
		
		$updatedata=array(
			"is_seleted"=>1,
		);
		$this->db->where('address_id',$id);
		$this->db->update('loba_adresses',$updatedata);

		$cookie_name = 'site_lang';
		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$data['userAddresses']=$userAddresses=$this->Home_model->getUserAddreess($user_id,1,$lang);
		
		
		$output='';
		if(count($userAddresses)>0)
		{
			foreach($userAddresses as $row)
			{
				
					$output.='<tr style="width: 100%;" onclick="getSelectAddress('.$row['address_id'].')">
									<td style="width: 20%;">'.$row['address_type'].'</td>
									<td style="width: 60%;">'.$row['address1'].' '.$row['address2'].'</td>
									<td style="width: 20%;">';
									if($row['is_seleted']==1){
										$output.='<i style="margin-top: 5px;font-size: 20px;color:green;" class="fa fa-check"></i>';
									 } 

									 $output.='</td>
								</tr>';
				
				
			}
		}
		
		echo $output;
	}

	//code for select drop address
	public function getSelectDropAddress()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$id=$_POST['id'];

		$updatedata=array(
			"is_selected_drop"=>0,
		);
		//$this->db->where('address_id',$id);
		$this->db->update('loba_adresses',$updatedata);
		
		$updatedata=array(
			"is_selected_drop"=>1,
		);
		$this->db->where('address_id',$id);
		$this->db->update('loba_adresses',$updatedata);
		$cookie_name = 'site_lang';
		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$data['userAddresses']=$userAddresses=$this->Home_model->getUserAddreess($user_id,1,$lang);
		
		
		$output='';
		if(count($userAddresses)>0)
		{
			foreach($userAddresses as $row)
			{
				
					$output.='<tr style="width: 100%;" onclick="getSelectDropAddress('.$row['address_id'].')">
									<td style="width: 20%;">'.$row['address_type'].'</td>
									<td style="width: 60%;">'.$row['address1'].' '.$row['address2'].'</td>
									<td style="width: 20%;">';
									if($row['is_selected_drop']==1){
										$output.='<i style="margin-top: 5px;font-size: 20px;color:green;" class="fa fa-check"></i>';
									 } 

									 $output.='</td>
								</tr>';
				
				
			}
		}
		
		echo $output;
	}

	//code for select drop address
	public function getAddAddress()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}

		$type=$_POST['type'];
		$address=$_POST['address'];
		$pickup_latitude=$_POST['pickup_latitude'];
		$pickup_longitude=$_POST['pickup_longitude'];

		$updatedata=array(
			"address_type"=>$type,
			"address1"=>$address,
			"address_lat"=>$pickup_latitude,
			"address_lng"=>$pickup_longitude,
			"user_id"=>$user_id,
		);
		//$this->db->where('address_id',$id);
		$this->db->insert('loba_adresses',$updatedata);
		$insert_id=$this->db->insert_id();
		echo $insert_id;
		
	}

	//code for add booking
	public function addBooking()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}

		$pickup_address_id=$_POST['pickup_address_id'];
		$drop_address_id=$_POST['drop_address_id'];
		$category_id=$_POST['category_id'];
		$booking_time=$_POST['booking_time'];
		$booking_date=$_POST['booking_date'];
		$NoofHours=$_POST['NoofHours'];
		$MobilityAid=$_POST['MobilityAid'];
		$booking_id=$_POST['booking_id'];
		if($booking_id > 0)
        {
            $updatedata=array(
				"service_category_id"=>$category_id,
				"session_id"=>$user_id,
				"user_id"=>$user_id,
				"pickup_address_id"=>$pickup_address_id,
				"drop_address_id"=>$drop_address_id,
				"pickup_type"=>"",
				"drop_type"=>"",
				"booking_date"=>$booking_date,
				"time_slot"=>$booking_time,
				"no_of_hourse"=>$NoofHours,
				"select_mobility_aid"=>$MobilityAid,
				"booking_status"=>"pending",
				"date_added"=>$user_id,
				"date_updated"=>$user_id,
            );
            $this->db->where('booking_id',$booking_id);
            $this->db->update('loba_service_booking',$updatedata);
            //$insert_id=$this->db->insert_id();

            echo $updatedata;

        }
        else
        {
				$updatedata=array(
					"service_category_id"=>$category_id,
					"session_id"=>$user_id,
					"user_id"=>$user_id,
					"pickup_address_id"=>$pickup_address_id,
					"drop_address_id"=>$drop_address_id,
					"pickup_type"=>"",
					"drop_type"=>"",
					"booking_date"=>$booking_date,
					"time_slot"=>$booking_time,
					"no_of_hourse"=>$NoofHours,
					"select_mobility_aid"=>$MobilityAid,
					"booking_status"=>"pending",
					"date_added"=>$user_id,
					"date_updated"=>$user_id,
				);
				//$this->db->where('address_id',$id);
				$this->db->insert('loba_service_booking',$updatedata);
				$insert_id=$this->db->insert_id();
				echo $insert_id;
		}
		
	}
	
	//code for booking details
	public function bookingDetails()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		$data['promoCode']=$promoCode=$this->Home_model->getPromoCode($bookingData['service_category_id'],1);

		// echo "<pre>";
		// print_r($bookingData['service_category_id']);
		// exit;
		$data['user_id']=$user_id;

		
		if(isset($_POST['btn_pay_now']))
		{
			redirect('Home/cardList');
		}
		$this->load->view('front/front_header');
		$this->load->view('front/orderPlace',$data);
		$this->load->view('front/front_footer');
	}
	//code for place order
	public function placeOrder()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		if(isset($_POST['btn_pay_now']))
		{
			$total_order_amount=$_POST['category_amount'];
			$order_place_amt=$final_amount=$_POST['final_amount'];
			$order_status="pending";
			$arrOrderData = array(
				"user_id"     	 => $user_id,
				"booking_id"     	 => $bookingData['booking_id'],
				"offer_id"=>0,
				'coupon_code'=>"",
				'offer_amount'=>round(0,2),
				'offer_percentage'=>"",
				'total_order_amount'=>round($total_order_amount,2),
				"order_place_amt"      => round($final_amount,2),
				"admin_commision"		=>round(0,2),
				"comment"      => "",
				"booking_date"=>$bookingData['booking_date'],
				"booking_time"=>$bookingData['time_slot'],
				"order_date"      => date('Y-m-d H:i:s'),
				"order_status"      => $order_status,
				
				"dateadded"      => date('Y-m-d H:i:s'),
				"dateupdated"    => date('Y-m-d H:i:s'),
			);
			$intOrderId   = $this->Home_model->addOrder($arrOrderData);

			//print_r($arrOrderData);exit;
			if($intOrderId > 0)
			{
				$transaction_id = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

						$main_order_no="LOBA-ORD-".$intOrderId;
					
					$payment_type = "stripe";
					
					// print_r($_POST);
					// exit;
					$payment_status = "pending";
					if($payment_type == "stripe" && $final_amount >=1)
					{
						if(is_array($userData) && count($userData) > 0){
							$strUserName = $userData['full_name'];
							$strUserEmail = $userData['email'];
							$strUserPhone = $userData['mobile'];
							
						}
						require_once('application/libraries/stripe-php/init.php');
									$strAccountId  = "";
									
									
									//$stripe = new \Stripe\StripeClient('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');
									$stripe = new \Stripe\StripeClient('sk_test_51NSHCBSDcd5hYqkEWmY8zKQZXuv4PNuoii4wbG3oPg01qaxdPmwFIkBVJ7bXEUqEhhV06bw0Qc88dkZpy7nyao4A00NYLKAYhR');
									
									$customer = $stripe->customers->create([
															'description' => $strUserName,
															'name' => $strUserName,
															'phone' => $strUserPhone,
															'email' => $strUserEmail,
															['metadata' => ['order_id' => $intOrderId]],
															//['shipping' => ['address' => ['line1' => $strUserAddress1]]],
															//['shipping' => ['address' => ['city' => $strUserCity]]],

															//'shipping.address.line1' => $strUserAddress1,
															//'shipping.address.line2' => $strUserAddress2,
															//'shipping.address.city' => $strUserCity,
															//'shipping.address.state' => $strUserState,
															//'payment_method' => 'pm_card_visa',
														]);
														
												//['stripe_account' => $strAccountId]		
									  //\Stripe\Stripe::setApiKey('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');		
									  \Stripe\Stripe::setApiKey('sk_test_51NSHCBSDcd5hYqkEWmY8zKQZXuv4PNuoii4wbG3oPg01qaxdPmwFIkBVJ7bXEUqEhhV06bw0Qc88dkZpy7nyao4A00NYLKAYhR');		
									
									$argument = array( 
														 'payment_method_types' => ['card'],
														  'amount' => round($order_place_amt,2)*100,
														  'currency' => 'EUR',
														  'customer' =>  $customer->id,
														array('metadata' => array('order_id' => $intOrderId,'transaction_id' => $transaction_id))
													);
									
									#echo "<pre>"; print_r($strAccountId); 
									#echo "<pre>"; print_r($argument); 	#,['stripe_account' => $strAccountId]			
									$paymentIntent = \Stripe\PaymentIntent::create
																			(
																				$argument
																			);
									//print_r($paymentIntent); exit;
									
									#echo "<pre>"; print_r($paymentIntent); exit;
									$clientSecret = 	$paymentIntent->client_secret;
									$output = [
												'clientSecret' => $paymentIntent->client_secret,
											  ];				  
										  
									// $arrOrderTxnData = array(
									// 						"user_id"     	 	 => $uid,
									// 						"rst_id"     	 	 => $rst_id,
									// 						"order_id"     	 	 => $intOrderId,
									// 						"transaction_id" 	 => $transaction_id,
									// 						"payment_type"   	 => $payment_type,
									// 						"payment_response"   => $payment_response,
									// 						"order_selling_amount"  => round($totsellingprice,2),
									// 						"addons_amount"      => round($addonsTotal,2),
									// 						"total_order_amount"  => round($order_place_amt,2),
									// 						"offer_id"=>$offer_id,
									// 						'offer_amount'=>round($offer_amount,2),
									// 						'offer_percentage'=>$offer_percentage,
									// 						"payment_status"   	 => $payment_status,
									// 						"dateadded"     	 => date('Y-m-d H:i:s'),
									// 						"dateupdated"    => date('Y-m-d H:i:s'),
									// 				);			
					}
			}
		}
		// echo "<pre>";
		// print_r($data);
		// exit;
		$data['user_id']=$user_id;
		$this->load->view('front/front_header');
		$this->load->view('front/orderPlace',$data);
		$this->load->view('front/front_footer');
	}
	//code for place order
	public function placeOrder_old_stripe()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		if(isset($_POST['btn_pay_now']))
		{
			$total_order_amount=$_POST['category_amount'];
			$order_place_amt=$final_amount=$_POST['final_amount'];
			$order_status="pending";
			$arrOrderData = array(
				"user_id"     	 => $user_id,
				"booking_id"     	 => $bookingData['booking_id'],
				"offer_id"=>0,
				'coupon_code'=>"",
				'offer_amount'=>round(0,2),
				'offer_percentage'=>"",
				'total_order_amount'=>round($total_order_amount,2),
				"order_place_amt"      => round($final_amount,2),
				"admin_commision"		=>round(0,2),
				"comment"      => "",
				"booking_date"=>$bookingData['booking_date'],
				"booking_time"=>$bookingData['time_slot'],
				"order_date"      => date('Y-m-d H:i:s'),
				"order_status"      => $order_status,
				
				"dateadded"      => date('Y-m-d H:i:s'),
				"dateupdated"    => date('Y-m-d H:i:s'),
			);
			$intOrderId   = $this->Home_model->addOrder($arrOrderData);

			//print_r($arrOrderData);exit;
			if($intOrderId > 0)
			{
				$transaction_id = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

						$main_order_no="LOBA-ORD-".$intOrderId;
					
					$payment_type = "stripe";
					
					// print_r($_POST);
					// exit;
					$payment_status = "pending";
					if($payment_type == "stripe" && $final_amount >=1)
					{
							if(is_array($userData) && count($userData) > 0){
								$strUserName = $userData['full_name'];
								$strUserEmail = $userData['email'];
								$strUserPhone = $userData['mobile'];
								
							}
							?>	
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 							
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
					<script src="https://checkout.stripe.com/checkout.js"></script>
							<script type="text/javascript">
							var handler = StripeCheckout.configure({
							  key: 'pk_test_51NSHCBSDcd5hYqkEuTX6SvY1ywEFGD1N4Kjptvo3bnXW6wkyl8WFoOaPhfHwftdp8KE2y44VFayW3cuy4TTubXia00v97Zqorq',
							  locale: 'auto',
							  token: function (token) { //alert(token);
								// You can access the token ID with `token.id`.
								// Get the token ID to your server-side code for use.
								//console.log('Token Created!!');
								//console.log(token)
								$('#token_response').html(JSON.stringify(token));
						
								$.ajax({
								  url:"<?php echo base_url(); ?>Home/payment",
								  method: 'post',
								  data: { tokenId: token.id, amount: <?php echo $final_amount;?>, user_id: <?php echo $user_id;?>, txnid:'<?php echo $transaction_id;?>', order_id:<?php echo $intOrderId;?> },
								  dataType: "json",
								  success: function( response ) 
								  {
									  //alert(response);
									//   var strUrl = "<?php echo base_url()?>Home/orderconfirm/<?php echo base64_encode($user_id); ?>/<?php echo base64_encode($intOrderId); ?>";
									//   window.location.href =  strUrl;
									//console.log(response); //alert(response.data);
									$('#token_response').append( '<br />' + JSON.stringify(response));
								  }
								})
							  }
							});
						   
							handler.open({
							  name: 'Courier',
							  description: 'Stripe Payment',
							  amount: <?php echo $final_amount;?> * 100
							});
							</script>				
								
			<?php	}
			}
		}
		// echo "<pre>";
		// print_r($data);
		// exit;
		$data['user_id']=$user_id;
		$this->load->view('front/front_header');
		$this->load->view('front/orderPlace',$data);
		$this->load->view('front/front_footer');
	}

	//code for stripe payment
	public function payment()
    {
		#print_r($_POST);exit;
		ini_set("display_errors",1);
		error_reporting(E_ALL);	
		require_once('application/libraries/stripe-php/init.php');
		$intOrderId = $this->input->post('order_id');
		$intTxnId = $this->input->post('txnid');
		$user_id = $this->input->post('user_id');
		try 
		{
			\Stripe\Stripe::setApiKey('sk_test_51NSHCBSDcd5hYqkEWmY8zKQZXuv4PNuoii4wbG3oPg01qaxdPmwFIkBVJ7bXEUqEhhV06bw0Qc88dkZpy7nyao4A00NYLKAYhR');
			$charge = \Stripe\Charge::create([
			  'amount' => $this->input->post('amount'),
			  'currency' => 'inr',
			  'description' => $intOrderId,
			  'source' => $this->input->post('tokenId'),
			  'metadata' => ['order_id' => $this->input->post('order_id')],
			]);	
			#echo "<pre>"; print_r($charge);
			#print $charge['status'];
			#exit;
			$strPaymentStatus= $charge['status'];
			#print $strPaymentStatus; exit;
			if($strPaymentStatus == 'succeeded')
			{
				$response = json_encode($charge);
				$intStripeId = $charge['id'];
				
				$arrUpdateTransac = array(
											"transaction_id"=>$intTxnId,
											"order_id"=>$intOrderId,
											"stripe_pay_id"=>$intStripeId,
											//"payment_from"=>$strPaymentFrom,
											"payment_status"=>$strPaymentStatus,
											"payment_response"=>$response,
											"dateupdated"=>date("Y-m-d H:i:s")
										);
				$result   = $this->Home_model->updatePayStatus($arrUpdateTransac);
				
				$this->Home_model->updateOrderStatus($intOrderId);
				#echo $this->db->last_query();
				
			}
			else
			{
				$response = json_encode($charge);
				$intStripeId = $charge['id'];
				$arrUpdateTransac = array(
											"transaction_id"=>$intTxnId,
											"order_id"=>$intOrderId,
											"stripe_pay_id"=>$intStripeId,
											//"payment_from"=>$strPaymentFrom,
											"payment_status"=>$strPaymentStatus,
											"payment_response"=>$response,
											"dateupdated"=>date("Y-m-d H:i:s")
									   );
				$result   = $this->Home_model->updatePayStatus($arrUpdateTransac);
			}
			#redirect(base_url().'Userorder/orderconfirm/'.base64_encode($rst_id).'/'.base64_encode($user_id));
			$data['data'] = $arrUpdateTransac;
			echo json_encode($arrUpdateTransac);exit;
	  }
	  catch (Error $e) 
	{
		http_response_code(500);
		echo json_encode(['error' => $e->getMessage()]);
	}
	echo json_encode($data);

    }	

	//code for order confirm
	public function orderconfirm()
	{
		$user_id=base64_decode($this->uri->segment(3));
		$intOrderId=base64_decode($this->uri->segment(4));
		if($user_id>0 && $intOrderId>0)
		{
			/* mail send for admin */
			$arradminDetails = $this->Shippingsupplies_model->getAdminDetails();
			$arrproudctorder   = $this->Shippingsupplies_model->getProductOrderList($intOrderId);
			#echo $this->db->last_query();exit;
			if(isset($arrproudctorder) && count($arrproudctorder)>0)
			{
				$main_order_no=$arrproudctorder[0]['order_no'];
				$custAddress=$arrproudctorder[0]['address_type']."".$arrproudctorder[0]['street_address']."".$arrproudctorder[0]['city']."".$arrproudctorder[0]['state']."".$arrproudctorder[0]['country']."".$arrproudctorder[0]['zip_code'];
				$delivery_charges=$arrproudctorder[0]['delivery_charges'];
				$order_amount=$arrproudctorder[0]['order_amount'];
				$item_total=$arrproudctorder[0]['item_total'];
			}
			$arrcustDetails = $this->Shippingsupplies_model->getCustomerDetails($user_id);
			if(isset($arrcustDetails) && count($arrcustDetails)>0)
			{
				$fullname=$arrcustDetails[0]['fullname'];
				$mobilenumber=$arrcustDetails[0]['mobilenumber'];
				$strCustomerEmail=$arrcustDetails[0]['emailaddress'];
			}
			$arrorderdetails   = $this->Shippingsupplies_model->getProductDetailsList($intOrderId);
			$base_pat=base_url();
			if(is_array($arradminDetails) && count($arradminDetails) > 0)
			{
				$strSubject = "Courier new order received";
				
				$strAdminEmail = $arradminDetails[0]['admin_email'];
				$strAdminName = $arradminDetails[0]['admin_name'];
				$email_order_no=$main_order_no;
				$strCustName = $fullname;
				$strCustMobileNumber = $mobilenumber;
				/* sending mail for admin*/
				if($strAdminEmail!="")
				{
					$output_arr=array('view_load'=>'order_place_mail_app_admin');
					$input_arr=array('strCustName'=>$strCustName,
									'subject_mail'=>$strSubject,
									'strAdminAddress'=>'',
									'custAddress'=>$custAddress,
									'order_status'=>'Order Placed',
									'email_order_no'=>$email_order_no,
									'delivery_charges'=>round($delivery_charges,2),
									'order_amount'=>round($order_amount,2),
									'arrproudctorder'=>$arrorderdetails,
									'item_total'=>$item_total,
									'base_pat'=>$base_pat
									);
									#print_r($input_arr);exit;
					#print $numuser[0]['emailaddress']; exit;
					$strMessageSid  = smt_send_mail($strAdminEmail,$output_arr,$input_arr);
				}
			}
			/*end of mail send for admin */
			
			/* sending mail for customer*/
				$strSubject1 = "Your Courier order placed summary for order no:".$main_order_no;
				if($strCustomerEmail!="")
				{
					$output_arr1=array('view_load'=>'order_place_mail_app_customer');
					$input_arr1=array('strCustName'=>$strCustName,
									'subject_mail'=>$strSubject1,
									'email_order_no'=>$email_order_no,
									'base_pat'=>$base_pat,
									'strAdminAddress'=>'',
									'custAddress'=>$custAddress,
									'order_status'=>'Order Placed',
									'delivery_charges'=>round($delivery_charges,2),
									'order_amount'=>round($order_amount,2),
									'arrproudctorder'=>$arrorderdetails,
									'item_total'=>$item_total
									); #print_r($input_arr1);exit;
					#print $strCustomerEmail; exit;
					$strMessageSid  = smt_send_mail($strCustomerEmail,$output_arr1,$input_arr1);
				}
								
			
			$this->load->view('front/commonFile/front_header',$data);
			$this->load->view('front/orderconfirm',$data);
			$this->load->view('front/commonFile/front_footer');
		}
		else
		{
			redirect(base_url());
		}
	}
	//code for add coupon code
	public function addPromoCode()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
	
	}
	//code for card list
	public function cardList()
	{
		$data['title']="Card List";
		$data['page_title']="card_list";

		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$cookie_name = 'site_lang';

		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);

		$data['cardData']=$selectedAddress=$this->Home_model->getCardList($user_id,1);
		
		$this->load->view('front/front_header');
		$this->load->view('front/card_list',$data);
		$this->load->view('front/front_footer');
	}

	//code for add card
	public function addCard()
	{
		$data['title']="Add Card";
		$data['page_title']="add_card";

		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$cookie_name = 'site_lang';

		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);
		if(isset($_POST['btn_add_card']))
		{
			
			print_r($_POST);exit;
			$this->form_validation->set_rules('fullName','Full Name','required');
			//$this->form_validation->set_rules('banner_maincategoryid','Banner Category','required');
			$this->form_validation->set_rules('mobileNo','Mobile Number','required');

			if($this->form_validation->run())
			{
				$fullName=$this->input->post('fullName');
				$mobileNo=$this->input->post('mobileNo');
				//$banner_url=$this->input->post('banner_url');
				$emailAddress=$this->input->post('emailAddress');
				$emergencyno=$this->input->post('emergencyno');
				$banner_type='App';
				$address=$this->input->post('address');
			    $selectGender=$this->input->post('selectGender');
			    $selectWeight=$this->input->post('selectWeight');
			    $mobilityAid=$this->input->post('mobilityAid');
			    $idNumber=$this->input->post('idNumber');
			    $medicalHistory=$this->input->post('medicalHistory');

				$chk_exist=$this->Home_model->chkExistUser($emailAddress,$mobileNo,0);

				if($chk_exist > 0)
				{
					$this->session->set_flashdata('error','User is already exist.');
					redirect(base_url().'Home/signUp');	
				}
				else
				{
					
					$input_data=array(
										'full_name'=>$fullName,
										'email'=>$emailAddress,
										'mobile'=>$mobileNo,
										'alt_mobile'=>$emergencyno,
										'gender'=>$selectGender,
										'id_proof_front'=>$front_id_file,
										'id_proof_back'=>$back_id_file,
										'id_proof_no'=>$idNumber,
										'medical_history'=>$medicalHistory,
										'weight'=>$selectWeight,
										'mobility_aid'=>$mobilityAid,
										'address'=>$address,
										'user_type'=>"Customer",
										'is_verify'=>'no',
										'status_flag'=>'Active',
										'added_date'=>date('Y-m-d H:i:s'),
										'edit_date'=>date('Y-m-d H:i:s')
									);
					
					$banner_id=$this->Home_model->add_customer($input_data);
					//echo $this->db->last_query();exit;
					if($banner_id>0)
					{
						

						$this->session->set_flashdata('success','Registered successfully.');
						redirect(base_url().'Home/signUp');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while registration.');
						redirect(base_url().'Home/signUp');	
					}
				}
					
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Home/signUp');
			}
		}
		
		$this->load->view('front/front_header');
		$this->load->view('front/addCard',$data);
		$this->load->view('front/front_footer');
	}
	//code for add card save
	public function addCardSave()
	{
		$data['title']="Add Card";
		$data['page_title']="add_card";

		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		
		$cookie_name = 'site_lang';

		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);
		
				$card_type=$this->input->post('card_type');
				$card_name=$this->input->post('card_name');
				//$banner_url=$this->input->post('banner_url');
				$card_no=$this->input->post('card_no');
				$expiry_date=$this->input->post('expiry_date');
				$cvv_no=$this->input->post('cvv_no');
			    

				$chk_exist=$this->Home_model->chkCardName($card_no,0);

				if($chk_exist > 0)
				{
					$this->session->set_flashdata('error','Card is already exist.');
					//redirect(base_url().'Home/signUp');	
				}
				else
				{
					
					$input_data=array(
										'card_type'=>$card_type,
										'card_name'=>$card_name,
										'card_no'=>$card_no,
										'expiry_date'=>$expiry_date,
										'cvv_no'=>$cvv_no,
										'user_id'=>$user_id,
										'card_status'=>'active',
										'dateadded'=>date('Y-m-d H:i:s'),
										'dateupdated'=>date('Y-m-d H:i:s')
									);
					
					$banner_id=$this->Home_model->add_card($input_data);
					//echo $this->db->last_query();exit;
					if($banner_id>0)
					{
						

						$this->session->set_flashdata('success','Card Added successfully.');
						//redirect(base_url().'Home/signUp');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while registration.');
						//redirect(base_url().'Home/signUp');	
					}
				}
					
			
		echo $banner_id;
	}

	//code for add card save
	public function addCardSelect()
	{
		$data['title']="Add Card Select";
		$data['page_title']="add_card_select";

		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		
		$cookie_name = 'site_lang';

		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}
		$data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);
		
				$card_id=$this->input->post('card_id');
				

				$input_data22=array(
										'is_select'=>'no',
										'dateupdated'=>date('Y-m-d H:i:s')
									);

					$this->db->where('loba_customer_cards.user_id',$user_id);
					$this->db->update('loba_customer_cards',$input_data22);
					
					$input_data=array(
										'is_select'=>'yes',
										'card_status'=>'active',
										'dateupdated'=>date('Y-m-d H:i:s')
									);
					
					$this->db->where('loba_customer_cards.card_id',$card_id);
					$this->db->update('loba_customer_cards',$input_data);
					//echo $this->db->last_query();exit;
					
						

						$this->session->set_flashdata('success','Card Selected successfully.');
						//redirect(base_url().'Home/signUp');	
					
			
		echo $input_data;
	}

	//code for place order
	public function placeBooking()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		
			$total_order_amount=$categoryInfo['amount'];
			$data['promoCode']=$promoCode=$this->Home_model->getPromoCode($bookingData['service_category_id'],1);

			//$data['discountamt']=$discountamt=$this->Home_model->getDiscountAmt($categoryInfo['service_id'],1);
			//$discount=$discountamt['']
			$booking_id=$bookingData['booking_id'];
			$discount=0;

			$discount=$promoCode['promocode_discount'];
			$order_place_amt=$final_amount=$total_order_amount-$discount;//$_POST['final_amount'];
			$order_status="pending";
			$arrOrderData = array(
				"user_id"     	 => $user_id,
				"booking_id"     	 => $bookingData['booking_id'],
				"offer_id"=>0,
				'coupon_code'=>$promoCode['promocode_code'],
				'offer_amount'=>round($discount,2),
				'offer_percentage'=>"",
				'total_order_amount'=>round($total_order_amount,2),
				"order_place_amt"      => round($final_amount,2),
				"admin_commision"		=>round(0,2),
				"comment"      => "",
				"booking_date"=>$bookingData['booking_date'],
				"booking_time"=>$bookingData['time_slot'],
				"order_date"      => date('Y-m-d H:i:s'),
				"order_status"      => $order_status,
				"dateadded"      => date('Y-m-d H:i:s'),
				"dateupdated"    => date('Y-m-d H:i:s'),
			);
			$intOrderId   = $this->Home_model->addOrder($arrOrderData);

			//print_r($arrOrderData);exit;
			if($intOrderId > 0)
			{
				$transaction_id = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

						$main_order_no="LOBA-ORD-".$intOrderId;
						$arrOrderData2 = array(
							"order_no"     	 => $main_order_no,
						);
						$this->db->where('loba_orders.order_id',$intOrderId);
						$this->db->update('loba_orders',$arrOrderData2);
						
						
					$payment_type = "stripe";
					
					// print_r($_POST);
					// exit;
					$payment_status = "pending";
					if($payment_type == "stripe" && $final_amount >=1)
					{
						if(is_array($userData) && count($userData) > 0){
							$strUserName = $userData['full_name'];
							$strUserEmail = $userData['email'];
							$strUserPhone = $userData['mobile'];
							
						}
						require_once('application/libraries/stripe-php/init.php');
									$strAccountId  = "";
									
									
									//$stripe = new \Stripe\StripeClient('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');
									$stripe = new \Stripe\StripeClient('sk_test_51NSHCBSDcd5hYqkEWmY8zKQZXuv4PNuoii4wbG3oPg01qaxdPmwFIkBVJ7bXEUqEhhV06bw0Qc88dkZpy7nyao4A00NYLKAYhR');
									
									$customer = $stripe->customers->create([
															'description' => $strUserName,
															'name' => $strUserName,
															'phone' => $strUserPhone,
															'email' => $strUserEmail,
															['metadata' => ['order_id' => $intOrderId]],
															//['shipping' => ['address' => ['line1' => $strUserAddress1]]],
															//['shipping' => ['address' => ['city' => $strUserCity]]],

															//'shipping.address.line1' => $strUserAddress1,
															//'shipping.address.line2' => $strUserAddress2,
															//'shipping.address.city' => $strUserCity,
															//'shipping.address.state' => $strUserState,
															//'payment_method' => 'pm_card_visa',
														]);
														
												//['stripe_account' => $strAccountId]		
									  //\Stripe\Stripe::setApiKey('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');		
									  \Stripe\Stripe::setApiKey('sk_test_51NSHCBSDcd5hYqkEWmY8zKQZXuv4PNuoii4wbG3oPg01qaxdPmwFIkBVJ7bXEUqEhhV06bw0Qc88dkZpy7nyao4A00NYLKAYhR');		
									
									$argument = array( 
														 'payment_method_types' => ['card'],
														  'amount' => round($order_place_amt,2)*100,
														  'currency' => 'CNY',
														  'customer' =>  $customer->id,
														array('metadata' => array('order_id' => $intOrderId,'transaction_id' => $transaction_id))
													);
									
									#echo "<pre>"; print_r($strAccountId); 
									#echo "<pre>"; print_r($argument); 	#,['stripe_account' => $strAccountId]			
									$paymentIntent = \Stripe\PaymentIntent::create
																			(
																				$argument
																			);
									//print_r($paymentIntent); exit;
									
									#echo "<pre>"; print_r($paymentIntent); exit;
									$clientSecret = 	$paymentIntent->client_secret;
									$output = [
												'clientSecret' => $paymentIntent->client_secret,
											  ];				  
										  
									// $arrOrderTxnData = array(
									// 						"user_id"     	 	 => $uid,
									// 						"rst_id"     	 	 => $rst_id,
									// 						"order_id"     	 	 => $intOrderId,
									// 						"transaction_id" 	 => $transaction_id,
									// 						"payment_type"   	 => $payment_type,
									// 						"payment_response"   => $payment_response,
									// 						"order_selling_amount"  => round($totsellingprice,2),
									// 						"addons_amount"      => round($addonsTotal,2),
									// 						"total_order_amount"  => round($order_place_amt,2),
									// 						"offer_id"=>$offer_id,
									// 						'offer_amount'=>round($offer_amount,2),
									// 						'offer_percentage'=>$offer_percentage,
									// 						"payment_status"   	 => $payment_status,
									// 						"dateadded"     	 => date('Y-m-d H:i:s'),
									// 						"dateupdated"    => date('Y-m-d H:i:s'),
									// 				);
									
									
									$arrbooking = array(
										"booking_status"     	 => "waiting_for_accept",
									);
									$this->db->where('loba_service_booking.booking_id',$booking_id);
									$this->db->update('loba_service_booking',$arrbooking);

									redirect(base_url().'Home/paymentSuccessPage/'.base64_encode($intOrderId));
					}
			}
		
		// echo "<pre>";
		// print_r($data);
		// exit;
		$data['user_id']=$user_id;
		// $this->load->view('front/front_header');
		// $this->load->view('front/orderPlace',$data);
		// $this->load->view('front/front_footer');
	}

	//code for payment success page
	public function paymentSuccessPage($intOrderId=0)
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$intOrderId=base64_decode($intOrderId);
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['orderData']=$orderData=$this->Home_model->getOrderData($intOrderId,1);

		$data['user_id']=$user_id;
		$this->load->view('front/front_header');
		$this->load->view('front/payment_success_page',$data);
		$this->load->view('front/front_footer');
	}
}

?>