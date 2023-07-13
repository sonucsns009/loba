<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <!-- Service Provider Basic details -->
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5>  BOOKING DETAILS </h5>
                            </div>
                            <div class="card-body">
						<?php
							 if(isset($bookingInfo) && count($bookingInfo)>0)									
							{
                                //print_r($orderInfo);
							?>
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
                                        <div class="form-group row">
											
											<div class="col-sm-6">
											<div class="form-group">
														<?php 
														$status="";
														if($bookingInfo[0]['booking_status']=='waiting_for_accept')
														{
															$status="Waiting";
														}
														?>
														<button class="btn btn-sm btn-warning"><?=$status?></button>
													</div>
												</div>
												<div class="col-sm-6"></div>
                                            <div class="col-sm-6">
													<div class="form-group">
														<label>Order No</label> :
														<?php echo $orderInfo[0]['order_no'];?>
													</div>

													<div class="form-group">
														<label>Service Name</label> :
														<?php echo $bookingInfo[0]['service_name'];?>
													</div>

													<div class="form-group">
														<label for="services_title" > Customer Name  </label> :
														<?php echo $bookingInfo[0]['full_name'];?>
													</div>

                                                    <div class="form-group">
														<label>Pickup Location</label><br>
														<?php echo $bookingInfo[0]['pickup_location'];?>
													</div>

                                                    <div class="form-group">
														<label>Hours</label><br>
														<?php echo $bookingInfo[0]['no_of_hourse']." Hrs";?> 
													</div>
													
                                            </div> 
                                            <div class="col-sm-6">
											
													<div class="form-group">
														<label>Amount</label><br>
														<?php echo $orderInfo[0]['order_place_amt'];?> 
													</div>
													
													<div class="form-group">
														<label>Booking Date</label> : 
														<?php
                                                            $bookingdate=new DateTime($bookingInfo[0]['booking_date']);
                                                            $bookingdate=$bookingdate->format('M d,Y');
                                                            echo $bookingdate;
                                                        ?>
													</div>
													<div class="form-group">
														<label>Time</label> :
														<?php echo $bookingInfo[0]['time_slot'];?>
													</div>
													<div class="form-group">
														<label>Drop Location</label><br>
														<?php echo $bookingInfo[0]['drop_location'];?>
													</div>
													<div class="form-group">
														<label>Mobility Aid</label><br>
														<?php echo $bookingInfo[0]['select_mobility_aid'];?> 
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
<!-- Services List -->
                
<div class="col-md-12"></div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>
