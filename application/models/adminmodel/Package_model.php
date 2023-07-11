<?php
Class Package_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function check_pkgexists($package_name)
	{
		$query="SELECT package_id FROM ".TBPREFIX."packages WHERE package_title ='". $package_name."'"; 
		$sts = $this->db->query($query);
		return $sts->num_rows();
	}
	// Read data using username and password
	
	public function getAllPackages()
	{
		$this->db->select('p.*,ch.*');
		$this->db->from(TBPREFIX.'packages as p');
		$this->db->join(TBPREFIX.'packages_ch as ch','ch.package_id = p.package_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getPackageDetails($package_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'packages');
		$this->db->where('package_id',$package_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getPackageDetails_ch($package_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'packages_ch');
		$this->db->where('package_id',$package_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}
}