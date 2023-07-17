<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Home extends REST_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('ApiModels/service/HomeModel');
		$this->load->model('ApiModels/service/LoginModel');
		$this->load->model('Common_Model');
	}

    public function serviceList_post()
	{
		$token 		= $this->input->post("token");
		
		if($token == TOKEN)
		{
            $arrServices=$this->HomeModel->getAllServices();
			$response_array['responsecode'] = "200";
			$response_array['data'] = $arrServices;
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

	public function UserDetails_post()
	{
		$token 		          = $this->input->post("token");
		$user_id 	          = $this->input->post("user_id");
		
		if($token == TOKEN)
		{
			if($user_id=="")
			{
				$data['responsecode'] = "402";
				$data['responsemessage'] = 'Please provide user id';
			}
			else
			{
				$checkUser=$this->LoginModel->check_user($user_id);
				if($checkUser>0)
				{
					$userData=$this->HomeModel->getUserDetails($user_id);
					$services=$this->HomeModel->getUserServices($user_id);
					$data['data'] =$userData;
					$data['services'] =$services;
					$data['responsecode'] ="200";
					$data['responsemessage'] ="User Details";
				}
				else
				{
					$data['responsecode'] = "402";
					$data['responsemessage'] = 'User Not Found';
				}
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
	
	public function waitingbookingList_post()
	{
		$token 		= $this->input->post("token");
		$user_id 		= $this->input->post("user_id");
		$sp_lat 		= $this->input->post("sp_lat");
		$sp_long 		= $this->input->post("sp_long");
		
		if($token == TOKEN)
		{
			if($sp_lat=="" || $sp_long=="" || $user_id=="")
			{
				$response_array['responsecode'] = "201";
				$response_array['responsemessage'] = 'Please Provide valid data';
			}
			else
			{
				// $services=$this->HomeModel->getUserServices($user_id);
				// $service_ids="(-1";
				// foreach($services as $service)
				// {
				// 	$service_ids.=",".$service['service_id'];
				// }
				// $service_ids.=")";

				//$arrBookings=$this->HomeModel->getAllwaitingBookings($service_ids);
				$user=$this->HomeModel->getUserDetails($user_id);
					//echo $user->service_type;
				if($user->service_type=='Service Provider')
				{
					$arrBookings=$this->HomeModel->getNearByBookings($user_id,$sp_lat,$sp_long);
				}
				else if($user->service_type=='Doctor')
				{
					$doctor=$this->HomeModel->getDoctorDetails($user_id);
					$arrBookings=$this->HomeModel->getDoctorNurseBookings($doctor->doctor_id,'');
				}
				else if($user->service_type=='Nurse')
				{
					$nurse=$this->HomeModel->getNurseDetails($user_id);
					$arrBookings=$this->HomeModel->getDoctorNurseBookings('',$nurse->nurse_id);
				}
				//echo $this->db->last_query();
				foreach($arrBookings as $key=>$booking)
				{
					if(isset($booking['profile_pic']) && $booking['profile_pic']!="")
					{
						$booking['profile_pic']=base_url()."uploads/user/profile_photo/".$booking['profile_pic'];
					}
					if($booking['booking_status']=='waiting_for_accept')
					{
						$booking['booking_status']="Waiting";
					}
					if($booking['booking_date'] && $booking['booking_date']!="")
					{
						$booking['booking_date']=new DateTime($booking['booking_date']);
						$booking['booking_date']=$booking['booking_date']->format('M d,Y');
						//$booking['booking_date']=$bookingdate;
					}
					$arrBookings[$key]=$booking;
				}
				
				$response_array['responsecode'] = "200";
				$response_array['responsemessage'] = "Waiting Booking List";
				$response_array['data'] = $arrBookings;
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

	public function change_status_post()
	{
		$substatus="";
		$token 		= $this->input->post("token");
		$user_id 		= $this->input->post("user_id");
		$booking_id 		= $this->input->post("booking_id");
		$status 		= $this->input->post("status");
		$substatus 		= $this->input->post("substatus");
		
		if($token == TOKEN)
		{
			if($user_id=="" || $booking_id=="" || $status=="")
			{
				$response_array['responsecode'] = "201";
				$response_array['responsemessage'] = 'Please Provide valid data';
			}
			else
			{
				$inputData=array(
					'service_provider_id' => $user_id,
					'booking_status' => $status,
					'booking_sub_status' => $substatus
				);
				$this->Common_Model->update_data('service_booking','booking_id',$booking_id,$inputData);
				$bookingDetails=$this->HomeModel->getBookingDetails($booking_id);
				$response_array['responsecode'] = "200";
				$response_array['responsemessage'] = "Status updated successfully";
				$response_array['data'] = $bookingDetails;
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

	public function mybookingList_post()
	{
		$token 		    = $this->input->post("token");
		$user_id 		= $this->input->post("user_id");
		$status 		= $this->input->post("status");
		
		if($token == TOKEN)
		{
			if($user_id=="" || $status=="")
			{
				$response_array['responsecode'] = "201";
				$response_array['responsemessage'] = 'Please Provide valid data';
			}
			else
			{
				$arrBookings=$this->HomeModel->getMyBookings($user_id,$status);
				foreach($arrBookings as $key=>$booking)
				{
					if($booking['booking_date'] && $booking['booking_date']!="")
					{
						$booking['booking_date']=new DateTime($booking['booking_date']);
						$booking['booking_date']=$booking['booking_date']->format('M d,Y');
					}
					if($booking['booking_status']=='accepted')
					{
						$booking['booking_status']="Accepted";
					}
					else if($booking['booking_status']=='ongoing')
					{
						$booking['booking_status']="Ongoing";

						if($booking['booking_sub_status']="start_journey")
						{
							$booking['booking_sub_status']="Start Journey";
						}
						else if($booking['booking_sub_status']="reached")
						{
							$booking['booking_sub_status']="Reached";
						}
						else if($booking['booking_sub_status']="start_service")
						{
							$booking['booking_sub_status']="Start Service";
						}
					}
					$arrBookings[$key]=$booking;
				}
				
				$response_array['responsecode'] = "200";
				$response_array['responsemessage'] = "Assigned Booking List";
				$response_array['data'] = $arrBookings;
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