<?php
Class Home_model extends CI_Model {
	function __construct()
	{	// Call the Model constructor
		parent::__construct();
	}	

	//code for check user exist
	public function chkExistUser($emailAddress,$mobileNo,$qty)
	{
		$this->db->select(TBPREFIX.'users.*');
		$this->db->where(TBPREFIX.'users.email',$emailAddress);
		$this->db->or_where(TBPREFIX.'users.mobile',$mobileNo);
		$query=$this->db->get(TBPREFIX.'users');

		if($qty==1)

			return $query->result_array();

		else

			return $query->num_rows();
	}
	//code for get user by mobile no
	public function getUserDataByMobileno($mobileNo,$qty)
	{
		$this->db->select(TBPREFIX.'users.*');
		$this->db->where(TBPREFIX.'users.mobile',$mobileNo);
		$query=$this->db->get(TBPREFIX.'users');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//code for get user by mobile OTP
	public function getCheckOtp($user_id,$mobile_otp,$qty)
	{
		$this->db->select(TBPREFIX.'users.*');
		$this->db->where(TBPREFIX.'users.user_id',$user_id);
		$this->db->where(TBPREFIX.'users.mobile_otp',$mobile_otp);
		$query=$this->db->get(TBPREFIX.'users');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}

	//get user information
    public function getUserProfileInfo($user_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'users.user_id',$user_id);
		$query=$this->db->get(TBPREFIX.'users');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//get user addresses
    public function getUserAddreess($user_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'adresses.user_id',$user_id);
		$query=$this->db->get(TBPREFIX.'adresses');

		if($qty==1)

			return $query->result_array();

		else

			return $query->num_rows();
	}
	//get user card list
    public function getCardList($user_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'customer_cards.user_id',$user_id);
		$query=$this->db->get(TBPREFIX.'customer_cards');

		if($qty==1)

			return $query->result_array();

		else

			return $query->num_rows();
	}
	//get user pickup address
    public function getPickupAddress($pickup_address_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'adresses.address_id',$pickup_address_id);
		$query=$this->db->get(TBPREFIX.'adresses');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//get service category
    public function getCategoryInfo($service_category_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'main_services.service_id',$service_category_id);
		$query=$this->db->get(TBPREFIX.'main_services');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//get user booking
    public function geBookingInfo($user_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'service_booking.booking_status',"pending");
		$this->db->where(TBPREFIX.'service_booking.user_id',$user_id);
		///$this->db->join(TBPREFIX.'adresses',TBPREFIX.'adresses.user_id='.TBPREFIX.'adresses.user_id');
		$query=$this->db->get(TBPREFIX.'service_booking');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//get user selected address
    public function getSelectedPickupAddress($user_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'adresses.user_id',$user_id);
		$this->db->where(TBPREFIX.'adresses.is_seleted',1);
		$query=$this->db->get(TBPREFIX.'adresses');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//get user selected drop address
    public function getSelectedDropAddress($user_id,$qty)
	{
		$this->db->select('*');
		$this->db->where(TBPREFIX.'adresses.user_id',$user_id);
		$this->db->where(TBPREFIX.'adresses.is_selected_drop',1);
		$query=$this->db->get(TBPREFIX.'adresses');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}
	//Inserting code for signup
	public function add_customer($data) 
	{
		$res=$this->db->insert(TBPREFIX.'users',$data);
		if($res)
		{
			$user_id=$this->db->insert_id();
			return $user_id;
		}
		else
			return false;
	}

	//Inserting code for signup
	public function add_customer_ch($data) 
	{
		$res=$this->db->insert(TBPREFIX.'users_ch',$data);
		if($res)
		{
			$user_id=$this->db->insert_id();
			return $user_id;
		}
		else
			return false;
	}
	//update user data
	public function updateData($user_id,$data = array(),$user = '') {
		if($user_id > 0) 
	  {
		//   if($data['mobile_otp'] != "")
		// 	  $this->db->set('mobile_otp',$data['mobile_otp']);
		  
			$this->db->where('user_id',$user_id);
			$this->db->update(TBPREFIX.'users',$data); 
		}
  } 
  //update user data
	public function updateDataEs($user_id,$data = array(),$user = '') {
		if($user_id > 0) 
	  {
		//   if($data['mobile_otp'] != "")
		// 	  $this->db->set('mobile_otp',$data['mobile_otp']);
		  
			$this->db->where('user_id',$user_id);
			$this->db->update(TBPREFIX.'users_ch',$data); 
		}
  } 
//code for add order
  public function addOrder($arrOrderData)
		{
			if($this->db->insert('loba_orders',$arrOrderData))
			{
				$orderId=$this->db->insert_id();
				// $insertDAta=array('order_id'=>$orderId,'change_type'=>'user','change_status'=>'order_placed','change_date'=>date('Y-m-d'),'addedDate'=>date('Y-m-d H:i:s'));
				// $this->db->insert('dseos_item_order_status',$insertDAta);
				return $orderId;
			}
			
			else
				return false;
		}

	//code for update payment status
	public function updatePayStatus($arrUpdateStatus)
	{	#print_r($arrUpdateStatus);exit;
		if($arrUpdateStatus['order_id'] != "") 
		{
			if($arrUpdateStatus['order_id'] != "")
				$this->db->set('stripe_pay_id',$arrUpdateStatus['stripe_pay_id']);
			
			$this->db->set('payment_status',$arrUpdateStatus['payment_status']);
			$this->db->set('payment_response',$arrUpdateStatus['payment_response']);
			$this->db->set('dateupdated',$arrUpdateStatus['dateupdated']);
			$this->db->where('order_id',$arrUpdateStatus['order_id']);
			$this->db->where('transaction_id',$arrUpdateStatus['transaction_id']);
			$res=$this->db->update('loba_order_transaction'); 
			#echo $this->db->last_query(); exit; 
			if($res)
				return true;
			else
				return false;
		}	 
	}
	//code for update order status
	public function updateOrderStatus($intOrderId)
	{
		$this->db->where('order_id',$intOrderId);
		$this->db->set('order_status','Order Placed');
		$res=$this->db->update('loba_orders');
		if($res)
			return true;
		else
		return false;
	}

   
}
?>