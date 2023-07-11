<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Promocode extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  $this->load->model('adminmodel/Promocode_model');
		  $this->load->model('adminmodel/User_model');
		  $this->load->model('Common_Model');
		// $this->load->library("pagination");
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function index()
	{
        $data['title']='Packages';
		$this->load->view('admin/admin_header');
	}
	// // code for manage Packages
	public function managePromocode()
	{
		$data['title']='Manage Promocode';
		$data['promocodeList']=$this->Promocode_model->getAllPromocodes();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/managePromocode',$data);
		$this->load->view('admin/admin_footer');
	}
   
	## Add Service 
	public function addPromocode()
	{
		$data['title']='Add New Promocode';
        $data['serviceList']=$this->User_model->getAllServices();
		if(isset($_POST['btn_save_promocode']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('promocode','Promotion Code','required');
			$this->form_validation->set_rules('promocodetype','Promotion Type','required');
			
			if($this->form_validation->run())
			{
				$promocode          =$this->input->post('promocode');
				$promocodetype      =$this->input->post('promocodetype');
				$price              =$this->input->post('price');
				$percentage         =$this->input->post('percentage');
				$service_id         =$this->input->post('service_id');
                if($promocodetype=='Fixed Price')
                {
                    $discount=$price;
                }
                else if($promocodetype=='Percentage')
                {
                    $discount=$percentage;
                }
				// check already exists
				// $pkg_exists = $this->Package_model->check_pkgexists($title);

				// if($pkg_exists == 0)
				// {
                    $input_data=array(
                        'service_id'=>$service_id,
                        'promocode_code'=>$promocode,
                        'promocode_type'=>$promocodetype,
                        'promocode_discount'=>$discount,
                        'promocode_status' => 'Active'
                    );

                    $code_id=$this->Common_Model->insert_data('promo_code',$input_data);
                        //echo $this->db->last_query();
                        //exit;
                    $this->session->set_flashdata('success','Record added successfully.');
                    redirect(base_url().'backend/Promocode/managePromocode');	
				// }
				// else
				// {
				// 		$data['packageInfo'] = $_POST;
				// 		$this->session->set_flashdata('error','Package already exists.');		
				// }
			}
			else
			{
				$data['packageInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addPromocode',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function updatePromocode()
	{
		$data['title']='Update Promocode';
        $data['serviceList']=$this->User_model->getAllServices();
		$code_id=base64_decode($this->uri->segment(4));
		if($code_id)
		{
			$data['promocodeInfo']=$promocodeInfo=$this->Package_model->getPackageDetails($package_id,1);
			$data['promocodeInfo_ch']=$promocodeInfo_ch=$this->Package_model->getPackageDetails_ch($package_id,1);
			if(isset($_POST['btn_update_promocode']))
			{
				//print_r($_POST);
				$this->form_validation->set_rules('promocode','Promotion Code','required');
			    $this->form_validation->set_rules('promocodetype','Promotion Type','required');
				
				if($this->form_validation->run())
				{
					$promocode          =$this->input->post('promocode');
                    $promocodetype      =$this->input->post('promocodetype');
                    $price              =$this->input->post('price');
                    $percentage         =$this->input->post('percentage');
                    $service_id         =$this->input->post('service_id');
                    if($promocodetype=='Fixed Price')
                    {
                        $discount=$price;
                    }
                    else if($promocodetype=='Percentage')
                    {
                        $discount=$percentage;
                    }
                    
                    $input_data=array(
                        'service_id'=>$service_id,
                        'promocode_code'=>$promocode,
                        'promocode_type'=>$promocodetype,
                        'promocode_discount'=>$discount,
                        'promocode_status' => 'Active'
                    );
                    $this->Common_Model->update_data('promo_code','promocode_id',$code_id,$input_data);
                        
                    $this->session->set_flashdata('success','Record updated successfully.');
                    redirect(base_url().'backend/Promocode/managePromocode');
				}
				else
				{
					$data['packageInfo'] = $_POST;
					$this->session->set_flashdata('error',$this->form_validation->error_string());
				}
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/updatePromocode',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function packageDetails()
	{
		$data['title']='Package Details';
		$package_id=base64_decode($this->uri->segment(4));
		if($package_id)
		{
			$data['packageInfo']=$packageInfo=$this->Package_model->getNurseDetails($package_id,1);
			$data['packageInfo_ch']=$packageInfo_ch=$this->Package_model->getNurseDetails_ch($package_id,1);
		}
		//$arrSession = $this->session->userdata('logged_in');
		//$admin_id = $arrSession['admin_id'];
		$data['error_msg']='';
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/packageDetails',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function deletePackage()
	{
		$data['title']='Delete Package';
		
		$package_id=base64_decode($this->uri->segment(4));
		if($package_id)
		{
			$input_data=array(
				'package_status' => 'Delete',
				'dateupdated'=>date('Y-m-d H:i:s'),
			);
			$this->Common_Model->update_data('packages','package_id',$package_id,$input_data);
			//	echo $this->db->last_query();exit;
		 
			$this->session->set_flashdata('success','Record delete successfully.');
			redirect(base_url().'backend/Packages/managePackages');	
		}
		else
		{	   
			$data['nurseInfo'] = $_POST;
			$this->session->set_flashdata('error','Error while adding record.');
		}
	}

}