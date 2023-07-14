 <!-- Hero Start -->
 <div class="hero-2" style="background-image: url(images/hero/hero-02-bg.png)" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 wow fadeInLeft animated" data-wow-delay="0.4s">
                    
                        
                        <form name="login-form" id="login-form"  method="POST" enctype="multipart/form-data">
                        <?php if($this->session->flashdata('success')!=""){?>
						
                        <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success');?>
                        </div>
						<?php }?>
				
						<?php if($this->session->flashdata('error')!=""){?>
						
                        
                        <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error');?>
                        </div>
						<?php }?>
						<?php if($this->session->flashdata('error_msg')!=""){?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('error_msg');?>
                            </div>
						<?php }?>
                            <div class="row">
                                <div class="login-text">
                                    <h3 class="login-title">Sign In</h3>                   
                                    <p> Welcome back, please sign In to start </p>            
                                </div>
                            </div>
                            <!-- row -->
                            <div class="row">                                
                                <!-- col -->
                                <div class="col-md-12">
                                    <div class="contact-form-style mb-20">
                                        <label for="exampleInputEmail1" class="form-label">Enter OTP</label> <span style="color:red">*</span>
                                        <input class="form-control" name="mobile_otp" id="mobile_otp" placeholder="Enter OTP" type="text" maxlength="4" onkeypress="return /[0-9]/i.test(event.key)">
                                        <span id="err_mobile_otp" style="color:red;"></span>

                                    </div>
                                </div>
                                <!-- /col -->
                                
                                <div class="col-12">
                                    <button class="btn theme-btn " name="btn_verify_otp" id="btn_verify_otp" type="submit"><span>Verify OTP</span></button>
                                </div>
                                <div class="col-12">
                                    <?php if(isset($user_id)){?>
                                   <p class="dont-have-account"> Don't have an OTP? <a href="<?php echo base_url().'Home/resendOtp/'.base64_encode($user_id);?>">Resend OTP</a></p>
                                    <?php }?>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- row -->
                        </form>
                      
                 </div>
                <div class="col-lg-6 col-md-10">
                    <div class=" mt-5 mt-lg-0 wow fadeInRight animated" data-wow-delay="0.4s">
                        <img src="<?php echo base_url();?>template/front/images/hero/login.png" alt="" class="img-fluid d-block mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->