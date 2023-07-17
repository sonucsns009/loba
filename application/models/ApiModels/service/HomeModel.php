<?php
Class HomeModel extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	// Read data using username and password
	public function getAllServices() 
	{
        $this->db->select('*');
        $this->db->from(TBPREFIX.'main_services');
        $this->db->where('service_status','Active');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
	}

	public function getUserDetails($user_id) 
	{
		if(!empty ($user_id))
		{
			$this->db->select('*');
			$this->db->from(TBPREFIX.'users');
			$this->db->where('user_id',$user_id);
			$this->db->where('user_type','Service Provider');
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$user= $query->row();
			if(isset($user->profile_pic) && $user->profile_pic!="")
			{
				$user->profile_pic=base_url()."uploads/user/profile_photo/".$user->profile_pic;;
			}
			return $user;
		}
	}

	public function getDoctorDetails($user_id) 
	{
		if(!empty ($user_id))
		{
			$this->db->select('*');
			$this->db->from(TBPREFIX.'doctors');
			$this->db->where('user_id',$user_id);
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$user= $query->row();
			return $user;
		}
	}

	public function getNurseDetails($user_id) 
	{
		if(!empty ($user_id))
		{
			$this->db->select('*');
			$this->db->from(TBPREFIX.'nurse');
			$this->db->where('user_id',$user_id);
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$user= $query->row();
			return $user;
		}
	}

	public function getUserServices($user_id) 
	{
		if(!empty ($user_id))
		{
			$this->db->select('us.user_id,us.service_id,s.service_name');
			$this->db->from(TBPREFIX.'user_services as us');
			$this->db->join(TBPREFIX.'main_services as s','s.service_id=us.service_id','left');
			$this->db->where('us.user_id',$user_id);
			$query = $this->db->get();
			$service= $query->result_array();
			return $service;
		}
	}

	public function getAllBookings()
	{
		$this->db->select('b.*,s.service_name,u.full_name');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getAllwaitingBookings($service_ids)
	{
		$condition="b.service_category_id IN ".$service_ids;
		$this->db->select('b.booking_id,b.booking_date,b.time_slot,b.no_of_hourse,b.select_mobility_aid,b.booking_status
		,s.service_name,u.full_name,pickup.address1 as pickup_location,drop.address1 as drop_location');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$this->db->join(TBPREFIX.'adresses as pickup','pickup.address_id=b.pickup_address_id','left');
		$this->db->join(TBPREFIX.'adresses as drop','drop.address_id=b.drop_address_id','left');
		$this->db->where($condition);
		$this->db->where('booking_status','waiting_for_accept');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	function getNearByBookings($user_id,$userLat,$userLong,$pagination='',$pageid=0,$Offset=0)
	{
		//$distance_customer='10';
		
		$distance_parameter = '(
			6371 * acos(
			  cos(radians('.'pickup.address_lat)) * cos(radians('.$userLat.')) * cos(
				radians('.$userLong.') - radians('.'pickup.address_lng)
			  ) + sin(radians('.$userLat.')) * sin(radians('.'pickup.address_lat))
			)
		  ) AS distance';
		
		$services=$this->getUserServices($user_id);
		$service_ids="(-1";
		foreach($services as $service)
		{
			$service_ids.=",".$service['service_id'];
		}
		$service_ids.=")";
		//echo $service_ids;
		$condition="b.service_category_id IN ".$service_ids;
		$this->db->select($distance_parameter.','.'b.booking_id,b.booking_date,b.time_slot,b.no_of_hourse,b.select_mobility_aid,b.booking_status,b.doctor_id,b.nurse_id
		,s.service_name,u.full_name,u.profile_pic,pickup.address1 as pickup_location,drop.address1 as drop_location,pickup.address_lat,pickup.address_lng');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$this->db->join(TBPREFIX.'adresses as pickup','pickup.address_id=b.pickup_address_id','left');
		$this->db->join(TBPREFIX.'adresses as drop','drop.address_id=b.drop_address_id','left');
		$this->db->where($condition);
		$this->db->where('b.booking_status','waiting_for_accept');
		$this->db->where('b.doctor_id','0');
		$this->db->where('b.nurse_id','0');
		$this->db->order_by('b.booking_id', 'desc');
		$this->db->having("distance <=" ,10);
		//$this->db->having("distance <=" ,NEARDISTANCE);

		if(isset($limit) && $limit!='')
		{
			$this->db->limit($limit);
		}
		if($pagination=='true')
		{
			if($pageid>0)
			{
				$this->db->limit(POSTLIMIT,$Offset);
			}
			else
			{
				$this->db->limit(POSTLIMIT,$Offset);
			}
		}
		return $this->db->get()->result_array();
	}

	function getDoctorNurseBookings($doctor_id,$nurse_id,$pagination='',$pageid=0,$Offset=0)
	{
		$this->db->select('b.booking_id,b.booking_date,b.time_slot,b.no_of_hourse,b.select_mobility_aid,b.booking_status
		,s.service_name,u.full_name,u.profile_pic,pickup.address1 as pickup_location,drop.address1 as drop_location,pickup.address_lat,pickup.address_lng');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$this->db->join(TBPREFIX.'adresses as pickup','pickup.address_id=b.pickup_address_id','left');
		$this->db->join(TBPREFIX.'adresses as drop','drop.address_id=b.drop_address_id','left');
		$this->db->where('booking_status','waiting_for_accept');

		if(isset($nurse_id) && $nurse_id!="" && $nurse_id!='0')
		{
			$this->db->where('nurse_id',$nurse_id);
		}
		if(isset($doctor_id) && $doctor_id!="" && $doctor_id!='0')
		{
			$this->db->where('doctor_id',$doctor_id);
		}
		$this->db->order_by('b.booking_id', 'desc');
		if(isset($limit) && $limit!='')
		{
			$this->db->limit($limit);
		}
		if($pagination=='true')
		{
			if($pageid>0)
			{
				$this->db->limit(POSTLIMIT,$Offset);
			}
			else
			{
				$this->db->limit(POSTLIMIT,$Offset);
			}
		}
		return $this->db->get()->result_array();
	}

	public function getBookingDetails($booking_id)
	{
		$this->db->select('b.booking_id,b.booking_date,b.time_slot,b.no_of_hourse,b.select_mobility_aid,b.booking_status
		,s.service_name,u.full_name,pickup.address1 as pickup_location,drop.address1 as drop_location');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$this->db->join(TBPREFIX.'adresses as pickup','pickup.address_id=b.pickup_address_id','left');
		$this->db->join(TBPREFIX.'adresses as drop','drop.address_id=b.drop_address_id','left');
		$this->db->where('b.booking_id',$booking_id);
		$res=$this->db->get();
		return $tsr=$res->row();
	}

	public function getMyBookings($user_id,$status='')
	{
		$this->db->select('b.booking_id,b.booking_date,b.time_slot,b.no_of_hourse,b.select_mobility_aid,b.booking_status,b.booking_sub_status
		,s.service_name,u.full_name,pickup.address1 as pickup_location,drop.address1 as drop_location');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$this->db->join(TBPREFIX.'adresses as pickup','pickup.address_id=b.pickup_address_id','left');
		$this->db->join(TBPREFIX.'adresses as drop','drop.address_id=b.drop_address_id','left');
		$this->db->where('service_provider_id',$user_id);
		if($status!='')
		{
			$this->db->where('booking_status',$status);
		}
		
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}
	
}