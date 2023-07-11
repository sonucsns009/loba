<?php
Class LoginModel extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	// Read data using username and password
	public function check_login($data) 
	{
		if(!empty ($data))
		{
			$condition = "email = '".$data['username']."' OR mobile = '".$data['username']."'";
			$this->db->select('*');
			$this->db->from(TBPREFIX.'users');
			$this->db->where($condition);
			$this->db->where('user_type','Service Provider');
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			return $query->num_rows();
		}
	}

	// Read data using username and password
	public function chk_login($data,$qty) 
	{
		$condition = "(email = '".$data['username']."' OR mobile = '".$data['username']."') ";			  
		$this->db->select('*');
		$this->db->from(TBPREFIX.'users');
		$this->db->where($condition);
		$this->db->where('user_type','Service Provider');
		if(isset($data['fingerprint']) && $data['fingerprint']!="")
		{
			$this->db->where('fingerprint_code',$data['fingerprint']);
		}
		$this->db->limit(1);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if ($qty==0) 
		{
			return $query->num_rows();
		} 
		else 
		{
			return $query->row();
		}
	}

	public function check_user($user_id) 
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
			return $query->num_rows();
		}
	}

	public function chk_otp($data,$qty) 
	{
		if(!empty ($data))
		{
			$this->db->select('*');
			$this->db->from(TBPREFIX.'users');
			$this->db->where('user_id',$data['user_id']);
			$this->db->where('otp',$data['otp']);
			$this->db->where('user_type','Service Provider');
			$this->db->limit(1);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			if ($qty==0) 
			{
				return $query->num_rows();
			} 
			else 
			{
				return $query->row();
			}
		}
	}

	public function chkUserEmailExists($email) 
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email_address',$email);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	/*
	public function updateAdminPassword($admin_email,$rnd_number)
	{
		$data = array('admin_password' => md5($rnd_number) );
		$this->db->where('user_type','Super Admin');
		$this->db->where('admin_email',$admin_email);
		$this->db->update('admin',$data); 
	}*/
}