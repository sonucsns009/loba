<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Login extends REST_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('ApiModels/customermodels/LoginModel');
		$this->load->model('ApiModels/UserModel');
		$this->load->model('Common_Model');
	}
	
	public function login_post()
	{
		$token 		  = $this->input->post("token");
		$username	  = $this->input->post('username');
		$password	  = $this->input->post('password');
		$fcm		  = $this->input->post('fcm');
		
		if($token == TOKEN)
		{
			$data = array('username' => $this->input->post('username')
						,'password' => $this->input->post('password'));
		
			$isLogin = $this->LoginModel->check_login($data);
		
			if ($isLogin > 0) 
			{
				$loginData = $this->LoginModel->chk_login($data,0);

				if ($loginData > 0) 
				{
					$result = $this->LoginModel->chk_login($data,1);
					$status = $result->status_flag;
					$otp_verified = $result->otp_verified;	

					//*** FCM Update */
					$fcmdata=array('fcm'=> $fcm);
					$q=$this->Common_Model->update_data('users','userid',$result->userid,$fcmdata);
					//*********** */
					
					if($status == 'Active')
					{
						$session_data = array(
							'user_id' => $result->user_id,
							'full_name' => $result->full_name,
							'mobile' => $result->mobile,
							'email' => $result->email,
							'status_flag' => $result->status_flag);
						
						//$this->session->set_userdata('logged_in', $session_data);
						$response_array['data'] = $session_data;
						$response_array['responsecode'] = "200";
						$response_array['responsemessage'] = 'You are logged in successfully.';
					}
					else if($otp_verified == 'No')
					{
						$response_array['responsecode'] = "407";
						$response_array['responsemessage'] = 'Please verify your account';
					}
					else  if($status=='Inactive')
					{
						$response_array['responsecode'] = "405";
						$response_array['responsemessage'] = 'Your account is Inactive!';
					}
					else if($status=='Deleted')
					{
						$response_array['responsecode'] = "408";
						$response_array['responsemessage'] = 'Your account is Deleted!';
					}
				}
				else
				{
					$response_array['responsecode'] = "406";
					$response_array['responsemessage'] = 'Invalid Password!';
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
