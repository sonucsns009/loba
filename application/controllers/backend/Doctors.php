<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctors extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  $this->load->model('adminmodel/Doctor_model');
		  $this->load->model('Common_Model');
		// $this->load->library("pagination");
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function index()
	{
		$this->load->view('admin/admin_header');
	}
	// // code for manage Admin
	 public function manageDoctor()
	{
		$data['title']='Manage Doctors';
		$data['doctorList']=$this->Doctor_model->getAllDoctors();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/manageDoctors',$data);
		$this->load->view('admin/admin_footer');
	}
   
	## Add Service 
	public function addDoctor()
	{
		$data['title']='Add New Doctor';
		if(isset($_POST['btn_save_doctor']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('full_name_ch','Full Name','required');
			
			if($this->form_validation->run())
			{
				$full_name           =$this->input->post('full_name');
				$email               =$this->input->post('email');
				$mobile              =$this->input->post('mobile');
				$address             =$this->input->post('address');
				$from_organization   =$this->input->post('from_organization');
				$charges_per_hourse  =$this->input->post('charges_per_hourse');
				$charges_per_visit	 =$this->input->post('charges_per_visit');

                // CH
				$full_name_ch           =$this->input->post('full_name_ch');
				//$email_ch               =$this->input->post('email_ch');
                //$mobile_ch              =$this->input->post('mobile_ch');
				$address_ch             =$this->input->post('address_ch');
				$from_organization_ch   =$this->input->post('from_organization_ch');
				$charges_per_hourse_ch  =$this->input->post('charges_per_hourse_ch');
				$charges_per_visit_ch	=$this->input->post('charges_per_visit_ch');
				$password	            =md5($this->input->post('password'));
				
				// check already service exists
				$user_exists = $this->Doctor_model->check_userexists($mobile);

				if($user_exists == 0)
				{
					$input_data=array(
                        'full_name'=>$full_name,
                        'email'=>$email,
                        'mobile'=>$mobile,
                        'address'=>$address,
                        'user_type'=>'Service Provider',
                        'status_flag'=>'Active',
                        'added_date'=>date('Y-m-d H:i:s'),
                        'edit_date'=>date('Y-m-d H:i:s')
					);
					$user_id=$this->Common_Model->insert_data('users',$input_data);
					if($user_id > 0)
					{
						$input_data=array(
							'user_id'=>$user_id,
							'doctor_full_name'=>$full_name,
							'email'=>$email,
							'mobile_no'=>$mobile,
							'address'=>$address,
							'from_organization'=>$from_organization,
							'charges_per_hourse'=>$charges_per_hourse,
							'charges_per_visit'=>$charges_per_visit,
							'password'=>$password,
							'added_date'=>date('Y-m-d H:i:s'),
							'updated_date'=>date('Y-m-d H:i:s')
						);

						$doctor_id=$this->Common_Model->insert_data('doctors',$input_data);
							//echo $this->db->last_query();//exit;
						if($doctor_id > 0)
						{
							if($full_name_ch!='' )
							{
								$input_data_ch=array(
									'doctor_id'=>$doctor_id,
									'doctor_full_name_ch'=>$full_name_ch,
									'address_ch'=>$address_ch,
									'from_organization_ch'=>$from_organization_ch,
									'charges_per_hourse_ch'=>$charges_per_hourse_ch,
									'charges_per_visit_ch'=>$charges_per_visit_ch,
									'added_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s')
								);
								$doctor_id_ch=$this->Common_Model->insert_data('doctors_ch',$input_data_ch);
							}
							$this->session->set_flashdata('success','Record added successfully.');
							redirect(base_url().'backend/Doctors/manageDoctor');	
						}
						else
						{	   
							$data['doctorInfo'] = $_POST;
							$this->session->set_flashdata('error','Error while adding record.');
						}
					}
					else
					{	   
						$data['doctorInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while adding record.');
					}
				}
				else
				{
						$data['doctorInfo'] = $_POST;
						$this->session->set_flashdata('error','Doctor already exists.');		
				}
			}
			else
			{
				$data['doctorInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addDoctor',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function updateDoctor()
	{
		$data['title']='Update Doctor';
		
		$doctor_id=base64_decode($this->uri->segment(4));

		if($doctor_id)
		{
			$data['doctorInfo']=$doctorInfo=$this->Doctor_model->getDoctorDetails($doctor_id,1);
			$data['doctorInfo_ch']=$doctorInfo=$this->Doctor_model->getDoctorDetails_ch($doctor_id,1);
			if(isset($_POST['btn_update_doctor']))
			{
				$doctor=$this->Doctor_model->getDoctorDetails($doctor_id,1);
				//print_r($_POST);
				$this->form_validation->set_rules('full_name','Full Name','required');
			    $this->form_validation->set_rules('full_name_ch','Full Name','required');
				
				if($this->form_validation->run())
				{
					$full_name           =$this->input->post('full_name');
                    $email               =$this->input->post('email');
                    $mobile              =$this->input->post('mobile');
                    $address             =$this->input->post('address');
                    $from_organization   =$this->input->post('from_organization');
                    $charges_per_hourse  =$this->input->post('charges_per_hourse');
                    $charges_per_visit	 =$this->input->post('charges_per_visit');

                    // CH
                    $full_name_ch           =$this->input->post('full_name_ch');
                    $address_ch             =$this->input->post('address_ch');
                    $from_organization_ch   =$this->input->post('from_organization_ch');
                    $charges_per_hourse_ch  =$this->input->post('charges_per_hourse_ch');
                    $charges_per_visit_ch	=$this->input->post('charges_per_visit_ch');
                    $password	            =$this->input->post('password');
					
					if($password!="")
					{
						$password=md5($password);
					}
					else
					{
						$password=$doctor[0]['password'];
					}

					$input_data=array(
                        'full_name'=>$full_name,
                        'email'=>$email,
                        'mobile'=>$mobile,
                        'address'=>$address,
                        'user_type'=>'Service Provider',
                        'status_flag'=>'Active',
                        'edit_date'=>date('Y-m-d H:i:s')
					);
					$user=$this->Common_Model->update_data('users','user_id',$doctor[0]['user_id'],$input_data);

					$input_data=array(
                        'doctor_full_name'=>$full_name,
                        'email'=>$email,
                        'mobile_no'=>$mobile,
                        'address'=>$address,
                        'from_organization'=>$from_organization,
                        'charges_per_hourse'=>$charges_per_hourse,
                        'charges_per_visit'=>$charges_per_visit,
                        'password'=>$password,
                        'added_date'=>date('Y-m-d H:i:s'),
                        'updated_date'=>date('Y-m-d H:i:s')
					);
						 
                    $this->Common_Model->update_data('doctors','doctor_id',$doctor_id,$input_data);
						//	echo $this->db->last_query();exit;
						if($doctor_id > 0)
						{
							if($full_name_ch!='')
							{
								$input_data_ch=array(
                                    'doctor_id'=>$doctor_id,
                                    'doctor_full_name_ch'=>$full_name_ch,
                                    'address_ch'=>$address_ch,
                                    'from_organization_ch'=>$from_organization_ch,
                                    'charges_per_hourse_ch'=>$charges_per_hourse_ch,
                                    'charges_per_visit_ch'=>$charges_per_visit_ch,
                                    'added_date'=>date('Y-m-d H:i:s'),
                                    'updated_date'=>date('Y-m-d H:i:s')
                                );
                                $this->Common_Model->update_data('doctors_ch','doctor_id',$doctor_id,$input_data_ch);
                            }
							$this->session->set_flashdata('success','Record updated successfully.');
							redirect(base_url().'backend/Doctors/manageDoctor');	
						}
						else
						{	   
							$data['doctorInfo'] = $_POST;
							$this->session->set_flashdata('error','Error while adding record.');
						}
				}
				else
				{
					$data['doctorInfo'] = $_POST;
					$this->session->set_flashdata('error',$this->form_validation->error_string());
				}
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/updateDoctor',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function doctorDetails()
	{
		$data['title']='Doctor Details';
		$doctor_id=base64_decode($this->uri->segment(4));
		if($doctor_id)
		{
			$data['doctorInfo']=$doctorInfo=$this->Doctor_model->getDoctorDetails($doctor_id,1);
			$data['doctorInfo_ch']=$doctorInfo=$this->Doctor_model->getDoctorDetails_ch($doctor_id,1);
		}
		//$arrSession = $this->session->userdata('logged_in');
		//$admin_id = $arrSession['admin_id'];
		$data['error_msg']='';
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/doctorDetails',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function deleteDoctor()
	{
		$data['title']='Delete Doctor';
		
		$doctor_id=base64_decode($this->uri->segment(4));
		if($doctor_id)
		{
			$input_data=array(
				'doctor_status' => 'Delete',
				'updated_date'=>date('Y-m-d H:i:s'),
			);
			$this->Common_Model->update_data('doctors','doctor_id',$doctor_id,$input_data);
			//	echo $this->db->last_query();exit;

			$input_data_ch=array(
				'doctor_status_ch' => 'Delete',
				'updated_date'=>date('Y-m-d H:i:s'),
			);
			$this->Common_Model->update_data('doctors_ch','doctor_id',$doctor_id,$input_data_ch);
			//	echo $this->db->last_query();exit;
		 
			$this->session->set_flashdata('success','Record delete successfully.');
			redirect(base_url().'backend/Doctors/manageDoctor');	
		}
		else
		{	   
			$data['doctorInfo'] = $_POST;
			$this->session->set_flashdata('error','Error while adding record.');
		}
	}

}