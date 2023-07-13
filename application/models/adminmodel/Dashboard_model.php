<?php

Class Dashboard_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllDoctors()
	{
		$this->db->select('d.*,ch.*');
		$this->db->from(TBPREFIX.'doctors as d');
		$this->db->join(TBPREFIX.'doctors_ch as ch','ch.doctor_id = d.doctor_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	// public function getAllNurse()
	// {
	// 	$this->db->select('n.*,ch.*');
	// 	$this->db->from(TBPREFIX.'nurse as n');
	// 	$this->db->join(TBPREFIX.'nurse_ch as ch','ch.nurse_id = n.nurse_id','left');
	// 	$res=$this->db->get();
	// 	return $tsr=$res->result_array();
	// }

	public function getAllServices()
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'main_services');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	// Read data using username and password
	public function getAdminDetails($admin_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'admin');
		$this->db->where('admin_id',$admin_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	# Update Admin Details 
	public function upt_admin($input_data,$admin_id)
	{
		$this->db->where('admin_id',$admin_id);
		$query=$this->db->update(TBPREFIX."admin",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
}