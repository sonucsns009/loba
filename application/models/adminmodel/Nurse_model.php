<?php
Class Nurse_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function check_nurseexists($nurse_name)
	{
		$query="SELECT nurse_id FROM ".TBPREFIX."nurse WHERE nurse_full_name ='". $nurse_name."'"; 
		$sts = $this->db->query($query);
		return $sts->num_rows();
	}
	// Read data using username and password
	
	public function getAllNurse()
	{
		$this->db->select('n.*,ch.*');
		$this->db->from(TBPREFIX.'nurse as n');
		$this->db->join(TBPREFIX.'nurse_ch as ch','ch.nurse_id = n.nurse_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	// Read data using username and password
	public function getNurseDetails($nurse_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'nurse');
		$this->db->where('nurse_id',$nurse_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getNurseDetails_ch($nurse_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'nurse_ch');
		$this->db->where('nurse_id',$nurse_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}
}