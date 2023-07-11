<div class="page-body">
	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card tab2-card">
					<div class="card-header">
						<h5> UPDATE PACKAGE</h5>
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
										<label for="services_title" ><span>*</span> Title</label>
										<input class="form-control" id="title" type="text" required="" name="title" value="<?php echo $packageInfo[0]['package_title'] ?>" placeholder="Enter Title">
										<div class="err_msg" id="err_title"></div>
									</div>
									<div class="col-sm-6">
										<label for="services_title_ch" ><span>*</span> Title (Chinese)</label>
										<input class="form-control" id="title_ch" type="text" required="" name="title_ch" value="<?php echo $packageInfo_ch[0]['package_title_ch'] ?>" placeholder="輸入標題">
										<div class="err_msg" id="err_title_ch"></div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6">
										<label for="email" ><span>*</span> Description</label>
										<textarea class="form-control" id="description" type="text" required="" name="description" placeholder="Enter Description"><?php echo $packageInfo[0]['package_description'] ?></textarea>
										<div class="err_msg" id="err_description"></div>
									</div>
									<div class="col-sm-6">
										<label for="services_title_ch" ><span>*</span> Description (Chinese)</label>
										<textarea class="form-control" id="description_ch" type="text" required="" name="description_ch" placeholder="輸入描述"><?php echo $packageInfo_ch[0]['package_description_ch'] ?></textarea>
										<div class="err_msg" id="err_description_ch"></div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6">
										<label for="mobile" ><span>*</span>Package Price</label>
										<input class="form-control" id="price" type="number" step="0.01" min="0" required="" name="price" value="<?php echo $packageInfo[0]['package_price'] ?>" placeholder="Enter Price">
										<div class="err_msg" id="err_price"></div>
									</div>
									<div class="col-sm-6">
										<label for="mobile" ><span>*</span>Package Price (Chinese)</label>
										<input class="form-control" id="price_ch" type="text" step="0.01" required="" name="price_ch" value="<?php echo $packageInfo_ch[0]['package_price_ch'] ?>" placeholder="輸入價格">
										<div class="err_msg" id="err_price_ch"></div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label for="mobile" ><span>*</span>Discount Price</label>
										<input class="form-control" id="discountprice" type="number" step="0.01" min="0" required="" name="discountprice" value="<?php echo $packageInfo[0]['package_discount_price'] ?>" placeholder="Enter Discount Price">
										<div class="err_msg" id="err_discountprice"></div>
									</div>
									<div class="col-sm-6">
										<label for="mobile" ><span>*</span>Discount Price (Chinese)</label>
										<input class="form-control" id="discountprice_ch" type="text" step="0.01"  required="" name="discountprice_ch" value="<?php echo $packageInfo_ch[0]['package_discount_price_ch'] ?>" placeholder="輸入折扣價">
										<div class="err_msg" id="err_discountprice_ch"></div>
									</div>
								</div>
									
								<div class="form-group row">
									<div class="col-sm-6">
										<label  ><span>*</span> Features</label>
										<textarea class="form-control" name="features" id="features" rows="4" placeholder="Enter Features"><?php echo $packageInfo[0]['package_features'] ?></textarea>
										<div class="err_msg" id="err_features"></div>
									</div>
									<div class="col-sm-6">
										<label><span>*</span> Features (Chinese)</label>
										<textarea class="form-control" name="features_ch" id="features_ch" rows="4" placeholder="輸入功能"><?php echo $packageInfo_ch[0]['package_features_ch'] ?></textarea>
										<div class="err_msg" id="err_features_ch"></div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6">
										<label for="period" ><span>*</span> Period (In Days)</label>
										<input class="form-control" id="period" type="text" required="" name="period"  value="<?php echo $packageInfo[0]['package_period'] ?>" placeholder="Enter Period (In Days)">
										<div class="err_msg" id="err_period"></div>
									</div>
									<div class="col-sm-6">
										<label for="from_organization_ch" ><span>*</span> Period (In Days) (Chinese)</label>
										<input class="form-control" id="period_ch" type="text" required="" name="period_ch" value="<?php echo $packageInfo_ch[0]['package_period_ch'] ?>" placeholder="輸入期間（以天為單位）">
										<div class="err_msg" id="err_period_ch"></div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6">
										<label for="period" ><span>*</span> Package Type</label>
										<select class="form-control" id="type" required="" name="type">
											<option value="">Select Type</option>
											<option value="FREE" <?php if($packageInfo[0]['package_type']=='FREE'){ echo 'selected';} ?>>FREE</option>
											<option value="PAID" <?php if($packageInfo[0]['package_type']=='PAID'){ echo 'selected';} ?>>PAID</option>
										</select>
										<div class="err_msg" id="err_type"></div>
									</div>
									<div class="col-sm-6">
										<label for="from_organization_ch" ><span>*</span>  Package Type (Chinese)</label>
										<select class="form-control" id="type_ch" required="" name="type_ch">
											<option value="">Select Type</option>
											<option value="自由的" <?php if($packageInfo_ch[0]['package_type_ch']=='自由的'){ echo 'selected';} ?>>自由的</option>
											<option value="有薪酬的" <?php if($packageInfo_ch[0]['package_type_ch']=='有薪酬的'){ echo 'selected';} ?>>有薪酬的</option>
										</select>
										<div class="err_msg" id="err_type_ch"></div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6">
										<label for="period" ><span>*</span> Status</label>
										<select class="form-control" id="status" required="" name="status">
											<option value="">Select Status</option>
											<option value="Active" <?php if($packageInfo[0]['package_status']=='Active'){ echo 'selected';} ?>>Active</option>
											<option value="Inactive" <?php if($packageInfo[0]['package_status']=='Inactive'){ echo 'selected';} ?>>Inactive</option>
										</select>
										<div class="err_msg" id="err_status"></div>
									</div>
									<div class="col-sm-6">
										
									</div>
								</div>
									
							</div>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary custom-btn"  name="btn_update_package" id="btn_save_package">
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