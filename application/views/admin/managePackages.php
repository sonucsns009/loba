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
						<h5>PACKAGES LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Packages/addPackage" style="float:right">Add Package</a>
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
							 if(isset($packageList) && count($packageList)>0)									
							{
							?>							
                                <thead>
                                    <tr>												
                                        <th>Sr.No</th>
                                        <th>Title / CH</th>
                                        <th>Description / CH</th>
                                        <th>Price/CH</th>
                                        <th>Discount Price/CH</th>
                                        <th>Period(in Days)</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>											
                                </thead>											
                                <tbody>	
                                <?php 
                                //print_r($serviceList);
                                $i=1; 											
                                    foreach($packageList as $package)
                                    {			
                                       // print_r($package);
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo ucfirst($package['package_title']);?> / <?php echo ucfirst($package['package_title_ch']);?></td>
                                            <td><?php echo $package['package_description'];?> / <?php echo $package['package_description_ch'];?></td>
                                            <td><?php echo $package['package_price'];?></td>
                                            <td><?php echo $package['package_discount_price'];?> / <?php echo $package['package_discount_price_ch'];?></td>
                                            <td><?php echo $package['package_period'];?> / <?php echo $package['package_period_ch'];?></td>
                                            <td><?php echo $package['package_type'];?> / <?php echo $package['package_type_ch'];?></td>
                                            <?php
												if($package['package_status']=='Active'){ $color="style='color:green'";}
												else if($package['package_status']=='Delete'){ $color="style='color:red'";}
												else if($package['package_status']=='Inactive'){ $color="style='color:yellow'";}
												?>
                                            <td <?=$color;?>><?php echo $package['package_status'];?> </td>
                                            <td>
                                                <a href="<?php echo base_url();?>backend/Packages/updatePackage/<?php echo base64_encode($package['package_id']);?>"><i data-feather="edit"></i></a>
                                                <a href="<?php echo base_url();?>backend/Packages/deletePackage/<?php echo base64_encode($package['package_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
                                                <!-- <a href="<?php echo base_url();?>backend/Packages/packageDetails/<?php echo base64_encode($package['package_id']);?>"><i data-feather="eye"></i></a> -->
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