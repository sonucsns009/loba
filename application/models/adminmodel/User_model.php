<?php

Class User_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllUsers()
	{
		$this->db->select('d.*,ch.*');
		$this->db->from(TBPREFIX.'doctors as d');
		$this->db->join(TBPREFIX.'doctors_ch as ch','ch.doctor_id = d.doctor_id','left');
		$res=$this->db->get();
		return $tsr=$res->result_array();
	}
}