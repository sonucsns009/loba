<?php
Class Doctor_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function check_doctorexists($doctor_name)
	{
		$query="SELECT doctor_id FROM ".TBPREFIX."doctors WHERE doctor_full_name ='". $doctor_name."'"; 
		$sts = $this->db->query($query);
		return $sts->num_rows();
	}
	// Read data using username and password
	
	public function getAllDoctors()
	{
		$this->db->select('d.*,ch.*');
		$this->db->from(TBPREFIX.'doctors as d');
		$this->db->join(TBPREFIX.'doctors_ch as ch','ch.doctor_id = d.doctor_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	// Read data using username and password
	public function getDoctorDetails($doctor_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'doctors');
		$this->db->where('doctor_id',$doctor_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getDoctorDetails_ch($doctor_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'doctors_ch');
		$this->db->where('doctor_id',$doctor_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}
}