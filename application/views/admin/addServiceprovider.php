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
	                                                <input class="form-control" id="full_name" type="text" required="" name="full_name" placeholder="Enter Full Name">
													<div class="err_msg" id="err_full_name"></div>
												</div>
												
												<div class="col-sm-6">
	                                                <label for="services_title_ch" ><span>*</span> Full Name(Chinese)</label>
	                                                <input class="form-control" id="full_name_ch" type="text" required="" name="full_name_ch" placeholder="輸入全名">
													<div class="err_msg" id="err_full_name_ch"></div>
												</div>
                                            </div>

											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="email" ><span>*</span> Email</label>
	                                                <input class="form-control" id="email" type="text" required="" name="email" placeholder="Enter Email Address">
													<div class="err_msg" id="err_email"></div>
												</div>
												<div class="col-sm-6">
												<label for="email" ><span>*</span> Email (Chinese)</label>
	                                                <input class="form-control" id="email" type="text" required="" name="email_ch" placeholder="請輸入電郵地址">
													<div class="err_msg" id="err_email_ch"></div>
												</div>
                                            </div>

											<div class="form-group row">
												<div class="col-sm-6">
	                                                <label for="mobile" ><span>*</span> Mobile No</label>
	                                                <input class="form-control" id="mobile" type="text" required="" name="mobile" placeholder="Enter Mobile No">
													<div class="err_msg" id="err_mobile"></div>
												</div>
												<div class="col-sm-6">
												<label for="mobile" ><span>*</span> Mobile No (Chinese)</label>
	                                                <input class="form-control" id="mobile" type="text" required="" name="mobile_ch" placeholder="輸入手機號碼">
													<div class="err_msg" id="err_mobile"></div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-6">
												<label for="mobile" ><span>*</span> Emergency Mobile No</label>
	                                                <input class="form-control" id="alt_mobile" type="text" required="" name="alt_mobile" placeholder="Enter Emergency Phone No">
													<div class="err_msg" id="err_alt_mobile"></div>
												</div>
												<div class="col-sm-6">
												<label for="mobile" ><span>*</span> Emergency Mobile No (Chinese)</label>
	                                                <input class="form-control" id="alt_mobile" type="text" required="" name="alt_mobile_ch" placeholder="緊急手機號碼">
													<div class="err_msg" id="err_alt_mobile"></div>
												</div>
                                            </div>
											 
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label  ><span>*</span> Address</label>
	                                                <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter Address"></textarea>
													<div class="err_msg" id="err_address"></div>
												</div>
												<div class="col-sm-6">
	                                                <label><span>*</span> Address (Chinese)</label>
	                                               <textarea class="form-control" name="address_ch" id="address_ch" rows="4" placeholder="地址"></textarea>
													<div class="err_msg" id="err_address_ch"></div>
												</div>
                                            </div>

                                            
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="charges_per_hourse" ><span>*</span> Gender</label><br>
													<label><input type="radio" required="" name="gender"  value="Male">Male </label>
													<label><input type="radio" required="" name="gender" value="Female">Female </label>
													<label><input type="radio" required="" name="gender" value="Other">Other </label>
													<div class="err_msg" id="err_gender"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="charges_per_hourse_ch" ><span>*</span>Gender (Chinese)</label><br>
	                                                <label><input type="radio" required="" name="gender_ch" value="男性">男性 </label>
	                                                <label><input type="radio" required="" name="gender_ch" value="女性">女性 </label>
	                                                <label><input type="radio" required="" name="gender_ch" value="其他">其他 </label>
													<div class="err_msg" id="err_gender_ch"></div>
												</div>
                                            </div>
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="from_organization" ><span>*</span> Weight</label>
	                                                <select class="form-control" id="weight" required="" name="weight">
													<option value="">Select Weight</option>
													<option value="50-80">50 to 80 kg</option>
													<option value="80-100">80 to 100 kg</option>
													<option value="100+">100+ kg</option>
													</select>
													<div class="err_msg" id="err_weight"></div>
												</div>
												<div class="col-sm-6">
												<label for="from_organization" ><span>*</span> Weight (Chinese)</label>
	                                                <select class="form-control" id="weight" required="" name="weight_ch">
													<option value="">Select Weight</option>
													<option value="50-80">50 至 80 公斤</option>
													<option value="80-100">80 至 100 公斤</option>
													<option value="100+">100+ 公斤</option>
													</select>
													<div class="err_msg" id="err_weight"></div>
												</div>
                                            </div>
											
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="from_organization" ><span>*</span> Select Mobility Aid</label>
	                                                <select class="form-control" id="mobility_aid" required="" name="mobility_aid">
													<option value="">Select Mobility Aid</option>
													<option value="None">None</option>
													<option value="Manual Wheelchair">Manual Wheelchair</option>
													<option value="Auto Wheelchair">Auto Wheelchair</option>
													<option value="Walking frame">Walking frame</option>
													</select>
													<div class="err_msg" id="err_mobility_aid"></div>
												</div>
												<div class="col-sm-6">
													<label for="from_organization" ><span>*</span> Select Mobility Aid (Chinese)</label>
	                                                <select class="form-control" id="from_organization" required="" name="mobility_aid_ch">
													<option value="">Select Mobility Aid</option>
													<option value="沒有任何">沒有任何</option>
													<option value="手動輪椅">手動輪椅</option>
													<option value="自動輪椅">自動輪椅</option>
													<option value="助步器">助步器</option>
													</select>
													<div class="err_msg" id="err_mobility_aid_ch"></div>
												</div>
                                            </div>
											<div class="form-group row">
												<div class="col-sm-6">
													<label for="from_organization" ><span>*</span> Identification Document Number </label>
													<input class="form-control" type="text" required="" id="id_proof_no" name="id_proof_no" placeholder="Enter ID Number">
													<div class="err_msg" id="err_id_proof_no"></div>
												</div>
												<div class="col-sm-6">
													<label for="from_organization" ><span>*</span> Identification Document Number (Chinese)</label>
													<input class="form-control" type="text" required="" id="id_proof_no_ch" name="id_proof_no_ch" placeholder="Enter ID Number">
													<div class="err_msg" id="err_proof_no_ch"></div>
												</div>
                                            </div>
											<div class="form-group row">
												<div class="col-sm-3">
													<label for="from_organization" ><span>*</span> Upload Front View of ID Card </label>
													<input class="form-control" type="file" required="" id="id_proof_front" name="id_proof_front">
													<div class="err_msg" id="err_id_proof_front"></div>
												</div>
												<div class="col-sm-3">
													<label for="from_organization" > Upload Back View of ID Card </label>
													<input class="form-control" type="file" name="id_proof_back">
													<div class="err_msg" id="err_proof_back"></div>
												</div>
												<div class="col-sm-3">
													<label for="from_organization" ><span>*</span> Upload Front View (Chinese) </label>
													<input class="form-control" type="file" required="" name="id_proof_front_ch">
													<div class="err_msg" id="err_id_proof_front_ch"></div>
												</div>
												<div class="col-sm-3">
													<label for="from_organization" > Upload Back View (Chinese)</label>
													<input class="form-control" type="file" name="id_proof_back_ch">
													<div class="err_msg" id="err_id_proof_back_ch"></div>
												</div>
											</div>
											
											<div class="form-group row">
												<div class="col-sm-6">
													<label for="from_organization" > Profile Photo</label>
													<input class="form-control" type="file" id="profile_pic"  name="profile_pic" >
													<div class="err_msg" id="err_profile_pic"></div>
												</div>
												<div class="col-sm-6">
												
												</div>
                                            </div>
											
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label  ><span>*</span> Enter Medical History</label>
	                                                <textarea class="form-control" name="medical_history" id="medical_history" rows="4" placeholder="Enter Medical History"></textarea>
													<div class="err_msg" id="err_medical_history"></div>
												</div>
												<div class="col-sm-6">
	                                                <label><span>*</span> Enter Medical History (Chinese)</label>
	                                               <textarea class="form-control" name="medical_history_ch" id="medical_history_ch" rows="4" placeholder="輸入病史"></textarea>
													<div class="err_msg" id="err_medical_history_ch"></div>
												</div>
                                            </div>
											<div class="form-group row">
											  	<!--div class="col-sm-3">
	                                                <label for="from_organization" ><span>*</span> User Type</label>
	                                                <select class="form-control" id="user_type" required="" name="user_type">
													<option value="">Select Type</option>
													<option value="Customer">Customer</option>
													<option value="Service Provider">Service Provider</option>
													</select>
													<div class="err_msg" id="err_user_type"></div>
												</div-->
												<div class="col-sm-6">
													<label for="from_organization" ><span>*</span> User Status</label>
	                                                <select class="form-control" id="status" required="" name="status">
														<option value="">Select Status</option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													</select>
													<div class="err_msg" id="err_status"></div>
												</div>
                                            </div>
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="from_organization" ><span>*</span> Password</label>
													<input class="form-control" type="text" required="" id="password" name="password" placeholder="Enter Password">
													<div class="err_msg" id="err_password"></div>
												</div>
												<div class="col-sm-3">
													
												</div>
                                            </div>

											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="from_organization" ><span>*</span> Services</label>
	                                                <select class="form-control js-example-basic-multiple" id="1service_id" multiple="multiple" required="" name="service_ids[]">
													<?php 
														foreach($serviceList as $service)
														{
													?>
													<option value="<?php echo $service['service_id']?>"><?php echo $service['service_name']?></option>
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
                                    <button type="submit" class="btn btn-primary custom-btn"  name="btn_save_user" id="btn_save_user">
									Add</button>
									
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