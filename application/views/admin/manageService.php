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
						<h5>SERVICE LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Services/addService" style="float:right">Add Service</a>
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
							 if(isset($serviceList) && count($serviceList)>0)									
							{
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Name / CH</th>
											<th>Description / CH</th>
											<th>Tagline / CH</th>
											<th>Duration / CH</th>
											<th>Image</th>
											<th>Status</th>
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>	
									<?php 
									//print_r($serviceList);
									$i=1; 											
										foreach($serviceList as $service)
										{			
											//print_r($service);
											$str_images=$str_images1='';										
											if($service['service_image']!="")
											{
												$str_images='<img src="'.base_url().'uploads/service_img/'.$service['service_image'].'" style="width:50px;height:50px">';
											}	
											?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo ucfirst($service['service_name']);?> / <?php echo ucfirst($service['service_name_ch']);?></td>
												<td><?php echo ucfirst($service['service_description']);?> / <?php echo ucfirst($service['service_description_ch']);?></td>
												<td><?php echo ucfirst($service['service_tagline']);?> / <?php echo ucfirst($service['service_tagline_ch']);?></td>
												<td><?php echo $service['duration'];?> / <?php echo $service['duration_ch'];?></td>
												
												<?php if($str_images!="") {?>
												<td> <?php echo $str_images;?></td>
												<?php } else {?>
												<td> <img src="<?php echo base_url();?>template/admin/assets/images/lookbook.jpg" alt="No image Found"style="width:50px;height:50px" /></td>
												<?php } ?>
												<?php
												if($service['service_status']=='Active'){ $color="style='color:green'";}
												else if($service['service_status']=='Delete'){ $color="style='color:red'";}
												else if($service['service_status']=='Inactive'){ $color="style='color:yellow'";}
												?>
												<td <?=$color;?>><?php echo $service['service_status'];?></td>
												<td>
													<a href="<?php echo base_url();?>backend/Services/updateService/<?php echo base64_encode($service['service_id']);?>"><i data-feather="edit"></i></a>
													<a href="<?php echo base_url();?>backend/Services/deleteService/<?php echo base64_encode($service['service_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
													<a href="<?php echo base_url();?>backend/Services/serviceDetails/<?php echo base64_encode($service['service_id']);?>"><i data-feather="eye"></i></a>
											
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