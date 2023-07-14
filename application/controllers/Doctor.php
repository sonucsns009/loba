<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {
    public function __construct()
	{
		  parent::__construct();
		  $this->load->model('frontmodel/Doctor_model');
          $this->load->model('frontmodel/Home_model');

		  $this->load->library("pagination");	
		  $cookie_name = 'site_lang';
		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}

		if($lang=="english")
		{
			$this->lang->load('rest_controller_lang');
		}
		else
		{
			$this->lang->load('rest_controller_lang','chinese');

		}
         // $this->lang->load('rest_controller_lang','chinese');
		//   if(! $this->session->userdata('logged_in'))
		//   {
		// 	 redirect('Login', 'refresh');
		//   }
	}
    public function bookDoctorService($category=0)
	{
        $data['title']= $this->lang->line('doctor');

		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
        $cookie_name = 'site_lang';

        if(!isset($_COOKIE[$cookie_name])) {

            $lang = 'english';
  
          } else {
  
            $lang = $_COOKIE[$cookie_name];
  
          }
        if($category==3)
        {
            $data['doctorList']=$doctorList=$this->Doctor_model->getDoctorList($user_id,1,$lang);
        }
        if($category==4)
        {
            $data['doctorList']=$doctorList=$this->Home_model->getNurseList($user_id,1,$lang);
            // echo "<pre>";
            // print_r($data['doctorList']);
            // exit;
        }
        $data['category_id']=$category;
        $this->load->view('front/front_header');
        if($category==3)
        {
		    $this->load->view('front/doctor_booking_list',$data);
        }

		if($category==4)
        {
		    $this->load->view('front/nurse_booking_list',$data);

        }
		$this->load->view('front/front_footer');
    }
    //code for book doctor
    public function bookDoctor($id=0,$category_id=0)
	{
        $data['title']= $this->lang->line('doctor');

		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
        $doctor_id=base64_decode($id);
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
        $cookie_name = 'site_lang';

        if(!isset($_COOKIE[$cookie_name])) {

            $lang = 'english';
  
          } else {
  
            $lang = $_COOKIE[$cookie_name];
  
          }

          $data['category_id']=base64_decode($category_id);

          $data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);
          $data['selectedAddress']=$selectedAddress=$this->Home_model->getSelectedPickupAddress($user_id,1,$lang);
          $data['selectedDropAddress']=$selectedDropAddress=$this->Home_model->getSelectedDropAddress($user_id,1,$lang);
  
        $data['doctorList']=$doctorList=$this->Doctor_model->getDoctorById($doctor_id,1,$lang);
        
        $this->load->view('front/front_header');
		
		$this->load->view('front/book_doctor',$data);
		
		$this->load->view('front/front_footer');
    }
    //code for book nurse
    public function bookNurse($id=0,$category_id=0)
	{
        $data['title']= $this->lang->line('doctor');

		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
        $nurse_id=base64_decode($id);
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
        $cookie_name = 'site_lang';

        if(!isset($_COOKIE[$cookie_name])) {

            $lang = 'english';
  
          } else {
  
            $lang = $_COOKIE[$cookie_name];
  
          }

          $data['category_id']=base64_decode($category_id);

          $data['userAddresses']=$this->Home_model->getUserAddreess($user_id,1,$lang);
          $data['selectedAddress']=$selectedAddress=$this->Home_model->getSelectedPickupAddress($user_id,1,$lang);
          $data['selectedDropAddress']=$selectedDropAddress=$this->Home_model->getSelectedDropAddress($user_id,1,$lang);
  
        $data['doctorList']=$doctorList=$this->Doctor_model->getNurseById($nurse_id,1,$lang); 
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);

        $this->load->view('front/front_header');
		
		$this->load->view('front/book_nurse',$data);
		
		$this->load->view('front/front_footer');
    }
    //code for doctor search
    public function getDoctorSearchByName()
	{
        $data['title']= $this->lang->line('doctor');

		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
        $doctor_name=$_POST['doctor_search'];
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
        $cookie_name = 'site_lang';

        if(!isset($_COOKIE[$cookie_name])) {

            $lang = 'english';
  
          } else {
  
            $lang = $_COOKIE[$cookie_name];
  
          }
        $data['doctorListnm']=$doctorListnm=$this->Doctor_model->getDoctorByName($doctor_name,1,$lang);
        
        $output='';
        if(count($doctorListnm)>0){
            foreach($doctorListnm as $row)
            {
                $output.='<div class="col-lg-6" class="">
                                <div class="Staff-detail-wraper">
                                    <div class="Staff-img">';
                                        if($row['doctor_image']!=""){
                                            $output.='<img src="'.base_url().'uploads/doctor_images/'.$row['doctor_image'].'" class="img-fluid">';
                                         }else{
                                            $output.='<img src="'.base_url().'uploads/user/user.png'.'" class="img-fluid">';
                                        }

                                        $output.=' </div>
                                    <div class="Staff-containt">
                                        <div class="Staff-basic-details">
                                            <div class="staff-left">
                                                <h5>'.$row['doctor_full_name'].'</h5>';
                                                $output.='<p class="specility">'.$row['specialization'].'</p>';
                                                $output.='<p class="staff-fee">Fees :-  HK'.$row['charges_per_hourse'].'</p>';
                                                
                                                $output.='</div> 
                                            <div class="staff-right">
                                                <p class="Staff-id">ID : '.$row['loba_id'].'</p>';
                                                $output.='<div class="staff-contact">
                                                    <a href="'.base_url().'Doctor/bookDoctor/'.base64_encode($row['doctor_id']).'" class="btn theme-btn ">Book Now</a>
                                                    
                                                </div>
                                            </div>                                                    
                                        </div>                                                
                                    </div>                             
                                </div> 
                            </div>';

            }
        }
        else
        {
            $data['doctorList']=$doctorList=$this->Doctor_model->getDoctorList($user_id,1,$lang);

            if(count($doctorList)>0)
            {
                foreach($doctorList as $row)
                {
                    $output.='<div class="col-lg-6" class="">
                                    <div class="Staff-detail-wraper">
                                        <div class="Staff-img">';
                                            if($row['doctor_image']!=""){
                                                $output.='<img src="'.base_url().'uploads/doctor_images/'.$row['doctor_image'].'" class="img-fluid">';
                                             }else{
                                                $output.='<img src="'.base_url().'uploads/user/user.png'.'" class="img-fluid">';
                                            }
    
                                            $output.=' </div>
                                        <div class="Staff-containt">
                                            <div class="Staff-basic-details">
                                                <div class="staff-left">
                                                    <h5>'.$row['doctor_full_name'].'</h5>';
                                                    $output.='<p class="specility">'.$row['specialization'].'</p>';
                                                    $output.='<p class="staff-fee">Fees :-  HK'.$row['charges_per_hourse'].'</p>';
                                                    
                                                    $output.='</div> 
                                                <div class="staff-right">
                                                    <p class="Staff-id">ID : '.$row['loba_id'].'</p>';
                                                    $output.='<div class="staff-contact">
                                                        <a href="'.base_url().'Doctor/bookDoctor/'.base64_encode($row['doctor_id']).'" class="btn theme-btn ">Book Now</a>
                                                        
                                                    </div>
                                                </div>                                                    
                                            </div>                                                
                                        </div>                             
                                    </div> 
                                </div>';
    
                }
            }
        }
        echo $output;
    }

 //code for nurse search
 public function geNurseSearchByName()
 {
     $data['title']= $this->lang->line('doctor');

     date_default_timezone_set(DEFAULT_TIME_ZONE);	
     $sessiondata=$this->session->userdata('logged_in');
     $nurse_search=$_POST['nurse_search'];
     $user_id=0;
     if(isset($sessiondata))
     {
         $user_id=$sessiondata['user_id']; 
     }
     $cookie_name = 'site_lang';

     if(!isset($_COOKIE[$cookie_name])) {

         $lang = 'english';

       } else {

         $lang = $_COOKIE[$cookie_name];

       }
     $data['doctorListnm']=$doctorListnm=$this->Doctor_model->getNurseByName($nurse_search,1,$lang);
     
     $output='';
     if(count($doctorListnm)>0){
         foreach($doctorListnm as $row)
         {
             $output.='<div class="col-lg-6" class="">
                             <div class="Staff-detail-wraper">
                                 <div class="Staff-img">';
                                     if($row['nurse_image']!=""){
                                         $output.='<img src="'.base_url().'uploads/nurse_images/'.$row['nurse_image'].'" class="img-fluid">';
                                      }else{
                                         $output.='<img src="'.base_url().'uploads/user/user.png'.'" class="img-fluid">';
                                     }

                                     $output.=' </div>
                                 <div class="Staff-containt">
                                     <div class="Staff-basic-details">
                                         <div class="staff-left">
                                             <h5>'.$row['nurse_full_name'].'</h5>';
                                             $output.='<p class="staff-fee">Fees :-  HK'.$row['charges_per_hourse'].'</p>';
                                             
                                             $output.='</div> 
                                         <div class="staff-right">
                                             <p class="Staff-id">ID : '.$row['loba_id'].'</p>';
                                             $output.='<div class="staff-contact">
                                                 <a href="'.base_url().'Doctor/bookNurse/'.base64_encode($row['nurse_id']).'" class="btn theme-btn ">Book Now</a>
                                                 
                                             </div>
                                         </div>                                                    
                                     </div>                                                
                                 </div>                             
                             </div> 
                         </div>';

         }
     }
     else
     {
         $data['doctorList']=$doctorList=$this->Doctor_model->getDoctorList($user_id,1,$lang);

         if(count($doctorList)>0)
         {
             foreach($doctorList as $row)
             {
                 $output.='<div class="col-lg-6" class="">
                                 <div class="Staff-detail-wraper">
                                     <div class="Staff-img">';
                                         if($row['doctor_image']!=""){
                                             $output.='<img src="'.base_url().'uploads/doctor_images/'.$row['doctor_image'].'" class="img-fluid">';
                                          }else{
                                             $output.='<img src="'.base_url().'uploads/user/user.png'.'" class="img-fluid">';
                                         }
 
                                         $output.=' </div>
                                     <div class="Staff-containt">
                                         <div class="Staff-basic-details">
                                             <div class="staff-left">
                                                 <h5>'.$row['doctor_full_name'].'</h5>';
                                                 $output.='<p class="specility">'.$row['specialization'].'</p>';
                                                 $output.='<p class="staff-fee">Fees :-  HK'.$row['charges_per_hourse'].'</p>';
                                                 
                                                 $output.='</div> 
                                             <div class="staff-right">
                                                 <p class="Staff-id">ID : '.$row['loba_id'].'</p>';
                                                 $output.='<div class="staff-contact">
                                                     <a href="'.base_url().'Doctor/bookDoctor/'.base64_encode($row['doctor_id']).'" class="btn theme-btn ">Book Now</a>
                                                     
                                                 </div>
                                             </div>                                                    
                                         </div>                                                
                                     </div>                             
                                 </div> 
                             </div>';
 
             }
         }
     }
     echo $output;
 }
    //code for add doctor booking
	public function addDoctorBooking()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}

		$pickup_address_id=$_POST['pickup_address_id'];
		$drop_address_id=$_POST['drop_address_id'];
		$category_id=$_POST['category_id'];
		$booking_time=$_POST['booking_time'];
		$booking_date=$_POST['booking_date'];
		
		$doctor_id=$_POST['doctor_id'];

		$updatedata=array(
			"service_category_id"=>$category_id,
			"session_id"=>$user_id,
			"user_id"=>$user_id,
			"pickup_address_id"=>$pickup_address_id,
			"drop_address_id"=>$drop_address_id,
			"pickup_type"=>"",
			"drop_type"=>"",
			"booking_date"=>$booking_date,
			"time_slot"=>$booking_time,
			"no_of_hourse"=>"",
			"select_mobility_aid"=>"",
			"booking_status"=>"pending",
			"doctor_id"=>$doctor_id,
			"date_added"=>$user_id,
			"date_updated"=>$user_id,
		);
		//$this->db->where('address_id',$id);
		$this->db->insert('loba_service_booking',$updatedata);
		$insert_id=$this->db->insert_id();
		echo $insert_id;
		
	}
    //code for add doctor booking
	public function addNurseBooking()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}

		$pickup_address_id=$_POST['pickup_address_id'];
		$drop_address_id=$_POST['drop_address_id'];
		$category_id=$_POST['category_id'];
		$booking_time=$_POST['booking_time'];
		$booking_date=$_POST['booking_date'];
		$NoofHours=$_POST['NoofHours'];
		
		$nurse_id=$_POST['nurse_id'];
		$booking_id=$_POST['booking_id'];
        //$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);

        if($booking_id > 0)
        {
            $updatedata=array(
                "service_category_id"=>$category_id,
                "session_id"=>$user_id,
                "user_id"=>$user_id,
                "pickup_address_id"=>$pickup_address_id,
                "drop_address_id"=>$drop_address_id,
                "pickup_type"=>"",
                "drop_type"=>"",
                "booking_date"=>$booking_date,
                "time_slot"=>$booking_time,
                "no_of_hourse"=>$NoofHours,
                "select_mobility_aid"=>"",
                "booking_status"=>"pending",
                "nurse_id"=>$nurse_id,
                "date_added"=>$user_id,
                "date_updated"=>$user_id,
            );
            $this->db->where('booking_id',$booking_id);
            $this->db->update('loba_service_booking',$updatedata);
            //$insert_id=$this->db->insert_id();

            echo $updatedata;

        }
        else
        {
            $updatedata=array(
                "service_category_id"=>$category_id,
                "session_id"=>$user_id,
                "user_id"=>$user_id,
                "pickup_address_id"=>$pickup_address_id,
                "drop_address_id"=>$drop_address_id,
                "pickup_type"=>"",
                "drop_type"=>"",
                "booking_date"=>$booking_date,
                "time_slot"=>$booking_time,
                "no_of_hourse"=>$NoofHours,
                "select_mobility_aid"=>"",
                "booking_status"=>"pending",
                "nurse_id"=>$nurse_id,
                "date_added"=>$user_id,
                "date_updated"=>$user_id,
            );
            //$this->db->where('address_id',$id);
            $this->db->insert('loba_service_booking',$updatedata);
            $insert_id=$this->db->insert_id();
            echo $updatedata;
        }
		
		
	}
    //code for doctor booking details
	public function doctorBookingDetails()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		

        $data['user_id']=$user_id;

		
		if(isset($_POST['btn_pay_now']))
		{
			redirect('Home/cardList');
		}
		$this->load->view('front/front_header');
		$this->load->view('front/orderPlaceDoctor',$data);
		$this->load->view('front/front_footer');
	}

    //code for nurse booking details
	public function nurseBookingDetails()
	{
		date_default_timezone_set(DEFAULT_TIME_ZONE);	
		$sessiondata=$this->session->userdata('logged_in');
		$user_id=0;
		if(isset($sessiondata))
		{
			$user_id=$sessiondata['user_id']; 
		}
		$data['userData']=$userData=$this->Home_model->getUserProfileInfo($user_id,1);
		$data['bookingData']=$bookingData=$this->Home_model->geBookingInfo($user_id,1);
		
		$data['pickupaddress']=$pickupaddress=$this->Home_model->getPickupAddress($bookingData['pickup_address_id'],1);
		$data['dropaddress']=$dropaddress=$this->Home_model->getPickupAddress($bookingData['drop_address_id'],1);
		$data['categoryInfo']=$categoryInfo=$this->Home_model->getCategoryInfo($bookingData['service_category_id'],1);
		

        $data['user_id']=$user_id;

		
		if(isset($_POST['btn_pay_now']))
		{
			redirect('Home/cardList');
		}
		$this->load->view('front/front_header');
		$this->load->view('front/orderPlaceDoctor',$data);
		$this->load->view('front/front_footer');
	}
}
?>