<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nurse extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  $this->load->model('adminmodel/Nurse_model');
		  $this->load->model('Common_Model');
		// $this->load->library("pagination");
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function index()
	{
        $data['title']='Nurse';
		$this->load->view('admin/admin_header');
	}
	// // code for manage Nurse
	 public function manageNurse()
	{
		$data['title']='Manage Nurse';
		$data['nurseList']=$this->Nurse_model->getAllNurse();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/manageNurse',$data);
		$this->load->view('admin/admin_footer');
	}
   
	## Add Service 
	public function addNurse()
	{
		$data['title']='Add New Nurse';
		if(isset($_POST['btn_save_nurse']))
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
				//$password				=md5($this->input->post('password'));
				
				// check already exists
				$user_exists = $this->Nurse_model->check_userexists($mobile);

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
							'nurse_full_name'=>$full_name,
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

						$nurse_id=$this->Common_Model->insert_data('nurse',$input_data);
							//echo $this->db->last_query();//exit;
						if($nurse_id > 0)
						{
							if($full_name_ch!='' )
							{
								$input_data_ch=array(
									'nurse_id'=>$nurse_id,
									'nurse_full_name_ch'=>$full_name_ch,
									'address_ch'=>$address_ch,
									'from_organization_ch'=>$from_organization_ch,
									'charges_per_hourse_ch'=>$charges_per_hourse_ch,
									'charges_per_visit_ch'=>$charges_per_visit_ch,
									'added_date'=>date('Y-m-d H:i:s'),
									'updated_date'=>date('Y-m-d H:i:s')
								);
								$nurse_id_ch=$this->Common_Model->insert_data('nurse_ch',$input_data_ch);
							}
							$this->session->set_flashdata('success','Record added successfully.');
							redirect(base_url().'backend/Nurse/manageNurse');	
						}
						else
						{	   
							$data['nurseInfo'] = $_POST;
							$this->session->set_flashdata('error','Error while adding record.');
						}
					}
					else
					{	   
						$data['nurseInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while adding record.');
					}
				}
				else
				{
						$data['nurseInfo'] = $_POST;
						$this->session->set_flashdata('error','Nurse already exists.');		
				}
			}
			else
			{
				$data['nurseInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addNurse',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function updateNurse()
	{
		$data['title']='Update Nurse';
		
		$nurse_id=base64_decode($this->uri->segment(4));
		if($nurse_id)
		{
			
			$nurse=$this->Nurse_model->getNurseDetails($nurse_id,1);

			$data['nurseInfo']=$nurseInfo=$this->Nurse_model->getNurseDetails($nurse_id,1);
			$data['nurseInfo_ch']=$nurseInfo=$this->Nurse_model->getNurseDetails_ch($nurse_id,1);
			if(isset($_POST['btn_update_nurse']))
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
                    $address_ch             =$this->input->post('address_ch');
                    $from_organization_ch   =$this->input->post('from_organization_ch');
                    $charges_per_hourse_ch  =$this->input->post('charges_per_hourse_ch');
                    $charges_per_visit_ch	=$this->input->post('charges_per_visit_ch');
					// $password				=$this->input->post('password');
					// if($password!="")
					// {
					// 	$password=md5($password);	
					// }
					// else
					// {
					// 	$password=$nurse[0]['password'];
					// }
					$input_data=array(
                        'full_name'=>$full_name,
                        'email'=>$email,
                        'mobile'=>$mobile,
                        'address'=>$address,
                        'user_type'=>'Service Provider',
                        'status_flag'=>'Active',
                        'edit_date'=>date('Y-m-d H:i:s')
					);
					$user=$this->Common_Model->update_data('users','user_id',$nurse[0]['user_id'],$input_data);

                    $input_data=array(
                        'nurse_full_name'=>$full_name,
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
						 
                    $this->Common_Model->update_data('nurse','nurse_id',$nurse_id,$input_data);
						//	echo $this->db->last_query();exit;
						if($nurse_id > 0)
						{
							if($full_name_ch!='')
							{
								$input_data_ch=array(
                                    'nurse_id'=>$nurse_id,
                                    'nurse_full_name_ch'=>$full_name_ch,
                                    'address_ch'=>$address_ch,
                                    'from_organization_ch'=>$from_organization_ch,
                                    'charges_per_hourse_ch'=>$charges_per_hourse_ch,
                                    'charges_per_visit_ch'=>$charges_per_visit_ch,
                                    'added_date'=>date('Y-m-d H:i:s'),
                                    'updated_date'=>date('Y-m-d H:i:s')
                                );
                                $this->Common_Model->update_data('nurse_ch','nurse_id',$nurse_id,$input_data_ch);
                            }
							$this->session->set_flashdata('success','Record updated successfully.');
							redirect(base_url().'backend/Nurse/manageNurse');	
						}
						else
						{	   
							$data['nurseInfo'] = $_POST;
							$this->session->set_flashdata('error','Error while adding record.');
						}
				}
				else
				{
					$data['nurseInfo'] = $_POST;
					$this->session->set_flashdata('error',$this->form_validation->error_string());
				}
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/updateNurse',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function nurseDetails()
	{
		$data['title']='Nurse Details';
		$nurse_id=base64_decode($this->uri->segment(4));
		if($nurse_id)
		{
			$data['nurseInfo']=$nurseInfo=$this->Nurse_model->getNurseDetails($nurse_id,1);
			$data['nurseInfo_ch']=$nurseInfo=$this->Nurse_model->getNurseDetails_ch($nurse_id,1);
		}
		//$arrSession = $this->session->userdata('logged_in');
		//$admin_id = $arrSession['admin_id'];
		$data['error_msg']='';
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/nurseDetails',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function deleteNurse()
	{
		$data['title']='Delete Nurse';
		
		$nurse_id=base64_decode($this->uri->segment(4));
		if($nurse_id)
		{
			$input_data=array(
				'nurse_status' => 'Delete',
				'updated_date'=>date('Y-m-d H:i:s'),
			);
			$this->Common_Model->update_data('nurse','nurse_id',$nurse_id,$input_data);
			//	echo $this->db->last_query();exit;
		 
			$this->session->set_flashdata('success','Record delete successfully.');
			redirect(base_url().'backend/Nurse/manageNurse');	
		}
		else
		{	   
			$data['nurseInfo'] = $_POST;
			$this->session->set_flashdata('error','Error while adding record.');
		}
	}

}