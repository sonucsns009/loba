<?php //$sessiondata=$this->session->userdata('logged_in');
	#print_r($sessiondata);exit;
//$session_user_type=$sessiondata['user_type'];
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
			<!-- <div class="col-lg-6 col-xl-3 xl-30">
				<div class="card o-hidden widget-cards">
					<div class="bg-warning card-body" >
						<div class="media static-top-widget row">
						
							<a <?php if($session_user_type=='Admin') {?>href="<?php echo base_url();?>backend/Users/manageUsers" target="_new" <?php } else { ?>href="javascript:void(0);"<?php } ?>>
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/customer.svg" alt="">
								</div>
								<div>
									<span class="m-0" style="color: #ffffff;"><strong>TOTAL CUSTOMERS</strong></span>
								<h3 class="mb-0" ><span class="counter"><?php echo $totalCustomer;?></span></h3>
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
							<a <?php if($session_user_type=='Admin') {?> href="<?php echo base_url();?>backend/Merchant/manageMerchants" target="_new" <?php }  else { ?>href="javascript:void(0);"<?php } ?>>
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/merchants.svg" alt="">
								</div>
								<div>
								<span class="m-0" style="color: #ffffff;">TOTAL MERCHANTS/ PARTNERS</span>
								<h3 class="mb-0"><span class="counter"><?php echo $totalRestauarant;?></span></h3>
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
							<a <?php if($session_user_type=='Admin') {?> href="<?php echo base_url();?>backend/Orders/manageOrders" target="_new" <?php } else { ?>href="javascript:void(0);"<?php }?>>
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/order.svg" alt="">
								</div>
								<div>
								<span class="m-0" style="color: #ffffff;">TOTAL ORDERS</span>
								<h3 class="mb-0"><span class="counter"><?php echo $totalOrders;?></span></h3>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3 xl-30" >
				<div class="card o-hidden widget-cards">
					<div class="bg-danger card-body"  >
						<div class="media static-top-widget row">
							
							<div class="media-body col-12 de-icon">
								<div class="de-customer-icon">
									<img src="<?php echo base_url();?>template/admin/assets/images/dashboard/revenue.svg" alt="">
								</div>
								<div>
								<span class="m-0">TOTAL REVENUE</span>
								<h3 class="mb-0">€ <span class="counter"><?php echo round($admintotalRevenus[0]['total_admin_commission'],2);?></span></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			
			
		</div>
		<div class="row">
			
			<!-- <div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">LATEST CUSTOMERS</h6>
						
					</div>
					<div class="card-body">
					<?PHP if(isset($getLatestCustomers) && count($getLatestCustomers)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone table-striped">
								
								<tbody>
								<?php $i=1;
								foreach($getLatestCustomers as $g) {?>
								<tr>
									<td style="border-top:0px;">#<?php echo $i;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['profile_id'];?></td>
									<td class="digits" style="border-top:0px;"><?php if($g['fullname']!="") { echo ucfirst($g['fullname']);} else { echo '-';}?></td>
									
									<td class="digits" style="border-top:0px;"><?php echo $g['country_code']." ".$g['mobilenumber'];?></td>
									
								</tr>
								<?php $i++;} ?>
								</tbody>
							</table>
							
						</div>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
					</div>
				</div>
			</div>
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">TOP MERCHANT</h6>
					</div>
					<div class="card-body">
					<?php 
					if(isset($getTopStores) && count($getTopStores)>0)
					{
						foreach($getTopStores as $g) {?>
						<div class="row">
                                    <div class="col-6">
                                       MERCHANT NAME
                                    </div>
                                    <div class="col-6">
                                      <?php echo $g['rst_name'];?>
                                    </div>
                                </div>
						<div class="row">
                                    <div class="col-6">
                                       CONTACT 
                                    </div>
                                    <div class="col-6">
                                       <?php echo $g['rst_countrycode']."".$g['rst_contact_no'];?>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-6">
                                      <?php echo $g['rst_email'];?>
                                    </div>
                                    <div class="col-6">
									<?php if($session_user_type=='Admin') {?>
                                    <a href="<?php echo base_url();?>backend/Merchant/viewMerchant/<?php echo base64_encode($g['rst_id']);?>" class="btn btn-primary" target="_new">VIEW DETAILS</a>
									<?php } ?>
                                    </div>
                                </div>
								
								<hr/>
								
					<?php } 
					} else { ?>
					<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>	
					</div>
				</div>
			</div>
			
			 -->
			

		</div>
	</div>
	<!-- Container-fluid Ends-->

</div>