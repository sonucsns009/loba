<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  $this->load->model('adminmodel/Package_model');
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
	 public function managePackages()
	{
		$data['title']='Manage Packages';
		$data['packageList']=$this->Package_model->getAllPackages();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/managePackages',$data);
		$this->load->view('admin/admin_footer');
	}
   
	## Add Service 
	public function addPackage()
	{
		$data['title']='Add New Package';
		if(isset($_POST['btn_save_package']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('description','Description','required');
			
			if($this->form_validation->run())
			{
				$title              =$this->input->post('title');
				$description        =$this->input->post('description');
				$price              =$this->input->post('price');
				$discountprice      =$this->input->post('discountprice');
				$features           =$this->input->post('features');
				$period             =$this->input->post('period');
				$type	            =$this->input->post('type');
                $status             =$this->input->post('status');

                // CH
                $title_ch              =$this->input->post('title_ch');
				$description_ch        =$this->input->post('description_ch');
				$price_ch              =$this->input->post('price_ch');
				$discountprice_ch      =$this->input->post('discountprice_ch');
				$features_ch           =$this->input->post('features_ch');
				$period_ch             =$this->input->post('period_ch');
				$type_ch	           =$this->input->post('type_ch');
				
				// check already exists
				$pkg_exists = $this->Package_model->check_pkgexists($title);

				if($pkg_exists == 0)
				{
                    $input_data=array(
                        'package_title'=>$title,
                        'package_description'=>$description,
                        'package_price'=>$price,
                        'package_discount_price'=>$discountprice,
                        'package_period'=>$period,
                        'package_features'=>$features,
                        'package_type'=>$type,
                        'package_status'=>$status
                    );

                    $package_id=$this->Common_Model->insert_data('packages',$input_data);
                        //echo $this->db->last_query();//exit;
                    if($package_id > 0)
                    {
                        $input_data_ch=array(
                            'package_id'=>$package_id,
                            'package_title_ch'=>$title_ch,
                            'package_description_ch'=>$description_ch,
                            'package_price_ch'=>$price_ch,
                            'package_discount_price_ch'=>$discountprice_ch,
                            'package_period_ch'=>$period_ch,
                            'package_features_ch'=>$features_ch,
                            'package_type_ch'=>$type_ch
                        );
                        $package_id_ch=$this->Common_Model->insert_data('packages_ch',$input_data_ch);
                        echo $this->db->last_query();
                        $this->session->set_flashdata('success','Record added successfully.');
                        redirect(base_url().'backend/Packages/managePackages');	
					}
					else
					{	   
						$data['packageInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while adding record.');
					}
				}
				else
				{
						$data['packageInfo'] = $_POST;
						$this->session->set_flashdata('error','Package already exists.');		
				}
			}
			else
			{
				$data['packageInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addPackage',$data);
		$this->load->view('admin/admin_footer');
	}

	## Update Service 
	public function updatePackage()
	{
		$data['title']='Update Package';
		
		$package_id=base64_decode($this->uri->segment(4));
		if($package_id)
		{
			$data['packageInfo']=$packageInfo=$this->Package_model->getPackageDetails($package_id,1);
			$data['packageInfo_ch']=$packageInfo_ch=$this->Package_model->getPackageDetails_ch($package_id,1);
			if(isset($_POST['btn_update_package']))
			{
				//print_r($_POST);
				$this->form_validation->set_rules('title','Title','required');
			    $this->form_validation->set_rules('description','Description','required');
				
				if($this->form_validation->run())
				{
					$title              =$this->input->post('title');
                    $description        =$this->input->post('description');
                    $price              =$this->input->post('price');
                    $discountprice      =$this->input->post('discountprice');
                    $features           =$this->input->post('features');
                    $period             =$this->input->post('period');
                    $type	            =$this->input->post('type');
                    $status             =$this->input->post('status');

                    // CH
                    $title_ch              =$this->input->post('title_ch');
                    $description_ch        =$this->input->post('description_ch');
                    $price_ch              =$this->input->post('price_ch');
                    $discountprice_ch      =$this->input->post('discountprice_ch');
                    $features_ch           =$this->input->post('features_ch');
                    $period_ch             =$this->input->post('period_ch');
                    $type_ch	           =$this->input->post('type_ch');

					
                    $input_data=array(
                        'package_title'=>$title,
                        'package_description'=>$description,
                        'package_price'=>$price,
                        'package_discount_price'=>$discountprice,
                        'package_period'=>$period,
                        'package_features'=>$features,
                        'package_type'=>$type,
                        'package_status'=>$status
                    );
						 
                    $this->Common_Model->update_data('packages','package_id',$package_id,$input_data);
						//	echo $this->db->last_query();exit;
						if($package_id > 0)
						{
                            $input_data_ch=array(
                                'package_id'=>$package_id,
                                'package_title_ch'=>$title_ch,
                                'package_description_ch'=>$description_ch,
                                'package_price_ch'=>$price_ch,
                                'package_discount_price_ch'=>$discountprice_ch,
                                'package_period_ch'=>$period_ch,
                                'package_features_ch'=>$features_ch,
                                'package_type_ch'=>$type_ch,
                                'dateupdated'=>date('Y-m-d H:i:s')
                            );
                            $this->Common_Model->update_data('packages_ch','package_id',$package_id,$input_data_ch);
							$this->session->set_flashdata('success','Record updated successfully.');
							redirect(base_url().'backend/Packages/managePackages');	
						}
						else
						{	   
							$data['packageInfo'] = $_POST;
							$this->session->set_flashdata('error','Error while adding record.');
						}
				}
				else
				{
					$data['packageInfo'] = $_POST;
					$this->session->set_flashdata('error',$this->form_validation->error_string());
				}
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/updatePackage',$data);
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