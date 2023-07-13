<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> ADD SERVICE PROVIDER</h5>
                            </div>
                            <div class="card-body">
							 <?php if($this->session->flashdata('success')!=""){?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $this->session->flashdata('success');?>
						</div>
						<?php }?>
				
						<?php if($this->session->flashdata('error')!=""){?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $this->session->flashdata('error');?>
						</div>
						<?php } ?>
						<?php if($this->session->flashdata('error_msg')!=""){?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $this->session->flashdata('error_msg');?>
						</div>
						<?php }?>
						
                                <ul class="nav nav-tabs tab-coupon" id="myTabContent" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="basicinfo-tab" data-toggle="tab" href="#basicinfo" role="tab" aria-controls="basicinfo" aria-selected="true" data-original-title="" title="">Basic Details</a></li>
									
                                </ul>
								<form name="frm_addslider" id="frm_addslider" class="needs-validation user-add" method="POST" enctype="multipart/form-data">
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">   
									   		<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="services_title" ><span>*</span> Full Name</label>
	                                                <input class="form-control" id="full_name" type="text" required="" name="full_name" value="<?php echo $serviceproviderInfo[0]['full_name'];?>" placeholder="Enter Full Name">
													<div class="err_msg" id="err_full_name"></div>
												</div>
												
												<div class="col-sm-6">
	                                                <label for="services_title_ch" ><span>*</span> Full Name(Chinese)</label>
	                                                <input class="form-control" id="full_name_ch" type="text" required="" name="full_name_ch" value="<?php echo $serviceproviderInfo_ch[0]['full_name'];?>" placeholder="輸入全名">
													<div class="err_msg" id="err_full_name_ch"></div>
												</div>
                                            </div>

											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="email" ><span>*</span> Email</label>
	                                                <input class="form-control" id="email" type="text" required="" name="email" value="<?php echo $serviceproviderInfo[0]['email'];?>" placeholder="Enter Email Address">
													<div class="err_msg" id="err_email"></div>
												</div>
												<div class="col-sm-6">
												<label for="email" ><span>*</span> Email (Chinese)</label>
	                                                <input class="form-control" id="email" type="text" required="" name="email_ch" value="<?php echo $serviceproviderInfo[0]['email'];?>" placeholder="請輸入電郵地址">
													<div class="err_msg" id="err_email_ch"></div>
												</div>
                                            </div>

											<div class="form-group row">
												<div class="col-sm-6">
	                                                <label for="mobile" ><span>*</span> Mobile No</label>
	                                                <input class="form-control" id="mobile" type="text" required="" name="mobile" value="<?php echo $serviceproviderInfo[0]['mobile'];?>" placeholder="Enter Mobile No">
													<div class="err_msg" id="err_mobile"></div>
												</div>
												<div class="col-sm-6">
												<label for="mobile" ><span>*</span> Mobile No (Chinese)</label>
	                                                <input class="form-control" id="mobile" type="text" required="" name="mobile_ch" value="<?php echo $serviceproviderInfo_ch[0]['mobile'];?>" placeholder="輸入手機號碼">
													<div class="err_msg" id="err_mobile"></div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-6">
												<label for="mobile" ><span>*</span> Emergency Mobile No</label>
	                                                <input class="form-control" id="alt_mobile" type="text" required="" name="alt_mobile" value="<?php echo $serviceproviderInfo[0]['alt_mobile'];?>" placeholder="Enter Emergency Phone No">
													<div class="err_msg" id="err_alt_mobile"></div>
												</div>
												<div class="col-sm-6">
												<label for="mobile" ><span>*</span> Emergency Mobile No (Chinese)</label>
	                                                <input class="form-control" id="alt_mobile" type="text" required="" name="alt_mobile_ch" value="<?php echo $serviceproviderInfo_ch[0]['alt_mobile'];?>" placeholder="緊急手機號碼">
													<div class="err_msg" id="err_alt_mobile"></div>
												</div>
                                            </div>
											 
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label  ><span>*</span> Address</label>
	                                                <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter Address"><?php echo $serviceproviderInfo[0]['address'];?></textarea>
													<div class="err_msg" id="err_address"></div>
												</div>
												<div class="col-sm-6">
	                                                <label><span>*</span> Address (Chinese)</label>
	                                               <textarea class="form-control" name="address_ch" id="address_ch" rows="4" placeholder="地址"><?php echo $serviceproviderInfo_ch[0]['address'];?></textarea>
													<div class="err_msg" id="err_address_ch"></div>
												</div>
                                            </div>

											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="charges_per_hourse" ><span>*</span> Gender</label><br>
													<label><input type="radio" required="" name="gender"  value="Male" <?php if($serviceproviderInfo[0]['gender']=='Male') { echo 'checked'; };?>>Male </label>
													<label><input type="radio" required="" name="gender" value="Female" <?php if($serviceproviderInfo[0]['gender']=='Female') { echo 'checked'; };?>>Female </label>
													<label><input type="radio" required="" name="gender" value="Other" <?php if($serviceproviderInfo[0]['gender']=='Other') { echo 'checked'; };?>>Other </label>
													<div class="err_msg" id="err_gender"></div>
												</div>
												<div class="col-sm-6">
	                                              
												</div>
                                            </div>
											
											
											
											<div class="form-group row">
												<div class="col-sm-3">
													<label for="from_organization" > Profile Photo</label>
													<input class="form-control" type="file" id="profile_pic"  name="profile_pic" >
													<div class="err_msg" id="err_profile_pic"></div>
												</div>
                                                <div class="col-sm-3">
													<?php
                                                    if(isset($serviceproviderInfo[0]['$profile_pic']) && $serviceproviderInfo[0]['$profile_pic']!="")
                                                    { ?>
                                                        <img src="<?php base_url()."uploads/user/profile_photo/".$serviceproviderInfo[0]['$profile_pic'];?>" width="50px;">
                                                   <?php }
                                                    ?>
												</div>
												<div class="col-sm-6">
												
												</div>
                                            </div>
											
											
											<div class="form-group row">
											  
												<div class="col-sm-6">
													<label for="from_organization" ><span>*</span> User Status</label>
	                                                <select class="form-control" id="status" required="" name="status">
														<option value="">Select Status</option>
														<option value="Active" <?php if($serviceproviderInfo[0]['status_flag']=='Active') { echo 'selected'; };?>>Active</option>
														<option value="Inactive" <?php if($serviceproviderInfo[0]['status_flag']=='Inactive') { echo 'selected'; };?>>Inactive</option>
													</select>
													<div class="err_msg" id="err_status"></div>
												</div>
                                            </div>
											
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="from_organization" ><span>*</span> Services</label>
	                                                <select class="form-control js-example-basic-multiple" id="1service_id" multiple="multiple" required="" name="service_ids[]">
													<?php 
                                                    $arrservices=array();
                                                        foreach($userserviceList as $userservice)
														{
                                                            $arrservices[]=$userservice['service_id'];
                                                        }
														foreach($serviceList as $service)
														{
													?>
													<option value="<?php echo $service['service_id']?>" <?php if(in_array($service['service_id'],$arrservices)) { echo 'selected'; };?>><?php echo $service['service_name']?></option>
													<?php } ?>
													</select>
													<div class="err_msg" id="err_service_id"></div>
												</div>
												<div class="col-sm-3">
													
												</div>
                                            </div>
											
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary custom-btn"  name="btn_update_user" id="btn_save_user">
									Update</button>
									
									   <a  class="btn btn-primary custom-btn" href="<?php echo base_url();?>backend/User/manageUser">
									Cancel</a>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>