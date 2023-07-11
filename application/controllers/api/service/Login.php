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
						$response_array['responsecode'] = "405";
						$response_array['responsemessage'] = 'Your account is Inactive!';
					}
					else if($status=='Delete')
					{
						$response_array['responsecode'] = "408";
						$response_array['responsemessage'] = 'Your account is Deleted!';
					}
				}
				else
				{
					$response_array['responsecode'] = "406";
					$response_array['responsemessage'] = 'Invalid Fingerprint!';
				}
			}
			else
			{
				$response_array['responsecode'] = "405";
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
					$response_array['responsecode'] = "406";
					$response_array['responsemessage'] = 'OTP does not match !';
				}
			}
			else
			{
				$response_array['responsecode'] = "405";
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
						'responsecode' => "202"
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
		$email_address	=	$this->input->post('email_address');
		$otp_code		=	$this->input->post('otp_code');
		$password		=	$this->input->post('password');
		$cpassword		=	$this->input->post('cpassword');

		if($token == TOKEN)
		{
			if($email_address == "" || $otp_code == "" || $password == "" || $cpassword == "" || $password != $cpassword)
			{
				$response_array['responsecode'] = '403';
				$response_array['responsemessage'] = 'Please provide valid data';
			}
			else 
			{
				$usersOtp = $this->UserModel->checkOtp($email_address,$otp_code);
				
				if(!empty($usersOtp))
				{ 					
					$arrUserDetails = $this->UserModel->getUserDetails($usersOtp->userid);
					$response_array['responsecode'] = "200";
					$response_array['responsemessage'] = 'Your password has been updated';
					
					$response_array['userDetails'] = $arrUserDetails;
				}
				else  
				{
					$response_array['responsecode'] = "401";
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
}
