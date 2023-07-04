<?php $sessiondata=$this->session->userdata('logged_in');
	#print_r($sessiondata);exit;
$session_user_type=$sessiondata['user_type'];
?>
<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-xl-3 xl-30">
				<div class="card o-hidden widget-cards">
					<div class="bg-warning card-body" >
						<div class="media static-top-widget row">
						
							<a <?php if($session_user_type=='Admin') {?>href="<?php echo base_url();?>backend/Doctors/manageDoctor" target="_new" <?php } else { ?>href="javascript:void(0);"<?php } ?>>
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/customer.svg" alt="">
								</div>
								<div>
									<span class="m-0" style="color: #ffffff;"><strong>TOTAL DOCTORS</strong></span>
								<h3 class="mb-0" ><span class="counter"><?php echo $alldoctors;?></span></h3>
								</div>
								
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3 xl-30" >
				<div class="card o-hidden  widget-cards">
					<div class="bg-secondary card-body" >
						<div class="media static-top-widget row">
							<a <?php if($session_user_type=='Admin') {?> href="<?php echo base_url();?>backend/Nurse/manageNurse" target="_new" <?php }  else { ?>href="javascript:void(0);"<?php } ?>>
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/merchants.svg" alt="">
								</div>
								<div>
								<span class="m-0" style="color: #ffffff;">TOTAL NURSE</span>
								<h3 class="mb-0"><span class="counter"><?php echo $allnurse;?></span></h3>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3 xl-30">
				<div class="card o-hidden widget-cards">
					<div class="bg-primary card-body" >
						<div class="media static-top-widget row">
							<a <?php if($session_user_type=='Admin') {?> href="<?php echo base_url();?>backend/Services/manageService" target="_new" <?php } else { ?>href="javascript:void(0);"<?php }?>>
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/order.svg" alt="">
								</div>
								<div>
								<span class="m-0" style="color: #ffffff;">TOTAL SERVICE</span>
								<h3 class="mb-0"><span class="counter"><?php echo $allservices;?></span></h3>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		<div class="row">
			
			
			
			
			
			
			
			

		</div>
	</div>
	<!-- Container-fluid Ends-->

</div>