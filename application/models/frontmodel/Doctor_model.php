<?php
Class Doctor_model extends CI_Model {
	function __construct()
	{	// Call the Model constructor
		parent::__construct();
	}	

    //get doctor list
    public function getDoctorList($user_id,$qty,$lng)
	{
		if($lng == "" || $lng == 'english')
			$strPrefix = "";
		else
			$strPrefix = "_ch";
		$this->db->select('*');
		$query=$this->db->get(TBPREFIX.'doctors'.$strPrefix.'');

		if($qty==1)

			return $query->result_array();

		else

			return $query->num_rows();
	}

    //get doctor by id
    public function getDoctorById($doctor_id,$qty,$lng)
	{
		if($lng == "" || $lng == 'english')
			$strPrefix = "";
		else
			$strPrefix = "_ch";
		$this->db->select('*');
        $this->db->where(TBPREFIX.'doctors'.$strPrefix.'.doctor_id',$doctor_id);
		$query=$this->db->get(TBPREFIX.'doctors'.$strPrefix.'');

		if($qty==1)

			return $query->row_array();

		else

			return $query->num_rows();
	}

     //get nurse by id
     public function getNurseById($nurse_id,$qty,$lng)
     {
         if($lng == "" || $lng == 'english')
             $strPrefix = "";
         else
             $strPrefix = "_ch";
         $this->db->select('*');
         $this->db->where(TBPREFIX.'nurse'.$strPrefix.'.nurse_id',$nurse_id);
         $query=$this->db->get(TBPREFIX.'nurse'.$strPrefix.'');
 
         if($qty==1)
 
             return $query->row_array();
 
         else
 
             return $query->num_rows();
     }
    //get doctor by name
    public function getDoctorByName($doctor_name,$qty,$lng)
	{
		if($lng == "" || $lng == 'english')
			$strPrefix = "";
		else
			$strPrefix = "_ch";
		$this->db->select('*');
       // $this->db->where(TBPREFIX.'doctors'.$strPrefix.'.doctor_full_name',$doctor_name);
        $this->db->like(TBPREFIX.'doctors'.$strPrefix.'.doctor_full_name',$doctor_name);
		$query=$this->db->get(TBPREFIX.'doctors'.$strPrefix.'');

		if($qty==1)

			return $query->result_array();

		else

			return $query->num_rows();
	}

    //get doctor by name
    public function getNurseByName($nurse_search,$qty,$lng)
	{
		if($lng == "" || $lng == 'english')
			$strPrefix = "";
		else
			$strPrefix = "_ch";
		$this->db->select('*');
       // $this->db->where(TBPREFIX.'doctors'.$strPrefix.'.doctor_full_name',$doctor_name);
        $this->db->like(TBPREFIX.'nurse'.$strPrefix.'.nurse_full_name',$nurse_search);
		$query=$this->db->get(TBPREFIX.'nurse'.$strPrefix.'');

		if($qty==1)

			return $query->result_array();

		else

			return $query->num_rows();
	}
}
?>