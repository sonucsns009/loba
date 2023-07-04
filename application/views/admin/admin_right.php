<!-- Page Sidebar Start-->
 <?php //$sessiondata=$this->session->userdata('logged_in');
// 	#print_r($sessiondata);exit;
// $session_admin_id=$sessiondata['admin_id']; 
// $session_admin_name=$sessiondata['admin_name'];
// $session_user_type=$sessiondata['user_type'];
// $session_subroles=$sessiondata['subroles'];

// //if($session_user_type=="Subadmin" && $session_subroles!="NULL")
// {
// 	$modulesId=$this->Admin_model->getmodulelist($session_subroles);
// }
#echo $this->db->last_query();
 #echo '<pre>';print_r($modulesId);exit;
?>

        <div class="page-sidebar" style="width:270px;">
            <div class="main-header-left d-none d-lg-block" >
                <div class="logo-wrapper" style="padding: 5px;">
                	<a href="<?php echo base_url();?>backend/dashboard">
                		<img class="blur-up lazyloaded" src="<?php echo base_url('template/admin/');?>assets/images/logos/loba_logo_1.png" alt="LOBA logo">
                	</a>
                </div>
            </div>
            <div class="sidebar custom-scrollbar">
               
                <ul class="sidebar-menu">
                   
					 <li <?php if($this->router->fetch_class()=='Dashboard'){?>style="background-color: #AA4FF6; color: #fff;"<?php }?>class="  <?php if($this->router->fetch_method()=='dashboard'){?>nav-expanded nav-active <?php }?>">
						<a class="sidebar-header" href="<?php echo base_url("backend/");?>Dashboard"><!-- <i data-feather="home"></i> --><img src="<?php echo base_url()."/uploads/flaticon/Dashboard-icon.png"?>" style="max-height: 30px;max-width: 30px;"> &nbsp;&nbsp;<span>DASHBOARD</span></a>                        
					</li>
					
					<li  <?php if($this->router->fetch_class()=='Services'){?>style="background-color: #AA4FF6; color: #fff;"<?php }?>class=" <?php if($this->router->fetch_method()=='manageService'){?>nav-expanded nav-active <?php }?>"
							>
						<a class="sidebar-header" href="<?php echo base_url("backend/");?>Services/manageService"><!-- <i data-feather="home"></i> --><img src="<?php echo base_url()."/uploads/flaticon/manager.png"?>" style="max-height: 30px;max-width: 30px;">  &nbsp;&nbsp;<span <?php if($this->router->fetch_class()=='Services'){?>style="color: #fff;"<?php }?>>SERVICES</span></a>                        
					</li>
					
					<li <?php if($this->router->fetch_class()=='Doctors'){?>style="background-color: #AA4FF6; color: #fff;"<?php }?>class=" <?php if($this->router->fetch_method()=='manageDoctor'){?>nav-expanded nav-active <?php }?>">
						<a class="sidebar-header" href="<?php echo base_url();?>backend/Doctors/manageDoctor"><!-- <i data-feather="home"></i> --><img src="<?php echo base_url()."/uploads/flaticon/doctors.png"?>" style="max-height: 25px;max-width: 25px;">  &nbsp;&nbsp;<span>DOCTORS</span></a>                        
					</li>

					<li <?php if($this->router->fetch_class()=='Nurse'){?>style="background-color: #AA4FF6; color: #fff;"<?php }?>class=" <?php if($this->router->fetch_method()=='manageNurse'){?>nav-expanded nav-active <?php }?>">
						<a class="sidebar-header" href="<?php echo base_url();?>backend/Nurse/manageNurse"><!-- <i data-feather="home"></i> --><img src="<?php echo base_url()."/uploads/flaticon/nurse.png"?>" style="max-height: 25px;max-width: 25px;">  &nbsp;&nbsp;<span>NURSES</span></a>                        
					</li>
					
					
					<li><a class="sidebar-header" href="<?php echo base_url();?>backend/Login/logout"><!-- <i data-feather="home"></i> --><img src="<?php echo base_url()."/uploads/flaticon/exit.png"?>" style="max-height: 25px;max-width: 25px;">  &nbsp;&nbsp;<span>LOGOUT</span></a>
                    </li>	
                 </ul>
            </div>
        </div>
<br>
        <!-- Page Sidebar Ends-->

        
