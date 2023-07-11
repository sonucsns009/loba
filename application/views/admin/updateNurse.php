<div class="page-body">
	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card tab2-card">
					<div class="card-header">
						<h5> UPDATE NURSE</h5>
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
											<label for="services_title" ><span>*</span> Full Name</label>
											<input class="form-control" id="full_name" type="text" required="" name="full_name" value="<?php echo $nurseInfo[0]['nurse_full_name'] ?>" placeholder="Enter service title">
											<div class="err_msg" id="err_full_name"></div>
										</div>
										<div class="col-sm-6">
											<label for="services_title_ch" ><span>*</span> Full Name (Chinese)</label>
											<input class="form-control" id="full_name_ch" type="text" required="" name="full_name_ch" value="<?php echo $nurseInfo_ch[0]['nurse_full_name_ch'] ?>" placeholder="全名">
											<div class="err_msg" id="err_full_name_ch"></div>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-sm-6">
											<label for="email" ><span>*</span> Email</label>
											<input class="form-control" id="email" type="text" required="" name="email" value="<?php echo $nurseInfo[0]['email'] ?>" placeholder="Enter service title">
											<div class="err_msg" id="err_email"></div>
										</div>
										<div class="col-sm-6">
											
										</div>
									</div>

									<div class="form-group row">
										<div class="col-sm-6">
											<label for="mobile" ><span>*</span> Mobile No</label>
											<input class="form-control" id="mobile" type="text" required="" name="mobile" value="<?php echo $nurseInfo[0]['mobile_no'] ?>" placeholder="Enter service title">
											<div class="err_msg" id="err_mobile"></div>
										</div>
										<div class="col-sm-6">
											
										</div>
									</div>
										
									<div class="form-group row">
										<div class="col-sm-6">
											<label  ><span>*</span> Address</label>
											<textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter Description"><?php echo $nurseInfo[0]['address'] ?></textarea>
											<div class="err_msg" id="err_address"></div>
										</div>
										<div class="col-sm-6">
											<label><span>*</span> Address (Chinese)</label>
											<textarea class="form-control" name="address_ch" id="address_ch" rows="4" placeholder="地址"><?php echo $nurseInfo_ch[0]['address_ch'] ?></textarea>
											<div class="err_msg" id="err_address_ch"></div>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-sm-6">
											<label for="from_organization" ><span>*</span> From Organization</label>
											<input class="form-control" id="from_organization" type="text" required="" name="from_organization" value="<?php echo $nurseInfo[0]['from_organization'] ?>" placeholder="Enter from organization">
											<div class="err_msg" id="err_from_organization"></div>
										</div>
										<div class="col-sm-6">
											<label for="from_organization_ch" ><span>*</span> From Organization (Chinese)</label>
											<input class="form-control" id="from_organization_ch" type="text" required="" name="from_organization_ch" value="<?php echo $nurseInfo_ch[0]['from_organization_ch'] ?>" placeholder="来自组织">
											<div class="err_msg" id="err_from_organization_ch"></div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6">
											<label for="charges_per_hourse" ><span>*</span> Charges per Hours</label>
											<input class="form-control" id="charges_per_hourse" type="text" required="" name="charges_per_hourse" value="<?php echo $nurseInfo[0]['charges_per_hourse'] ?>" placeholder="Charges per Hours">
											<div class="err_msg" id="err_charges_per_hourse"></div>
										</div>
										<div class="col-sm-6">
											<label for="charges_per_hourse_ch" ><span>*</span>Charges per Hours (Chinese)</label>
											<input class="form-control" id="charges_per_hourse_ch" type="text" required="" name="charges_per_hourse_ch" value="<?php echo $nurseInfo_ch[0]['charges_per_hourse_ch'] ?>" placeholder="每小时收费">
											<div class="err_msg" id="err_charges_per_hourse_ch"></div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6">
											<label for="charges_per_visit" ><span>*</span> Charges per Visit</label>
											<input class="form-control" id="charges_per_visit" type="text" required="" name="charges_per_visit" value="<?php echo $nurseInfo[0]['charges_per_visit'] ?>" placeholder="Charges per Visit">
											<div class="err_msg" id="err_charges_per_visit"></div>
										</div>
										<div class="col-sm-6">
											<label for="charges_per_visit_ch" ><span>*</span>Charges per Visit (Chinese)</label>
											<input class="form-control" id="charges_per_visit_ch" type="text" required="" name="charges_per_visit_ch" value="<?php echo $nurseInfo_ch[0]['charges_per_visit_ch'] ?>" placeholder="每次访问费用">
											<div class="err_msg" id="err_charges_per_visit_ch"></div>
										</div>
									</div>
									<!-- <div class="form-group row">
										<div class="col-sm-6">
											<label for="from_organization" > Password</label>
											<input class="form-control" type="password" id="password1" name="password" placeholder="Enter Password">
											<div class="err_msg" id="err_password1"></div>
										</div>
										<div class="col-sm-3">
											
										</div>
									</div> -->
							</div>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary custom-btn"  name="btn_update_nurse" id="btn_save_nurse">
							Update</button>
							
								<a  class="btn btn-primary custom-btn"  href="<?php echo base_url();?>backend/Nurse/manageNurse">
							Cancel</a>
						</div></form>
					</div>
				</div>
			</div>
		</div>
				
	</div>
	<!-- Container-fluid Ends-->
</div>