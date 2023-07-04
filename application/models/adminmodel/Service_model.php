<?php
Class Service_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	
	public function check_serviceexists($services_title)
	{
		$query="SELECT service_id FROM ".TBPREFIX."main_services WHERE service_name ='". $services_title."'"; 
		$sts = $this->db->query($query);
		return $sts->num_rows();
	}
	// Read data using username and password
	
	public function getAllServices()
	{
		$ch=',ch.service_tagline as service_tagline_ch,
		ch.service_tagline as service_tagline_ch,
		ch.paytype as paytype_ch,
		ch.pricetype as pricetype_ch,
		ch.amount as amount_ch,
		ch.duration as duration_ch,
		ch.buffer_time as buffer_time_ch,
		ch.payment_preferences as payment_preferences_ch';
		
		$this->db->select('ms.*,ch.service_name as service_name_ch,ch.service_description as service_description_ch'.$ch);
		$this->db->from(TBPREFIX.'main_services as ms');
		$this->db->join(TBPREFIX.'main_services_ch as ch','ch.service_id = ms.service_id','left');
		#$this->db->where('user_type',"Company");
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}

	public function getServiceInfo()
	{
		$this->db->select(TBPREFIX.'main_services.*');
		$res=$this->db->get(TBPREFIX.'main_services');
		return $tsr=$res->result_array();
	}
	
	
	// Read data using username and password
	public function getServiceDetails($service_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'main_services');
		$this->db->where('service_id',$service_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}

	public function getServiceDetails_ch($service_id,$qty) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'main_services_ch');
		$this->db->where('service_id',$service_id);
		$query = $this->db->get();
		if($qty==1)
			return $query->result_array();
		else
			return $query->num_rows();
	}
	
	public function checkServicePassword($old_password,$admin_id)
	{
		$this->db->select('admin_id');
		$this->db->from(TBPREFIX.'admin');
		$this->db->where('admin_id',$admin_id);
		$this->db->where('admin_password',md5($old_password));
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function udatPassord($admin_password,$adminId)
	{
	    $sts = "";
	    if($adminId > 0){
	     $admin_password = md5($admin_password);
		    $sts = $this->db->query("Update ".TBPREFIX."admin SET admin_password = '$admin_password' WHERE admin_id = '$adminId' ");
	    }
		return $sts;
	}
	
	public function getaddones($detail_id)
	{
		$this->db->select('detail_type,detail_value');
		$this->db->from(TBPREFIX.'menu_items_details');
		$this->db->where('detail_id',$detail_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getmodulelist($parent_role_id)
	{
		$this->db->select(TBPREFIX.'roles.role_type,'.TBPREFIX.'roles_modules.module_id,module_name,'.TBPREFIX.'roles.view,'.TBPREFIX.'roles.add,'.TBPREFIX.'roles.edit,'.TBPREFIX.'roles.delete');
		$this->db->join(TBPREFIX.'roles_modules',TBPREFIX.'roles_modules.module_id='.TBPREFIX.'roles.module_id','left');
		$this->db->where('parent_role_id',$parent_role_id);
		$this->db->from(TBPREFIX.'roles');
		
		$query = $this->db->get();
		return $query->result_array();	
	}
}