<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> ADD PROMOTION CODE</h5>
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
						
							<form name="frm_addslider" id="frm_addslider" class="needs-validation user-add" method="POST" enctype="multipart/form-data">
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									   		<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="services_title" ><span>*</span> Promocode</label>
	                                                <input class="form-control" id="promocode" type="text" required="" readonly name="promocode" placeholder="Generate Code">
													<div class="err_msg" id="err_promocode"></div>
												</div>
												<div class="col-sm-6"><br>
	                                                <button class="btn btn-success" id="generate_code" type="button" required="" name="generate_code">Generate Code</button>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="period" ><span>*</span> Package Type</label>
													<select class="form-control" id="promocodetype" required="" name="promocodetype">
														<option value="">Select Type</option>
														<option value="Fixed Price">Fixed Price</option>
														<option value="Percentage">Percentage</option>
													</select>
													<div class="err_msg" id="err_promocodetype"></div>
												</div>
												<div class="col-sm-6">
	                                                
												</div>
                                            </div>
										 
											<div class="form-group row" id="pricediv" style="display:none">
											  	<div class="col-sm-6">
	                                                <label for="mobile" ><span>*</span>Discount Amount</label>
	                                                <input class="form-control" id="price" type="number" step="0.01" min="0" name="price" placeholder="Enter Price">
													<div class="err_msg" id="err_price"></div>
												</div>
												<div class="col-sm-6">
													 
												</div>
                                            </div>
											<div class="form-group row" id="percentagediv"  style="display:none">
											  	<div class="col-sm-6">
	                                                <label for="mobile" ><span>*</span>Percentage</label>
	                                                <input class="form-control" id="percentage" type="number" step="0.01" min="0" name="percentage" placeholder="Enter Discount Price">
													<div class="err_msg" id="err_percentage"></div>
												</div>
												<div class="col-sm-6">
													 
												</div>
                                            </div>
											 
											<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="from_organization" ><span>*</span> Services</label>
	                                                <select class="form-control js-example-basic-multiple" id="service_id"  required="" name="service_id">
													<option value="">Select Service</option>
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
                                    <button type="submit" class="btn btn-primary custom-btn"  name="btn_save_promocode" id="btn_save_promocode">
									Add</button>
									
									   <a  class="btn btn-primary custom-btn"  href="<?php echo base_url();?>backend/Packages/managePackage">
									Cancel</a>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>
 