<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mt-5">
                <!-- /col -->
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-center">
                        <h3>Edit profile</h3>
                        <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                            <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
                        
            <div class="row">                 
                <div class="col-lg-3"> 
                   <?php $this->load->view('front/sidebar_left');?>                                
                </div> 
                <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header">
                       <h4 class="card-title">My Profile <a class="btn theme-btn pull-right" href="<?php echo site_url('Home/editProfile')?>" ><span>Edit Profile</span></a></h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Basic Details</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <label for="FullName" class="form-label">Full Name</label>
                                    <input class="form-control" name="subject" id="FullName" placeholder="Full Name*" type="text" value="<?php echo $userdata['full_name'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <label for="MobileNo" class="form-label">Mobile No</label>
                                    <input class="form-control" id="MobileNo" name="subject" placeholder="Mobile No*" type="text" value="<?php echo $userdata['mobile'];?>">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <label for="EmailAddress" class="form-label">Email Address</label>
                                    <input class="form-control" id="EmailAddress" name="subject" placeholder="Email Address*" type="email" value="<?php echo $userdata['email'];?>">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <label for="Emergencyno" class="form-label">Emergency Phone No </label>
                                    <input class="form-control" id="Emergencyno" name="subject" placeholder="Emergency Phone No *" type="text" value="<?php echo $userdata['alt_mobile'];?>">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="contact-form-style mb-20">
                                    <label for="Address" class="form-label">Address</label>
                                    <textarea class="form-control" name="Address" placeholder="Address" id="Address"><?php echo $userdata['address'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5>Other Details</h5>
                            </div>
                            <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="SelectGender" class="form-label">Select Gender</label>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Select Gender</option>
                              <option <?php if($userdata['gender']=="Male"){ echo "selected";}?> value="Male">Male</option>
                              <option <?php if($userdata['gender']=="Female"){ echo "selected";}?> value="Female">Female</option>
                              <option <?php if($userdata['gender']=="Other"){ echo "selected";}?> value="Other">Other</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="SelectWeight" class="form-label">Select Weight</label>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Select Weight</option>
                              <option <?php if($userdata['weight']=="50 to 80 kg"){ echo "selected";}?> value="50 to 80 kg">50 to 80 kg</option>
                              <option <?php if($userdata['weight']=="80 to 100 kg"){ echo "selected";}?> value="80 to 100 kg">80 to 100 kg</option>
                              <option <?php if($userdata['weight']=="100+ kg"){ echo "selected";}?> value="100+ kg">100+ kg</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="MobilityAid" class="form-label">Select Mobility Aid</label>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Select Mobility Aid</option>
                              <option <?php if($userdata['mobility_aid']==""){ echo "selected";}?> value="">None</option>
                              <option <?php if($userdata['mobility_aid']=="Manual Wheelchair"){ echo "selected";}?> value="Manual Wheelchair">Manual Wheelchair</option>
                              <option <?php if($userdata['mobility_aid']=="Auto Wheelchair"){ echo "selected";}?> value="Auto Wheelchair">Auto Wheelchair</option>
                              <option <?php if($userdata['mobility_aid']=="Walking frame"){ echo "selected";}?> value="Walking frame">Walking frame</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="IdNumber" class="form-label">Enter Identification Document</label>
                            <input class="form-control" id="IdNumber" name="subject" placeholder="Enter Id Number*" type="text" value="<?php echo $userdata['id_proof_no'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="exampleInputEmail1" class="form-label">Upload Front View of ID Card</label><br/>
                            <img src="<?php echo base_url().'uploads/id_proof/'.$userdata['id_proof_front'];?>" style="height:100px; width:100px;"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-form-style mb-20">
                            <label for="exampleInputEmail1" class="form-label">Upload Back View of ID Card</label><br/>
                            <img src="<?php echo base_url().'uploads/id_proof/'.$userdata['id_proof_back'];?>" style="height:100px; width:100px;"/>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mb-20">
                            <label for="MedicalHistory" class="form-label">Enter Medical History</label>
                            <textarea class="form-control" name="Address" placeholder="Enter Medical History" id="Enter MedicalHistory"><?php echo $userdata['medical_history'];?></textarea>
                        </div>
                      </div>
                            
                        </div>
                      </div>
                    </div>
                                                       
                </div>               
            </div>                               
          
        </div>
    </section>  