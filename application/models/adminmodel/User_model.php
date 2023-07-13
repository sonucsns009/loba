<?php

Class User_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllUsers()
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'users as u');
		$this->db->where('user_type','Customer');
		//$this->db->join(TBPREFIX.'users_ch as ch','ch.user_id = d.user_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getAllServiceproviders()
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'users as u');
		$this->db->where('user_type','Service Provider');
		//$this->db->join(TBPREFIX.'users_ch as ch','ch.user_id = d.user_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getAllServices()
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'main_services');
		$this->db->where('service_id','1');
		$this->db->or_where('service_id','2');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getAllServiceList()
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'main_services');
		$this->db->or_where('service_status','Active');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function check_userexists($mobile)
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'users');
		$this->db->where('mobile',$mobile);
		$res=$this->db->get();
		return $tsr=$res->num_rows();
	}

	public function checkserviceexist($service_id,$user_id)
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'user_services');
		$this->db->where('service_id',$service_id);
		$this->db->where('user_id',$user_id);
		$res=$this->db->get();
		return $tsr=$res->num_rows();
	}

	public function getServiceproviderDetails($user_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'users');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getServiceproviderDetails_ch($user_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'users_ch');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getServiceproviderServices($user_id,$qty) 
	{
		$this->db->select('s.*,us.*');
		$this->db->from(TBPREFIX.'user_services as us');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=us.service_id','left');
		$this->db->where('us.user_id',$user_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function removeservices($user_id) 
	{
		if(!empty($user_id))
		{
			$this->db->where('user_id',$user_id);
			$this->db->delete(TBPREFIX.'user_services');
		}
	}

	public function getUserAddress($user_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'adresses');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}
}