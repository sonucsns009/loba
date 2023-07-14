<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mt-5">
            <!-- /col -->
            <div class="col-lg-12">
                <div class="title-heading text-center text-md-center">
                    <h3><?php echo $this->lang->line('edit_profile');?></h3>
                    <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard') ?>"><?php echo $this->lang->line('dashboard');?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('my_profile');?></li>
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
                <?php $this->load->view('front/sidebar_left'); ?>
            </div>
            <div class="col-lg-9">
            <form name="login-form" id="login-form"  method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <?php if ($this->session->flashdata('success') != "") { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error') != "") { ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error_msg') != "") { ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error_msg'); ?>
                            </div>
                        <?php } ?>
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $this->lang->line('my_profile');?> </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><?php echo $this->lang->line('basic_details');?></h5>
                                </div>
                                <div class="col-md-12">
                                    <label><?php echo $this->lang->line('add_profile_photo');?></label><br/>
                                        <div class="row">
                                            <div class="col-md-3">
                                                    <img src="<?php echo base_url() . 'uploads/user/profile_photo/' . $userdata['profile_pic']; ?>" style="height:80px; width:70px;" class="img-circle"/>
                                                    <input type="hidden" name="hide_profile_photo" id="hide_profile_photo" value="<?php echo $userdata['profile_pic'];?>"/>    
                                                </div>
                                            <div class="col-md-9">
                                                <div class="contact-form-style mb-20">
                                                    <div class="upload__box">

                                                        <div class="upload__img-wrap">
                                                            <div class="upload__btn-box order-last">
                                                                <label class="upload__btn">
                                                                    <img src="<?php echo base_url()?>template/front/images/svg/add.svg" class="img-fluid">
                                                                    <input type="file"  class="upload__inputfile" name="profile_pic" id="profile_pic">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="fullName" class="form-label"><?php echo $this->lang->line('full_name');?></label>
                                        <input class="form-control" name="fullName" id="fullName" placeholder="Full Name*" type="text" value="<?php echo $userdata['full_name']; ?>">
                                        <span id="err_full_name" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="mobileNo" class="form-label"><?php echo $this->lang->line('mobile_no');?></label>
                                        <input class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile No*" type="text" value="<?php echo $userdata['mobile']; ?>">
                                        <span id="err_mobileNo" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="emailAddress" class="form-label"><?php echo $this->lang->line('email_address');?></label>
                                        <input class="form-control" id="emailAddress" name="emailAddress" placeholder="Email Address*" type="email" value="<?php echo $userdata['email']; ?>">
                                        <span id="err_emailAddress" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="emergencyno" class="form-label"><?php echo $this->lang->line('emergency_phone_no');?> </label>
                                        <input class="form-control" id="emergencyno" name="emergencyno" placeholder="Emergency Phone No *" type="text" value="<?php echo $userdata['alt_mobile']; ?>">
                                        <span id="err_emergencyno" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form-style mb-20">
                                        <label for="address" class="form-label"><?php echo $this->lang->line('address');?></label>
                                        <textarea class="form-control" name="address" placeholder="Address" id="address"><?php echo $userdata['address']; ?></textarea>
                                        <span id="err_address" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h5><?php echo $this->lang->line('other_details');?></h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="selectGender" class="form-label" ><?php echo $this->lang->line('select_gender');?></label>
                                        <select class="form-select" aria-label="Default select example" id="selectGender" name="selectGender">
                                            <option selected>Select Gender</option>
                                            <option <?php if ($userdata['gender'] == "Male") {
                                                        echo "selected";
                                                    } ?> value="Male">Male</option>
                                            <option <?php if ($userdata['gender'] == "Female") {
                                                        echo "selected";
                                                    } ?> value="Female">Female</option>
                                            <option <?php if ($userdata['gender'] == "Other") {
                                                        echo "selected";
                                                    } ?> value="Other">Other</option>
                                        </select>
                                        <span id="err_selectGender" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="selectWeight" class="form-label"><?php echo $this->lang->line('select_weight');?></label>
                                        <select class="form-select" aria-label="Default select example"  id="selectWeight" name="selectWeight">
                                            <option selected>Select Weight</option>
                                            <option <?php if ($userdata['weight'] == "50 to 80 kg") {
                                                        echo "selected";
                                                    } ?> value="50 to 80 kg">50 to 80 kg</option>
                                            <option <?php if ($userdata['weight'] == "80 to 100 kg") {
                                                        echo "selected";
                                                    } ?> value="80 to 100 kg">80 to 100 kg</option>
                                            <option <?php if ($userdata['weight'] == "100+ kg") {
                                                        echo "selected";
                                                    } ?> value="100+ kg">100+ kg</option>
                                        </select>
                                        <span id="err_selectWeight" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="mobilityAid" class="form-label"><?php echo $this->lang->line('select_mobility_aid');?></label>
                                        <select class="form-select" aria-label="Default select example" id="mobilityAid" name="mobilityAid">
                                            <option selected>Select Mobility Aid</option>
                                            <option <?php if ($userdata['mobility_aid'] == "") {
                                                        echo "selected";
                                                    } ?> value="">None</option>
                                            <option <?php if ($userdata['mobility_aid'] == "Manual Wheelchair") {
                                                        echo "selected";
                                                    } ?> value="Manual Wheelchair">Manual Wheelchair</option>
                                            <option <?php if ($userdata['mobility_aid'] == "Auto Wheelchair") {
                                                        echo "selected";
                                                    } ?> value="Auto Wheelchair">Auto Wheelchair</option>
                                            <option <?php if ($userdata['mobility_aid'] == "Walking frame") {
                                                        echo "selected";
                                                    } ?> value="Walking frame">Walking frame</option>
                                        </select>
                                        <span id="err_mobilityAid" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="idNumber" class="form-label"><?php echo $this->lang->line('enter_identification_document');?></label>
                                        <input class="form-control" id="idNumber" name="idNumber" placeholder="Enter Id Number*" type="text" value="<?php echo $userdata['id_proof_no']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="front_id_file" class="form-label"><?php echo $this->lang->line('upload_front_view_of_id_card');?></label><br />
                                        <div class="row">
                                                <div class="col-md-3">
                                                    <img src="<?php echo base_url() . 'uploads/id_proof/' . $userdata['id_proof_front']; ?>" style="height:80px; width:70px;" />
                                                    <input type="hidden" name="hide_front_id_file" id="hide_front_id_file" value="<?php echo $userdata['id_proof_front'];?>"/>    
                                                </div>
                                            <div class="col-md-9">
                                                <div class="contact-form-style mb-20">
                                                    <div class="upload__box">

                                                        <div class="upload__img-wrap">
                                                            <div class="upload__btn-box order-last">
                                                                <label class="upload__btn">
                                                                    <img src="<?php echo base_url()?>template/front/images/svg/add.svg" class="img-fluid">
                                                                    <input type="file"  class="upload__inputfile" name="front_id_file" id="front_id_file">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('upload_back_view_of_id_card');?></label><br />

                                    <div class="contact-form-style mb-20">
                                        <div class="row">
                                            <div class="col-md-3">

                                                <img src="<?php echo base_url() . 'uploads/id_proof/' . $userdata['id_proof_back']; ?>" style="height:80px; width:70px;" />
                                                <input type="hidden" name="hide_back_id_file" id="hide_back_id_file" value="<?php echo $userdata['id_proof_back'];?>"/>    

                                            </div>
                                            <div class="col-md-9">
                                                <div class="contact-form-style mb-20">
                                                    <div class="upload__box">

                                                        <div class="upload__img-wrap">
                                                            <div class="upload__btn-box order-last">
                                                                <label class="upload__btn">
                                                                    <img src="<?php echo base_url()?>template/front/images/svg/add.svg" class="img-fluid">
                                                                    <input type="file" class="upload__inputfile" name="back_id_file" id="back_id_file">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form-style mb-20">
                                        <label for="medicalHistory" class="form-label"><?php echo $this->lang->line('enter_medical_history');?></label>
                                        <textarea class="form-control" name="medicalHistory" placeholder="Enter Medical History" id="medicalHistory"><?php echo $userdata['medical_history']; ?></textarea>
                                        <span id="err_medicalHistory" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form-style mb-20 text-center">
                                        <button class="btn theme-btn " type="submit" id="btn_signup" name="btn_signup"><span><?php echo $this->lang->line('update');?></span></button>
                                    </div>
                                    <!-- <div class="contact-form-style mb-20 text-center">
                                        <button class="btn theme-btn " type="submit" id="btn_edit_profile" name="btn_edit_profile"><span>Update</span></button>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>