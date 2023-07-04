<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5>  SERVICE DETAILS </h5>
                            </div>
                            <div class="card-body">
						<?php
							 if(isset($serviceInfo) && count($serviceInfo)>0)									
							{
							?>
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="basicinfo-tab" data-toggle="tab" href="#basicinfo" role="tab" aria-controls="basicinfo" aria-selected="true" data-original-title="" title="">Basic Details</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									   		<div class="form-group row">
											   <div class="col-sm-2">
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
											  	<div class="col-sm-6">

													<div class="form-group">
														<label for="services_title" > Service Title  </label><br>
														<?php echo $serviceInfo[0]['service_name'];?> / <?php echo $serviceInfo_ch[0]['service_name'];?>
													</div>

													<div class="form-group">
														<label>Service Description</label><br>
														<?php echo $serviceInfo[0]['service_description'];?> / <?php echo $serviceInfo_ch[0]['service_description'];?>
													</div>

													<div class="form-group">
														<label>Tagline</label><br>
														<?php echo $serviceInfo[0]['service_tagline'];?> / <?php echo $serviceInfo_ch[0]['service_tagline'];?>
													</div>
													<div class="form-group">
														<label>Price & Payment</label><br>
														<?php echo $serviceInfo[0]['paytype'];?> / <?php echo $serviceInfo_ch[0]['paytype'];?>
													</div>
													<div class="form-group">
														<label>Price Type</label><br>
														<?php echo $serviceInfo[0]['pricetype'];?> / <?php echo $serviceInfo_ch[0]['pricetype'];?>
													</div>
													<div class="form-group">
														<label>Amount</label><br>
														<?php echo $serviceInfo[0]['amount'];?> / <?php echo $serviceInfo_ch[0]['amount'];?>
													</div>
													<div class="form-group">
														<label>Duration</label><br>
														<?php echo $serviceInfo[0]['duration'];?> / <?php echo $serviceInfo_ch[0]['duration'];?>
													</div>
													<div class="form-group">
														<label>Buffer Time</label><br>
														<?php echo $serviceInfo[0]['buffer_time'];?> / <?php echo $serviceInfo_ch[0]['buffer_time'];?>
													</div>
													<div class="form-group">
														<label>Payment Preferences</label><br>
														<?php echo $serviceInfo[0]['payment_preferences'];?> / <?php echo $serviceInfo_ch[0]['payment_preferences'];?>
													</div>
													<div class="form-group">
														<label>Video Conferencing</label><br>
														<?php echo $serviceInfo[0]['video_conferencing'];?>
													</div>

												</div>
												
										</div>
                                    </div>
                                </div>
								<?php } else 
								{?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>