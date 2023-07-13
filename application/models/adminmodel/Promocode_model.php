<?php
Class Promocode_model extends CI_Model {
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
	
	public function getAllPromocodes()
	{
		$this->db->select('p.*,s.service_name');
		$this->db->from(TBPREFIX.'promo_code as p');
		$this->db->join(TBPREFIX.'main_services as s','s.service_id=p.service_id','left');
 		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getPromocodeDetails($promocode_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'promo_code');
		$this->db->where('promocode_id',$promocode_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
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

}