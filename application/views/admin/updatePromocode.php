<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> UPDATE PROMOTION CODE</h5>
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
						<?php } 
                        //print_r($promocodeInfo);
                        ?>
						
							<form name="frm_addslider" id="frm_addslider" class="needs-validation user-add" method="POST" enctype="multipart/form-data">
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									   		<div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="services_title" ><span>*</span> Promocode</label>
	                                                <input class="form-control" id="promocode" type="text" required="" readonly name="promocode" value="<?php echo $promocodeInfo[0]['promocode_code']?>" placeholder="Enter Code">
													<div class="err_msg" id="err_promocode"></div>
												</div>
												<div class="col-sm-6"><br>
												</div>
                                            </div>
                                            <div class="form-group row">
											  	<div class="col-sm-6">
	                                                <label for="period" ><span>*</span> Package Type</label>
													<select class="form-control" id="promocodetype" required="" name="promocodetype">
														<option value="">Select Type</option>
														<option value="Fixed Price" <?php if($promocodeInfo[0]['promocode_type']=='Fixed Price'){ echo 'selected'; } ?>>Fixed Price</option>
														<option value="Percentage" <?php if($promocodeInfo[0]['promocode_type']=='Percentage'){ echo 'selected'; } ?>>Percentage</option>
													</select>
													<div class="err_msg" id="err_promocodetype"></div>
												</div>
												<div class="col-sm-6">
	                                                
												</div>
                                            </div>
										 
											<div class="form-group row" id="pricediv" style="display:none">
											  	<div class="col-sm-6">
	                                                <label for="mobile" ><span>*</span>Discount Amount</label>
	                                                <input class="form-control" id="price" type="number" step="0.01" min="0" name="price" value="<?php echo $promocodeInfo[0]['promocode_discount']?>" placeholder="Enter Price">
													<div class="err_msg" id="err_price"></div>
												</div>
												<div class="col-sm-6">
													 
												</div>
                                            </div>
											<div class="form-group row" id="percentagediv"  style="display:none">
											  	<div class="col-sm-6">
	                                                <label for="mobile" ><span>*</span>Percentage</label>
	                                                <input class="form-control" id="percentage" type="number" step="0.01" min="0" name="percentage" value="<?php echo $promocodeInfo[0]['promocode_discount']?>" placeholder="Enter Discount Price">
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
													<option value="<?php echo $service['service_id']?>" <?php if($promocodeInfo[0]['service_id']==$service['service_id']){ echo 'selected'; } ?>><?php echo $service['service_name']?></option>
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
                                    <button type="submit" class="btn btn-primary custom-btn"  name="btn_update_promocode" id="btn_save_promocode">
									Update</button>
									
									   <a  class="btn btn-primary custom-btn"  href="<?php echo base_url();?>backend/Promocode/managePromocode">
									Cancel</a>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>
 