<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> UPDATE SERVICE</h5>
                            </div>
                            <div class="card-body">
							 <?php
                             //print_r($serviceInfo_ch);
                             if($this->session->flashdata('success')!=""){?>
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
	                                                <input class="form-control" id="services_title" type="text" required="" name="services_title" value="<?php echo $serviceInfo[0]['service_name'];?>" placeholder="Enter service title">
													<div class="err_msg" id="err_services_title"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="services_title_ch" ><span>*</span> Service Title (Chinese)</label>
	                                                <input class="form-control" id="services_title_ch" type="text" required="" name="services_title_ch" value="<?php echo $serviceInfo_ch[0]['service_name'];?>" placeholder="输入服务标题">
													<div class="err_msg" id="err_services_title_ch"></div>
												</div>
                                            </div>
																						 
											  <div class="form-group row">
											  	<div class="col-sm-3">
	                                                <label  ><span>*</span> Service Image</label>
	                                                <input class="form-control" id="service_image" type="file" name="service_image" />
													<small style="color:red">Note:Upload only jpg|png|bmp|jpeg</small><br/>
													<div class="err_msg" id="err_service_image"></div>
												</div>
												<div class="col-sm-3">
	                                                <?php
													$str_images=$str_images1='';										
													if($serviceInfo[0]['service_image']!="")
													{
														$str_images='<img src="'.base_url().'uploads/service_img/'.$serviceInfo[0]['service_image'].'" style="width:110px;height:110px">';
													}
													 if($str_images!="") 
													 {
													 echo $str_images;
													 } else { ?>
														<img src="<?php echo base_url();?>template/admin/assets/images/lookbook.jpg" alt="No image Found"style="width:110px;height:110px" />
													<?php } 
													?>
												</div>
												<div class="col-sm-3">
	                                                <label ><span>*</span> Service Image (Chinese)</label>
	                                                 <input class="form-control" id="service_image_ch" type="file" name="service_image_ch" />
													<small style="color:red">Note:Upload only jpg|png|bmp|jpeg</small><br/>
													<div class="err_msg" id="err_service_image_ch"></div>
												</div>
												<div class="col-sm-3">
	                                                <?php
													$str_images=$str_images1='';										
													if($serviceInfo_ch[0]['service_image']!="")
													{
														$str_images='<img src="'.base_url().'uploads/service_img/'.$serviceInfo_ch[0]['service_image'].'" style="width:110px;height:110px">';
													}
													 if($str_images!="") 
													 {
													 echo $str_images;
													 } else { ?>
														<img src="<?php echo base_url();?>template/admin/assets/images/lookbook.jpg" alt="No image Found"style="width:110px;height:110px" />
													<?php } 
													?>
												</div>
                                            </div>
											
											 <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label  ><span>*</span> Service Description</label>
	                                                <textarea class="form-control" name="service_description" id="service_description" rows="4" placeholder="Enter Description"><?php echo $serviceInfo[0]['service_description'];?></textarea>
													<div class="err_msg" id="err_service_description"></div>
												</div>
												<div class="col-sm-6">
	                                                <label  ><span>*</span> Service Description (Chinese)</label>
	                                               <textarea class="form-control" name="service_description_ch" id="service_description_ch" rows="4" placeholder="输入说明"><?php echo $serviceInfo_ch[0]['service_description'];?></textarea>
													<div class="err_msg" id="err_service_description_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="tagline" ><span>*</span> Tagline</label>
	                                                <input class="form-control" id="tagline" type="text" required="" name="tagline" value="<?php echo $serviceInfo[0]['service_tagline'];?>" placeholder="Enter tagline">
													<div class="err_msg" id="err_tagline"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="tagline_ch" ><span>*</span> Tagline (Chinese)</label>
	                                                <input class="form-control" id="tagline_ch" type="text" required="" name="tagline_ch" value="<?php echo $serviceInfo_ch[0]['service_tagline'];?>" placeholder="输入标语">
													<div class="err_msg" id="err_tagline_ch"></div>
												</div>
                                            </div>
                                       		<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="paytype" ><span>*</span> Price & Payment </label>
	                                                <select class="form-control" name="paytype" id="paytype" >
	                                                	<option value="">-Select-</option>
	                                                	<option value="Per Session" <?php if($serviceInfo[0]['paytype']=='Per Session'){ echo 'selected';} ?>>Per Session</option>
	                                                	<option value="with a plan" <?php if($serviceInfo[0]['paytype']=='with a plan'){ echo 'selected';} ?>>with a plan</option>
	                                                	<option value="per session or with a plan" <?php if($serviceInfo[0]['paytype']=='per session or with a plan'){ echo 'selected';} ?>>per session or with a plan</option>
	                                                </select>
													<div class="err_msg" id="err_paytype"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="paytype_ch" ><span>*</span> Price & Payment (Chinese)</label>
	                                                <select class="form-control" name="paytype_ch" id="paytype_ch">
	                                                	<option value="">-Select-</option>
														<option value="每节课" <?php if($serviceInfo_ch[0]['paytype']=='每节课'){ echo 'selected';} ?>>每节课</option>
	                                                	<option value="有计划" <?php if($serviceInfo_ch[0]['paytype']=='有计划'){ echo 'selected';} ?>>有计划</option>
	                                                	<option value="每节课或有计划" <?php if($serviceInfo_ch[0]['paytype']=='每节课或有计划'){ echo 'selected';} ?>>每节课或有计划</option>
	                                                </select>
													<div class="err_msg" id="err_paytype_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="pricetype" ><span>*</span>Price Type </label>
	                                                <select class="form-control" name="pricetype" id="pricetype">
	                                                	<option value="">-Select-</option>
                                                        <option value="Fixed Price" <?php if($serviceInfo[0]['pricetype']=='Fixed Price'){ echo 'selected';} ?>>Fixed Price</option>
	                                                </select>
													<div class="err_msg" id="err_pricetype"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="pricetype_ch" ><span>*</span> Price Type (Chinese)</label>
	                                                <select class="form-control" name="pricetype_ch" id="pricetype_ch">
	                                                	<option value="">-Select-</option>
                                                        <option value="固定价格" <?php if($serviceInfo_ch[0]['pricetype']=='固定价格'){ echo 'selected';} ?>>固定价格</option>

	                                                </select>
													<div class="err_msg" id="err_pricetype_ch"></div>
												</div>
                                            </div>
                                             <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="amount" ><span>*</span>Amount</label>
	                                                <input class="form-control" id="amount" type="text" required="" name="amount" value="<?php echo $serviceInfo_ch[0]['amount']; ?>" placeholder="Enter amount">
													<div class="err_msg" id="err_amount"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="amount_ch" ><span>*</span> Amount (Chinese)</label>
	                                                <input class="form-control" id="amount_ch" type="text" required="" name="amount_ch" value="<?php echo $serviceInfo_ch[0]['amount']; ?>" placeholder="输入服务标题">
													<div class="err_msg" id="err_amount_ch"></div>
												</div>
                                            </div>
                                             <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="duration" ><span>*</span>Duration</label>
	                                                <input class="form-control" id="duration" type="text" required="" name="duration" value="<?php echo $serviceInfo[0]['duration']; ?>" placeholder="Enter duration">
													<div class="err_msg" id="err_duration"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="duration_ch" ><span>*</span> Duration (Chinese)</label>
	                                                <input class="form-control" id="duration_ch" type="text" required="" name="duration_ch" value="<?php echo $serviceInfo_ch[0]['duration']; ?>" placeholder="输入服务标题">
													<div class="err_msg" id="err_duration_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="buffer_time" ><span>*</span>Buffer Time</label>
	                                                <input class="form-control" id="buffer_time" type="text" required="" name="buffer_time" value="<?php echo $serviceInfo[0]['buffer_time']; ?>" placeholder="Enter Buffer Time">
													<div class="err_msg" id="err_duration"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="buffer_time_ch" ><span>*</span> Buffer Time (Chinese)</label>
	                                                <input class="form-control" id="buffer_time_ch" type="text" required="" name="buffer_time_ch" value="<?php echo $serviceInfo_ch[0]['buffer_time']; ?>" placeholder="输入服务标题">
													<div class="err_msg" id="err_buffer_time_ch"></div>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="payment_preferences" ><span>*</span> Payment Preferences</label>
	                                                <select class="form-control" name="payment_preferences" value="<?php echo $serviceInfo[0]['payment_preferences']; ?>" id="payment_preferences">
	                                                	<option value="">-Select-</option>
														<option value="Entire amount either online or in person" <?php if($serviceInfo[0]['payment_preferences']=='Entire amount either online or in person'){ echo 'selected';} ?>>Entire amount either online or in person </option>
	                                                </select>
													<div class="err_msg" id="err_payment_preferences"></div>
												</div>
												<div class="col-sm-6">
	                                                <label for="payment_preferences_ch" ><span>*</span> Payment Preferences (Chinese)</label>
	                                                <select class="form-control" name="payment_preferences_ch" id="payment_preferences_ch">
	                                                	<option value="">-Select-</option>
														<option value="全部金额在线或亲自" <?php if($serviceInfo_ch[0]['payment_preferences']=='全部金额在线或亲自'){ echo 'selected';} ?>>全部金额在线或亲自</option>
	                                                </select>
													<div class="err_msg" id="err_payment_preferences_ch"></div>
												</div>
                                            </div>

                                             <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="video_conf" ><span>*</span> Video Conferencing</label>
													<div class="form-group row">
														<div class="col-sm-3">
															<label> <input type="radio" name="video_conference" value="YES" <?php if($serviceInfo[0]['video_conferencing']=='YES'){ echo 'checked';} ?>>  
															YES </label>  
														</div>
														<div class="col-sm-3">
															<label> <input type="radio" name="video_conference" value="NO" <?php if($serviceInfo[0]['video_conferencing']=='NO'){ echo 'checked';} ?>>  
															NO </label>  
														</div>
													</div>
												</div>
												
                                            </div>
											
                                    </div>
									
									
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary"  name="btn_update_service" id="btn_addslider">
									Update</button>
									
									   <a  class="btn btn-primary"  href="<?php echo base_url();?>backend/Services/manageService">
									Cancel</a>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>