<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Login extends REST_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('ApiModels/service/LoginModel');
		$this->load->model('ApiModels/UserModel');
		$this->load->model('Common_Model');
	}
	
	public function login_post()
	{
		$token 		  = $this->input->post("token");
		$username	  = $this->input->post('username');
		$fingerprint  = $this->input->post('fingerprint');
		$fcm		  = $this->input->post('fcm');
		$language     = $this->input->post('language');
		
		if($token == TOKEN)
		{
			$data = array('username' => $this->input->post('username')
						,'fingerprint' => $this->input->post('fingerprint'));
		
			$isLogin = $this->LoginModel->check_login($data);
		
			if ($isLogin > 0) 
			{
				$loginData = $this->LoginModel->chk_login($data,0);

				if ($loginData > 0) 
				{
					$result = $this->LoginModel->chk_login($data,1);
					$status = $result->status_flag;
					$otp_verified = $result->otp_verified;	
					
					if($status == 'Active')
					{
						$session_data = array(
							'user_id' => $result->user_id,
							'full_name' => $result->full_name,
							'mobile' => $result->mobile,
							'email' => $result->email,
							'status_flag' => $result->status_flag);
						
						//$this->session->set_userdata('logged_in', $session_data);
						// Send OTP
						$otp_code = $this->Common_Model->otp();
						$strMessage=urlencode("Dear user your CSNS Login OTP for LOBA is $otp_code");
						//$output=$this->Common_Model->SendSms($strMessage, $mobile_number);	
						$response_array['OTP'] = $otp_code;

						//*** User Update */
						$updatedata=array('user_fcm'=> $fcm,'user_language'=>$language,'otp'=>$otp_code);
						$q=$this->Common_Model->update_data('users','user_id',$result->user_id,$updatedata);
						//*********** */

						$response_array['data'] = $session_data;
						$response_array['responsecode'] = "200";
						$response_array['responsemessage'] = 'OTP send successfully.';
						//$response_array['responsemessage'] = 'You are logged in successfully.';
					}
					else  if($status=='Inactive')
					{
						$response_array['responsecode'] = "402";
						$response_array['responsemessage'] = 'Your account is Inactive!';
					}
					else if($status=='Delete')
					{
						$response_array['responsecode'] = "402";
						$response_array['responsemessage'] = 'Your account is Deleted!';
					}
				}
				else
				{
					$response_array['responsecode'] = "402";
					$response_array['responsemessage'] = 'Invalid Fingerprint!';
				}
			}
			else
			{
				$response_array['responsecode'] = "402";
				$response_array['responsemessage'] = 'Invalid Username!';
				
			}
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}

	public function confirmotp_post()
	{
		$token 		  = $this->input->post("token");
		$user_id	  = $this->input->post('user_id');
		$otp          = $this->input->post('otp');
		
		if($token == TOKEN)
		{
			$data = array('user_id' => $this->input->post('user_id')
						,'otp' => $this->input->post('otp'));

			$isLogin = $this->LoginModel->check_user($user_id);
		
			if ($isLogin > 0) 
			{
				$loginData = $this->LoginModel->chk_otp($data,0);

				if ($loginData > 0) 
				{
					$result = $this->LoginModel->chk_otp($data,1);
 					
						$session_data = array(
							'user_id' => $result->user_id,
							'full_name' => $result->full_name,
							'mobile' => $result->mobile,
							'email' => $result->email,
							'status_flag' => $result->status_flag);
						
						$response_array['data'] = $session_data;
						$response_array['responsecode'] = "200";
						$response_array['responsemessage'] = 'You are logged in successfully.';
				}
				else
				{
					$response_array['responsecode'] = "402";
					$response_array['responsemessage'] = 'OTP does not match !';
				}
			}
			else
			{
				$response_array['responsecode'] = "402";
				$response_array['responsemessage'] = 'Invalid User Id!';
				
			}
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}

	public function sendOtp_post()
	{
		$token 				= $this->input->post("token");
		$mobile_number 		= $this->input->post("mobile_number");
		$email_address 		= $this->input->post("email_address");
		
		$response_array = array();
		
		if($token == TOKEN)
		{
			if(isset($mobile_number))
			{
				if($mobile_number=="")
				{
					$num = array(
						'responsemessage' => 'Please Provide Mobile Number.',
						'responsecode' => "402"
					); //create an array
					$obj = (object)$num;//Creating Object from array
					$response_array=json_encode($obj);
					print_r($response_array);
				}
				else
				{
					//$otp_code=rand(pow(10, 3),pow(10, 4)-1);
					//$otp_code = "123456";
					$otp_code = $this->Common_Model->otp();
					$strMessage=urlencode("Dear user your CSNS Login OTP for MSMED is $otp_code");
					$output=$this->Common_Model->SendSms($strMessage, $mobile_number);	
					$response_array['OTP'] = $otp_code;
				}
			}

			if(isset($email_address))
			{
				if($email_address=="")
				{
					$num = array(
						'responsemessage' => 'Please Provide Email address.',
						'responsecode' => "202"
					); //create an array
					$obj = (object)$num;//Creating Object from array
					$response_array=json_encode($obj);
					print_r($response_array);
				}
				else
				{
					//$email_otp=rand(pow(10, 3),pow(10, 4)-1);
					$email_otp = $this->Common_Model->otp();
					$subject="OTP for MSMED";
					$strMessage="Dear user your OTP for MSMED is ".$email_otp;
					$output=$this->Common_Model->SendMail($email_address,$strMessage,$subject);
					$response_array['email_OTP'] = $email_otp;
				}
			}
			$response_array['responsecode'] = "200";
			$response_array['responsemessage'] = 'OTP sent successfully.';
			
			
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}

	public function logout_post()
	{
		$token 		= $this->input->post("token");
		
		if($token == TOKEN)
		{
			$response_array['responsecode'] = "200";
			$response_array['responsemessage'] = 'You are logged out successfully.';
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}
	
	public function forgot_password_post()
	{
		$token 	= $this->input->post("token");
		$email	= $this->input->post('email_address');
		$email	= $this->input->post('email_address');
		
		if($token == TOKEN)
		{
			$userExists=$this->LoginModel->chkUserEmailExists($email);
			
			if(!empty($userExists))
			{
				//$rnd_number=rand(pow(10, 5),pow(10, 6)-1);
				// Crate 4 Digit Random Number for OTP 
							
				//$rnd_number = "5678"; //default SMS
				$rnd_number = $this->Common_Model->otp();
				$updateData['confirm_otp'] 	= $rnd_number;
					
				$updateOtp 	= $this->UserModel->updateData('users','userid',$userExists->userid,$updateData);
				$arrUserDetails = $this->UserModel->getUserDetails($userExists->userid);
				//print_r($arrUserDetails);

				//Send Mail
				$subject="MSMED Forgot Password OTP";
				$strMessage="Dear user your Forgot Password OTP for MSMED is ".$rnd_number;
				$output=$this->Common_Model->SendMail($email,$strMessage,$subject);

				$response_array['responsecode'] = "200";
				$response_array['responsemessage'] = 'OTP sent successfully.';
				$response_array['data'] = $arrUserDetails;
			}
			else
			{
				$response_array['responsecode'] = "405";
				$response_array['responsemessage'] = 'Invalid email';
				
			}
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}
	
	public function reset_password_post()
	{
		$token 			=   $this->input->post("token");
		$mobile_number	=	$this->input->post('mobile_number');
		$user_id	    =	$this->input->post('user_id');
		$otp_code		=	$this->input->post('otp_code');
		$password		=	$this->input->post('password');
		$cpassword		=	$this->input->post('cpassword');

		if($token == TOKEN)
		{
			if($mobile_number == "" || $otp_code == "" || $password == "" || $cpassword == "" || $password != $cpassword)
			{
				$response_array['responsecode'] = '402';
				$response_array['responsemessage'] = 'Please provide valid data';
			}
			else 
			{
				$usersOtp = $this->UserModel->checkOtp($mobile_number,$otp_code);
				
				if(!empty($usersOtp))
				{ 					
					$arrUserDetails = $this->UserModel->getUserDetails($usersOtp->userid);
					$response_array['responsecode'] = "200";
					$response_array['responsemessage'] = 'Your password has been updated';
					
					$response_array['userDetails'] = $arrUserDetails;
				}
				else  
				{
					$response_array['responsecode'] = "402";
					$response_array['responsemessage'] = 'OTP does not match.';
				}
			}
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}

	##### Mobile RESEND OTP ##### 
	public function resendOtp_post()
	{
		//date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$token 		= $this->input->post("token");
		$username	= $this->input->post("username");
		
		if($token == TOKEN)
		{
			if(isset($username))
			{
				if($username=="")
				{
					$num = array(
						'responsemessage' => 'Please Provide Mobile Number.',
						'responsecode' => "402"
					); //create an array
					$obj = (object)$num;//Creating Object from array
					$response_array=json_encode($obj);
					print_r($response_array);
				}
				else
				{
					$users_username = $this->LoginModel->getuserDetails($username);
					//print_r($users_username);
					
					if(!empty($users_username))
					{
						$user_id 		= $users_username->user_id;
						//$rnd = "12345"; //default SMS
						$otp_code = $this->Common_Model->otp();
						if($this->input->post("print") == 1)
						{
							//print_r($users_username); exit;
						}		
						//$otp_code= $strOtp = $users_username->mobile_otp;
						
						$updateData['otp'] 	= $otp_code;
						$updateOtp 	= $this->Common_Model->update_Data('users','user_id',$user_id,$updateData);
						
						$strMessage=urlencode("Dear user your CSNS Login OTP for MSMED is $otp_code");
						//$output=$this->Common_Model->SendSms($strMessage, $username);	
						
						$datas = array(
								'mobile_number'   	=> $username,
								'otp' 	=> $updateData['otp'],
									);
						$data['data'] = $datas;
						$data['responsemessage'] = 'OTP Send Successfully';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
					else
					{
						$num = array(
									'responsemessage' => 'User Not Available, please contact admin or register again.',
									'responsecode' => "402"
								); //create an array
						$obj = (object)$num;//Creating Object from array
						$response_array=json_encode($obj);
					}
					print_r($response_array);
				}
			}
		}
		else
		{
			$num = array(
							'responsemessage' => 'Token not match',
							'responsecode' => "201"
						); //create an array
			$obj = (object)$num;//Creating Object from array
			$response_array=json_encode($obj);
		}
	}

	public function changePassword_post()
	{
		//date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$password		= $this->input->post("password");
		$oldpassword	= $this->input->post("oldpassword");
		$oldpassword	= $this->input->post("oldpassword");
		$user_id		= $this->input->post("user_id");
		$token 			= $this->input->post("token");
		if($token == TOKEN)
		{				
			if($password == "" || $user_id == "" || $password != $cpassword)
			{
				$num = array('responsemessage' => 'Enter User id and password ',
					'responsecode' => "403"); //create an array
				$obj = (object)$num;//Creating Object from array
					
				$response_array=json_encode($obj);
					
			}
			else if(strlen($password) < 6 && strlen($password) > 16)
			{
				$num = array('responsemessage' => 'password should be between 6 to 15 characters. ',
					'responsecode' => "403"); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
			}
			else
			{
				$result1   = $this->AgencyModel->checkpassword(md5($oldpassword), $user_id);
				//print_r($this->db->last_query()); die;
				if($result1 != '1')
				{
					$num = array(
										'responsemessage' => 'Wrong old password!',
										'responsecode' => "209"
									); //create an array
					$obj = (object)$num;//Creating Object from array
					$response_array=json_encode($obj);
				}
				else
				{
					$result = $this->AgencyModel->changePassword($user_id,$password);
					if($result)
					{
						$data['data'] = '';
						$data['responsemessage'] = 'Password changed successfully';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
					else  
					{
						$num = array(
							'responsemessage' => 'Something went wrong',
							'responsecode' => "401"
						); //create an array
						$obj = (object)$num;//Creating Object from array
						$response_array=json_encode($obj);
					}
				}
			}
		}
		else
		{
			$num = array(
							'responsemessage' => 'Token not match',
							'responsecode' => "201"
						); //create an array
			$obj = (object)$num;//Creating Object from array
			$response_array=json_encode($obj);
		}	
		print_r($response_array);
	}

	public function updateprofile_post()
	{
		$token 		  = $this->input->post("token");
		$user_id	  = $this->input->post('user_id');
		$fullname	  = $this->input->post('fullname');
		$email  = $this->input->post('email');
		$mobile		  = $this->input->post('mobile_no');
		$address     = $this->input->post('address');
		//$service_ids     = $this->input->post('service_ids');
		
		if($token == TOKEN)
		{
			if ($fullname=="" || $user_id=="" || $email=="" || $mobile=="" || $address=="") 
			{
				$response_array['responsecode'] = "402";
				$response_array['responsemessage'] = 'Please provide valid data';
			}
			else
			{
				//*** User Update */
				$updatedata=array(
					'full_name'=> $fullname,
					'email'=>$email,
					'mobile'=>$mobile,
					'address'=>$address
				);

				$q=$this->Common_Model->update_data('users','user_id',$user_id,$updatedata);
				//*********** */

				// Services Update
				// $arrservices=explode(",",$service_ids);
				// if(!empty($arrservices))
				// {
				// 	$remove=$this->LoginModel->removeservices($user_id);
				// 	foreach($arrservices as $service_id)
				// 	{
				// 		//*** User Update */
				// 		$updatedata=array(
				// 			'user_id'=> $user_id,
				// 			'service_id'=>$service_id
				// 		);
				// 		$q=$this->Common_Model->insert_data('user_services',$updatedata);
				// 	}
				// }

				$userData=$this->LoginModel->getUserDetail($user_id);
				$response_array['data'] = $userData;
				$response_array['responsecode'] = "200";
				$response_array['responsemessage'] = 'Profile updated successfully.';
			}
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}

	public function updateprofile_pic_post()
	{
		$token 		  = $this->input->post("token");
		$user_id	  = $this->input->post('user_id');
		$photoname	  = $_FILES['photo']['name'];
		
		if($token == TOKEN)
		{
			if ($user_id=="" || $photoname=="") 
			{
				$response_array['responsecode'] = "402";
				$response_array['responsemessage'] = 'Please provide valid data';
			}
			else
			{
				 //Image Upload Code 
				 if(count($_FILES) > 0) 
				 {
					 $ImageName = "photo";
					 $target_dir = "uploads/user/profile_photo";
					 $photo= $this->Common_Model->ImageUpload($ImageName,$target_dir);
				 }
				//*** User Update */
				$updatedata=array(
					'profile_pic'=> $photo
				);
				$q=$this->Common_Model->update_data('users','user_id',$user_id,$updatedata);
				//*********** */
				$userData=$this->LoginModel->getUserDetail($user_id);
				$response_array['data'] = $userData;
				$response_array['responsecode'] = "200";
				$response_array['responsemessage'] = 'Profile photo updated successfully.';
			}
		}
		else
		{
			$response_array['responsecode'] = "201";
			$response_array['responsemessage'] = 'Token did not match';
		}
		$obj = (object)$response_array;//Creating Object from array
		$response = json_encode($obj);
		print_r($response);
	}

	public function settings_post()
	{
		$token 		          = $this->input->post("token");
		$user_id 	          = $this->input->post("user_id");
		$available_now 	      = $this->input->post("available_now");
		$available_call 	  = $this->input->post("available_call");
		$notification_allowed = $this->input->post("notification_allowed");
		
		if($token == TOKEN)
		{
			$checkUser=$this->LoginModel->check_user($user_id);
			if($checkUser>0)
			{
				if(isset($available_now) && $available_now!="")
				{
					$arrUpdateData=array(
						'available_now' => $available_now,
						'edit_date' => date('Y-m-d H:i:s')
					);
					$this->Common_Model->update_data('users','user_id',$user_id,$arrUpdateData);
				}

				if(isset($available_call) && $available_call!="")
				{
					$arrUpdateData=array(
						'available_in_call' => $available_call,
						'edit_date' => date('Y-m-d H:i:s')
					);
					$this->Common_Model->update_data('users','user_id',$user_id,$arrUpdateData);
				}

				if(isset($notification_allowed) && $notification_allowed!="")
				{
					$arrUpdateData=array(
						'notification_allowed' => $notification_allowed,
						'edit_date' => date('Y-m-d H:i:s')
					);
					$this->Common_Model->update_data('users','user_id',$user_id,$arrUpdateData);
				}
				
				$userData=$this->LoginModel->getUserDetail($user_id);
				//$data['data'] =$userData;
				$data['responsecode'] = "200";
				$data['responsemessage'] = "Settings updated successfully";
			}
			else
			{
				$data['responsecode'] = "402";
				$data['responsemessage'] = 'User Not Found';
			}
			
		}
		else
		{
			$data['responsecode'] = "201";
			$data['responsemessage'] = 'Token did not match';
		}
		$response_array=json_encode($data);
		print_r($response_array);
	}

}
