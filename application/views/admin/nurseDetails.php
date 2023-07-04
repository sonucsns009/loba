<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5>  NURSE DETAILS </h5>
                            </div>
                            <div class="card-body">
						<?php
							 if(isset($nurseInfo) && count($nurseInfo)>0)									
							{
							?>
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="basicinfo-tab" data-toggle="tab" href="#basicinfo" role="tab" aria-controls="basicinfo" aria-selected="true" data-original-title="" title="">Basic Details</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									   		<div class="form-group row">
											  
											  	<div class="col-sm-6">

													<div class="form-group">
														<label for="services_title" > Nurse Name </label><br>
														<?php echo $nurseInfo[0]['nurse_full_name'];?> / <?php echo $nurseInfo_ch[0]['nurse_full_name_ch'];?>
													</div>

													<div class="form-group">
														<label>Email</label><br>
														<?php echo $nurseInfo[0]['email'];?> 
													</div>

													<div class="form-group">
														<label>Mobile</label><br>
														<?php echo $nurseInfo[0]['mobile_no'];?> 
													</div>
													<div class="form-group">
														<label>Address</label><br>
														<?php echo $nurseInfo[0]['address'];?> / <?php echo $nurseInfo_ch[0]['address_ch'];?>
													</div>
													<div class="form-group">
														<label>From Organization</label><br>
														<?php echo $nurseInfo[0]['from_organization'];?> / <?php echo $nurseInfo_ch[0]['from_organization_ch'];?>
													</div>
													<div class="form-group">
														<label> Charges per Hours</label><br>
														<?php echo $nurseInfo[0]['charges_per_hourse'];?> / <?php echo $nurseInfo_ch[0]['charges_per_hourse_ch'];?>
													</div>
													<div class="form-group">
														<label>Charges per Visit</label><br>
														<?php echo $nurseInfo[0]['charges_per_visit'];?> / <?php echo $nurseInfo_ch[0]['charges_per_visit_ch'];?>
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