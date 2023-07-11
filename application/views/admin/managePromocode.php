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
						<h5>PROMOCODE LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Promocode/addPromocode" style="float:right">Add Promocode</a>
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
							 if(isset($promocodeList) && count($promocodeList)>0)									
							{
							?>							
                                <thead>
                                    <tr>												
                                        <th>Sr.No</th>
                                        <th>Code</th>
                                        <th>Service Name</th>
                                        <th>Code Type</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>											
                                </thead>											
                                <tbody>	
                                <?php 
                                //print_r($serviceList);
                                $i=1; 											
                                    foreach($promocodeList as $promocode)
                                    {			
                                       // print_r($package);
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $promocode['promocode_code'];?></td>
                                            <td><?php echo $promocode['service_name'];?> </td>
                                            <td><?php echo $promocode['promocode_type'];?> </td>
                                            <td><?php echo $promocode['promocode_discount'];?></td>
                                            <?php
												if($promocode['promocode_status']=='Active'){ $color="style='color:green'";}
												else if($promocode['promocode_status']=='Delete'){ $color="style='color:red'";}
												else if($promocode['promocode_status']=='Inactive'){ $color="style='color:yellow'";}
												?>
                                            <td <?=$color;?>><?php echo $promocode['promocode_status'];?> </td>
                                            <td>
                                                <a href="<?php echo base_url();?>backend/Packages/updatePackage/<?php echo base64_encode($promocode['promocode_id']);?>"><i data-feather="edit"></i></a>
                                                <a href="<?php echo base_url();?>backend/Packages/deletePackage/<?php echo base64_encode($promocode['promocode_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
                                                <!-- <a href="<?php echo base_url();?>backend/Packages/packageDetails/<?php echo base64_encode($promocode['promocode_id']);?>"><i data-feather="eye"></i></a> -->
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