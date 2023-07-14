<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5>  DOCTOR DETAILS </h5>
                            </div>
                            <div class="card-body">
						<?php
							 if(isset($doctorInfo) && count($doctorInfo)>0)									
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
                                                        if($doctorInfo[0]['doctor_image']!="")
                                                        {
                                                            $str_images='<img src="'.base_url().'uploads/doctor_images/'.$doctorInfo[0]['doctor_image'].'" style="width:110px;height:110px">';
                                                        }
                                                        if($str_images!="") 
                                                        {
                                                        echo $str_images;
                                                        } else { ?>
                                                            <img src="<?php echo base_url();?>template/admin/assets/images/lookbook.jpg" alt="No image Found"style="width:110px;height:110px" />
                                                        <?php } 
                                                        ?>
												</div>
													
													<div class="col-sm-5">
														<label for="services_title" > Doctor Id </label><br>
														<?php echo $doctorInfo[0]['loba_id'];?> 
														<br><br>
														<label for="services_title" > Doctor Name </label><br>
														<?php echo $doctorInfo[0]['doctor_full_name'];?> / <?php echo $doctorInfo_ch[0]['doctor_full_name_ch'];?>
														<br><br>
														<label>Mobile</label><br>
														<?php echo $doctorInfo[0]['mobile_no'];?>	
														<br><br>
														<label>From Organization</label><br>
														<?php echo $doctorInfo[0]['from_organization'];?> / <?php echo $doctorInfo_ch[0]['from_organization'];?>
														<br><br>
														<label>Charges per Visit</label><br>
														<?php echo $doctorInfo[0]['charges_per_visit'];?> / <?php echo $doctorInfo_ch[0]['charges_per_visit'];?>
														
													</div>
													
													<div class="col-sm-5">
														<label>Email</label><br>
														<?php echo $doctorInfo[0]['email'];?> 
														<br><br>
														<label>Address</label><br>
														<?php echo $doctorInfo[0]['address'];?> / <?php echo $doctorInfo_ch[0]['address'];?>
														<br><br>
														<label> Charges per Hours</label><br>
														<?php echo $doctorInfo[0]['charges_per_hourse'];?> / <?php echo $doctorInfo_ch[0]['charges_per_hourse'];?>
														<br><br>
														<label>Specialization</label><br>
														<?php echo $doctorInfo[0]['specialization'];?> / <?php echo $doctorInfo_ch[0]['specialization'];?>
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