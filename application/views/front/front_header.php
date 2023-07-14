<!-- Page Sidebar Start-->
<?php 
//echo '<pre>';print_r("chk");exit;
$user_id=""; 
$email="";
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
  $mobile=$sessiondata['mobile'];
  $profile_pic=$sessiondata['profile_pic'];
  $gender=$sessiondata['gender'];
  $is_verify=$sessiondata['is_verify'];
  $user_type=$sessiondata['user_type'];
  $status_flag=$sessiondata['status_flag'];
}


$cookie_name = 'site_lang';



		if(!isset($_COOKIE[$cookie_name])) {

		  $lang = 'english';

		} else {

		  $lang = $_COOKIE[$cookie_name];

		}

//echo $this->db->last_query();
?>
<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href=" https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css " rel="stylesheet">

    <link href="<?php echo base_url();?>template/front/Plugin/owel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>template/front/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />
    <link href="<?php echo base_url();?>template/front/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>template/front/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Loba</title>
  </head>
  <body>

     <!-- PreLoader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"><div class="cc"></div></div>
        </div>
    </div>
    <!--Preloader-->

    <header id="topnav" class="defaultscroll sticky">
        
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
          <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>template/front/images/logo-dark.png" class="l-dark" height="40" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link <?php if(isset($title) && $title=="home"){ echo "active"; }?>" aria-current="page" href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?php if(isset($title) && $title=="about_s"){ echo  "active"; }?>" href="<?php echo site_url('Home/aboutus');?>"></span><?php echo $this->lang->line('about');?></a>
              </li>
              <li class="nav-item <?php if(isset($title) && $title=="contact_us"){ echo  "active"; }?>">
                  <a class="nav-link" href="<?php echo site_url('Home/contactus');?>"><?php echo $this->lang->line('contact');?></a>
              </li>              
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <?php if($lang =="english"){?>
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="flag-icon flag-icon-us"> </span> English
                  </a>
                  <?php }else{?>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="flag-icon flag-icon-ca"> </span> Chinese
                    </a>
                  <?php }?>

                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="<?php echo site_url('languageswitcher/switchlang/english')?>" class="dropdown-item" href="#"><span class="flag-icon flag-icon-us"> </span> English</a></li>
                    <li><a href="<?php echo site_url('languageswitcher/switchlang/chinese')?>" class="dropdown-item" href="#"><span class="flag-icon flag-icon-ca"> </span> Chinese</a></li>
                    
                  </ul>
                </li>              
                
                <?php if(isset($user_id) && $user_id > 0){?>
                <li class="nav-item dropdown">   
                <?php if($profile_pic!=""){?>                 
                  <a href="#" class="nav-link d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    
                    <img src="<?php echo base_url().'uploads/user/profile_photo/'.$profile_pic;?>" alt="mdo" class="rounded-circle" width="32" height="32">
                  </a>
                  <?php }else {?> 
                    <a href="#" class="nav-link d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    
                      <img src="<?php echo base_url()?>template/front/images/avatar/1.png" alt="mdo" class="rounded-circle" width="32" height="32">
                    </a>
                    <?php }?>   
                  <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="<?php echo site_url("Dashboard");?>">Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>                    
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Home/signOut")?>">Sign out</a></li>
                  </ul>       
                </li>
                  <?php }else{?>
                <li class="nav-item"><a href="<?php echo base_url().'Home/login';?>" class="btn theme-btn-1">Login</a></li>
                <li class="nav-item"><a href="<?php echo base_url().'Home/signUp';?>" class="btn theme-btn">Sign-up</a></li>
                <?php }?>

            </ul>
          </div>
      </div>
    </nav>
  </header>