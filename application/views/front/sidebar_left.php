<?php
$user_id=""; 
$email="";
$full_name="";
$mobile="";
$profile_pic="";
$gender="";
$is_verify="";
$user_type="";
$status_flag="";
$sessiondata=$this->session->userdata('logged_in');
//echo '<pre>';print_r($sessiondata);exit;

if(isset($sessiondata))
{
	//print_r($sessiondata);exit;
  $user_id=$sessiondata['user_id']; 
  $email=$sessiondata['email'];
  $full_name=$sessiondata['full_name'];
  $mobile=$sessiondata['mobile'];
  $profile_pic=$sessiondata['profile_pic'];
  $gender=$sessiondata['gender'];
  $is_verify=$sessiondata['is_verify'];
  $user_type=$sessiondata['user_type'];
  $status_flag=$sessiondata['status_flag'];
}


?>
<div class="admin-sidebar">
                        <div class="profile-section">
                            <div class="profile-img">
                                <?php if($profile_pic!=""){?>
                                <img src="<?php echo base_url().'uploads/user/profile_photo/'.$profile_pic;?>" class="img-fluid" alt="user images" id="user-avtar-leftmenu">
                                <?php }else {?> 
                                    <img src="<?php echo base_url()?>template/front/images/avatar/1.png" class="img-fluid" alt="user images" id="user-avtar-leftmenu">
                                <?php }?>                                    
                            </div>
                            <div class="profile">
                                <div class="profile-name"><?php echo $full_name;?></div>
                                <a class="edit-profile" href="<?php echo site_url("Home/editProfile");?>">Edit profile</a>          
                            </div>                        
                        </div>
                        <ul class="fb-left-bar-menus">
                            <li><a href="Dashboard.html"> <i class="uil-file-alt" ></i>My Booking </a></li>
                            <li><a href="<?php echo site_url('Home/myProfile')?>" class="active"> <i class="uil-user" ></i> My Profile</a></li>
                            <li><a href="chatbook.html"> <i class="uil-comment-alt-message" ></i> Chat box </a></li>
                            <li><a href="MyAddress.html"> <i class="uil-location-point"></i> Address </a></li>
                            <li><a href="mypayment.html" ><i class="uil-credit-card" ></i> Payment </a></li>
                            <li><a href="medical-records.html"><i class="uil-file-plus-alt" ></i> Medical  Records </a></li>                             
                            <li><a href="index.html"><i class="uil-signout" ></i> Log Out</a></li>
                        </ul>
                    </div>   