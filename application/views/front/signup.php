<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mt-5">
                <!-- /col -->
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-center">
                        <h3>Sign Up</h3>
                        <p class="text-muted text-center text-md-center mt-2 mb-0">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                        </p>
                        <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                            <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sign Up </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <section class="sign-up-area pt-60 pb-60">
      <div class="container">
            
            <form name="frm_signup" id="sign-up-form" class="needs-validation user-add" method="POST" enctype="multipart/form-data">
              <div class="form-container ">
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
              <div class="row g-0"> 
                <div class="col-lg-4 "> 
                  <div class="basic-details">                          
                    <!-- row -->
                    <div class="row">                                
                      <!-- col -->
                      <div class="col-md-12">
                        <h3>Basic Details</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input class="form-control" name="fullName" id="fullName" placeholder="Full Name*" type="text">
                            <span id="err_full_name" style="color:red;"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="mobileNo" class="form-label">Mobile No</label>
                            <input class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile No*" type="text" maxlength="10">
                            <span id="err_mobileNo" style="color:red;"></span>

                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input class="form-control" id="emailAddress" name="emailAddress" placeholder="Email Address*" type="email">
                            <span id="err_emailAddress" style="color:red;"></span>

                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="emergencyno" class="form-label">Emergency Phone No </label>
                            <input class="form-control" id="emergencyno" name="emergencyno" placeholder="Emergency Phone No *" type="number" maxlength="10">
                            <span id="err_emergencyno" style="color:red;"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address" id="address"></textarea>
                            <span id="err_address" style="color:red;"></span>
                        </div>
                      </div>

                      <!-- /col -->
                    </div>
                    <!-- row --> 
                  </div>                       
                </div>
                <div class="col-lg-8">
                  <div class="Other-details">                          
                    <!-- row -->
                    <div class="row">                                
                      <!-- col -->
                      <div class="col-md-12">
                        <h3>Other Details</h3>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="selectGender" class="form-label">Select Gender</label>
                            <select class="form-select" aria-label="Default select example" id="selectGender" name="selectGender">
                              <option selected>Select Gender</option>
                              <option  value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option  value="Other">Other</option>
                            </select>
                            <span id="err_selectGender" style="color:red;"></span>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="selectWeight" class="form-label">Select Weight</label>
                            <select class="form-select" aria-label="Default select example" id="selectWeight" name="selectWeight">
                                <option selected>Select Weight</option>
                                <option value="50 to 80 kg">50 to 80 kg</option>
                                <option  value="80 to 100 kg">80 to 100 kg</option>
                                <option  value="100+ kg">100+ kg</option>
                            </select>
                            <span id="err_selectWeight" style="color:red;"></span>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="mobilityAid" class="form-label">Select Mobility Aid</label>
                            <select class="form-select" aria-label="Default select example" id="mobilityAid" name="mobilityAid">
                              <option selected>Select Mobility Aid</option>
                              <option  value="">None</option>
                              <option  value="Manual Wheelchair">Manual Wheelchair</option>
                              <option  value="Auto Wheelchair">Auto Wheelchair</option>
                              <option value="Walking frame">Walking frame</option>
                            </select>
                            <span id="err_mobilityAid" style="color:red;"></span>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="idNumber" class="form-label">Enter Identification Document</label>
                            <input class="form-control" id="idNumber" name="idNumber" placeholder="Enter Id Number*" type="text">
                            <span id="err_idNumber" style="color:red;"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="front_id_file" class="form-label">Upload Front View of ID Card</label>
                            <input class="form-control" type="file" id="front_id_file" name="front_id_file">

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="exampleInputEmail1" class="form-label">Upload Back View of ID Card</label>
                            <input class="form-control" type="file" id="back_id_file" name="back_id_file">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="medicalHistory" class="form-label">Enter Medical History</label>
                            <textarea class="form-control" name="medicalHistory" placeholder="Enter Medical History" id="medicalHistory"></textarea>
                            <span id="err_medicalHistory" style="color:red;"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20 text-center">
                            <button class="btn theme-btn " type="submit" id="btn_signup" name="btn_signup"><span>Save</span></button>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style text-center">
                            <p class=""> Don't have an account? <a  href="signin.html" >Sign Up</a></p>
                        </div>
                      </div>
                      
                      <!-- /col -->
                    </div>
                    <!-- row --> 
                  </div>
                </div>
              </div>
              </div>
            </form>                    
          
      </div>
    </section>  
        
    <div class="download-area color-1 " id="apps-review">
   
        <!-- Container -->
        <div class="container">
            <div class="inner-wrapper pt-60 pb-60">
               
               <!-- row -->
                <div class="row align-items-center justify-content-center">
                    <!-- col -->
                    <div class="col-lg-6  col-12">
                        <div class="text">
                            
                            <h2>Download for free from Apple & Play Store</h2>                            
                            <p>Get instant access to thousands of apps with a free download from the Apple and Play Store. Enjoy fast and convenient access to your favorite apps!</p>
                                <div class="mt-4 wow fadeInUp  animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                    <a href="#" class="btn theme-download">
                                        <img src="<?php echo base_url();?>template/front/images/svg/android.svg" alt="">
                                    </a>
                                    <a href="#" class="btn theme-download">
                                        <img src="<?php echo base_url();?>template/front/images/svg/apple.svg" alt="">
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="mr-lg-5">
                        <img src="<?php echo base_url();?>template/front/images/app.png" class="img-fluid  wow fadeInLeft  animated" data-wow-delay="0.2s" alt="" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    </div>
                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->
            </div>
        </div>
        <!-- /Container -->
    
    </div>