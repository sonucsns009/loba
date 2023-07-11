<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> ADD SERVICE</h5>
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
						
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="basicinfo-tab" data-toggle="tab" href="#basicinfo" role="tab" aria-controls="basicinfo" aria-selected="true" data-original-title="" title="">Basic Details</a></li>
									
                                </ul>
								<form name="frm_addslider" id="frm_addslider" class="needs-validation user-add" method="POST" enctype="multipart/form-data">
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									   		<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="services_title" ><span>*</span> Service Title</label>
	                                                <input class="form-control" id="services_title" type="text" required="" name="services_title" placeholder="Enter service title">
													<div class="err_msg" id="err_services_title"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="services_title_ch" ><span>*</span> Service Title (Chinese)</label>
	                                                <input class="form-control" id="services_title_ch" type="text" required="" name="services_title_ch" placeholder="输入服务标题">
													<div class="err_msg" id="err_services_title_ch"></div>
												</div>
                                            </div>
																						 
											  <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label  ><span>*</span> Service Image</label>
	                                                <input class="form-control" id="service_image" type="file" required="" name="service_image" />
													<span style="color:red">Note:Upload only jpg|png|bmp|jpeg</span><br/>
													<div class="err_msg" id="err_service_image"></div>
												</div>
												<div class="col-sm-6">
	                                                <label ><span>*</span> Service Image (Chinese)</label>
	                                                 <input class="form-control" id="service_image_ch" type="file" required="" name="service_image_ch" />
													<span style="color:red">Note:Upload only jpg|png|bmp|jpeg</span><br/>
													<div class="err_msg" id="err_service_image_ch"></div>
												</div>
                                            </div>
											
											 <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label  ><span>*</span> Service Description</label>
	                                                <textarea class="form-control" name="service_description" id="service_description" required="" rows="4" placeholder="Enter Description"></textarea>
													<div class="err_msg" id="err_service_description"></div>
												</div>
												<div class="col-sm-6">
	                                                <label  ><span>*</span> Service Description (Chinese)</label>
	                                               <textarea class="form-control" name="service_description_ch" required="" id="service_description_ch" rows="4" placeholder="输入说明"></textarea>
													<div class="err_msg" id="err_service_description_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="tagline" ><span>*</span> Tagline</label>
	                                                <input class="form-control" id="tagline" type="text" required="" name="tagline" placeholder="Enter tagline">
													<div class="err_msg" id="err_tagline"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="tagline_ch" ><span>*</span> Tagline (Chinese)</label>
	                                                <input class="form-control" id="tagline_ch" type="text" required="" name="tagline_ch" placeholder="输入标语">
													<div class="err_msg" id="err_tagline_ch"></div>
												</div>
                                            </div>
                                       		<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="paytype" ><span>*</span> Price & Payment</label>
	                                                <select class="form-control" name="paytype" required="" id="paytype">
	                                                	<option value="">-Select-</option>
														<option value="Per Session">Per Session</option>
	                                                	<option value="with a plan">with a plan</option>
	                                                	<option value="per session or with a plan">per session or with a plan</option>
	                                                </select>
													<div class="err_msg" id="err_paytype"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="paytype_ch" ><span>*</span> Price & Payment (Chinese)</label>
	                                                <select class="form-control" name="paytype_ch" required="" id="paytype_ch">
	                                                	<option value="">-Select-</option>
														<option value="每次會話">每次會話</option>
	                                                	<option value="有計劃">有計劃</option>
	                                                	<option value="每次會議或有計劃">每次會議或有計劃</option>
	                                                </select>
													<div class="err_msg" id="err_paytype_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="pricetype" ><span>*</span> Price Type</label>
	                                                <select class="form-control" name="pricetype" required="" id="pricetype">
	                                                	<option value="">-Select-</option>
                                                        <option value="Fixed Price">Fixed Price</option>
	                                                </select>
													<div class="err_msg" id="err_pricetype"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="pricetype_ch" ><span>*</span> Price & Payment (Chinese)</label>
	                                                <select class="form-control" name="pricetype_ch" required="" id="pricetype_ch">
	                                                	<option value="">-Select-</option>
                                                        <option value="固定價格">固定價格</option>
	                                                </select>
													<div class="err_msg" id="err_pricetype_ch"></div>
												</div>
                                            </div>
                                             <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="amount" ><span>*</span>Amount</label>
	                                                <input class="form-control" id="amount" type="text" required="" name="amount" placeholder="Enter amount">
													<div class="err_msg" id="err_amount"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="amount_ch" ><span>*</span> Amount (Chinese)</label>
	                                                <input class="form-control" id="amount_ch" type="text" required="" name="amount_ch" placeholder="输入服务标题">
													<div class="err_msg" id="err_amount_ch"></div>
												</div>
                                            </div>
                                             <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="duration" ><span>*</span>Duration</label>
	                                                <input class="form-control" id="duration" type="text" required="" name="duration" placeholder="Enter duration">
													<div class="err_msg" id="err_duration"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="duration_ch" ><span>*</span> Duration (Chinese)</label>
	                                                <input class="form-control" id="duration_ch" type="text" required="" name="duration_ch" placeholder="输入服务标题">
													<div class="err_msg" id="err_duration_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="buffer_time" ><span>*</span>Buffer Time</label>
	                                                <input class="form-control" id="buffer_time" type="text" required="" name="buffer_time" placeholder="Enter Buffer Time">
													<div class="err_msg" id="err_buffer_time"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="buffer_time_ch" ><span>*</span> Buffer Time (Chinese)</label>
	                                                <input class="form-control" id="buffer_time_ch" type="text" required="" name="buffer_time_ch" placeholder="输入服务标题">
													<div class="err_msg" id="err_buffer_time_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="payment_preferences" ><span>*</span> Payment Preferences</label>
	                                                <select class="form-control" name="payment_preferences" required="" id="payment_preferences">
	                                                	<option value="">-Select-</option>
	                                                	<option value="Entire amount either online or in person">Entire amount either online or in person </option>
	                                                </select>
													<div class="err_msg" id="err_payment_preferences"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="payment_preferences_ch" ><span>*</span> Payment Preferences (Chinese)</label>
	                                                <select class="form-control" name="payment_preferences_ch" required="" id="payment_preferences_ch">
	                                                	<option value="">-Select-</option>
														<option value="全部金额在线或亲自">全部金额在线或亲自</option>
	                                                </select>
													<div class="err_msg" id="err_payment_preferences_ch"></div>
												</div>
                                            </div>

                                             <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="video_conf" ><span>*</span> Video Conferencing</label>
													<div class="form-group row">
														<div class="col-sm-3">
															<label> <input type="radio" name="video_conference" required="" class="video_conference" value="YES">  
															YES </label>  
														</div>
														<div class="col-sm-3">
															<label> <input type="radio" name="video_conference" required="" class="video_conference" value="NO">  
															NO </label>  
														</div>
														<div class="err_msg" id="err_video_conference"></div>
													</div>
												</div>
												
                                            </div>
											
                                    </div>
									
									
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary custom-btn"  name="btn_save_service" id="btn_save_service">
									Add</button>
									
									   <a  class="btn btn-primary custom-btn"  href="<?php echo base_url();?>backend/Services/manageService">
									Cancel</a>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>