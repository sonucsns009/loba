<?php
Class Booking_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
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

	// Read data using username and password
	public function getBookingDetails($booking_id,$qty) 
	{
		$this->db->select('b.*,s.service_name,u.full_name,pickup.address1 as pickup_location,drop.address1 as drop_location');
		$this->db->from(TBPREFIX.'service_booking as b');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=b.service_category_id','left');
		$this->db->join(TBPREFIX.'users as u','u.user_id=b.user_id','left');
		$this->db->join(TBPREFIX.'adresses as pickup','pickup.address_id=b.pickup_address_id','left');
		$this->db->join(TBPREFIX.'adresses as drop','drop.address_id=b.drop_address_id','left');
		$this->db->where('b.booking_id',$booking_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getOrderDetails($booking_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'orders');
		$this->db->where('booking_id',$booking_id);
		$this->db->limit(1);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}
}