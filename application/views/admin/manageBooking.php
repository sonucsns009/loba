<?php 
// $sessiondata=$this->session->userdata('logged_in');
// 	#print_r($sessiondata);exit;
// $session_admin_id=$sessiondata['admin_id']; 
// $session_admin_name=$sessiondata['admin_name'];
// $session_user_type=$sessiondata['user_type'];
// $session_subroles=$sessiondata['subroles'];

// //if($session_user_type=="Subadmin" && $session_subroles!="NULL")
// {
// 	$modulesId=$this->Admin_model->getmodulelist($session_subroles);
// }
#echo $this->db->last_query();
 #echo '<pre>';print_r($modulesId);exit;
?>
<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>BOOKING LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							</div>
						</div>
					</div>
							
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
						<?php }?>
						<?php if($this->session->flashdata('error_msg')!=""){?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $this->session->flashdata('error_msg');?>
						</div>
						<?php }?>										
					
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
							<?php
							 if(isset($bookingList) && count($bookingList)>0)									
							{
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Service Name</th>
											<th>Customer</th>
											<th>Date</th>
											<th>Time</th>
											<th>Hrs</th>
											<th>Status</th>
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>	
									<?php 
									//print_r($serviceList);
									$i=1; 											
										foreach($bookingList as $booking)
										{			
                                        ?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo ucfirst($booking['service_name']);?></td>
												<td><?php echo ucfirst($booking['full_name']);?></td>
												<td><?php echo $booking['booking_date'];?> </td>
												<td><?php echo $booking['time_slot'];?></td>
												<td><?php echo $booking['no_of_hourse'];?></td>
												<?php
                                                $status="";
												if($booking['booking_status']=='Active'){ $color="style='color:green'";}
												else if($booking['booking_status']=='Delete'){ $color="style='color:red'";}
												else if($booking['booking_status']=='waiting_for_accept'){ $status="Waiting"; $color="style='color:#fb7c0f'";}
												?>
												<td <?=$color;?>><?php echo $status;?></td>
												<td>
													<a href="<?php echo base_url();?>backend/Booking/bookingDetails/<?php echo base64_encode($booking['booking_id']);?>"><i data-feather="eye"></i></a>
 												</td>											
											</tr>											
									<?php $i++; }?>
									</tbody>									
								</table>
									<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate" style="margin-top:10px;">
									 
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
	</div>
	<!-- Container-fluid Ends-->
</div>
