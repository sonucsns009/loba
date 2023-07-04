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
						<h5>NURSE LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Nurse/addNurse" style="float:right">Add Nurse</a>
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
							 if(isset($nurseList) && count($nurseList)>0)									
							{
							?>							
                                <thead>
                                    <tr>												
                                        <th>Sr.No</th>
                                        <th>Name / CH</th>
                                        <th>Email / CH</th>
                                        <th>Mobile</th>
                                        <th>Address / CH</th>
                                        <th>From Organization</th>
                                        <th>Charges/Hrs</th>
                                        <th>Charges/Visit</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>											
                                </thead>											
                                <tbody>	
                                <?php 
                                //print_r($serviceList);
                                $i=1; 											
                                    foreach($nurseList as $nurse)
                                    {			
                                        //print_r($nurse);
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo ucfirst($nurse['nurse_full_name']);?> / <?php echo ucfirst($nurse['nurse_full_name_ch']);?></td>
                                            <td><?php echo $nurse['email'];?> </td>
                                            <td><?php echo $nurse['mobile_no'];?></td>
                                            <td><?php echo $nurse['address'];?> / <?php echo $nurse['address_ch'];?></td>
                                            <td><?php echo $nurse['from_organization'];?> / <?php echo $nurse['from_organization_ch'];?></td>
                                            <td><?php echo $nurse['charges_per_hourse'];?> / <?php echo $nurse['charges_per_hourse_ch'];?></td>
                                            <td><?php echo $nurse['charges_per_visit'];?> / <?php echo $nurse['charges_per_visit_ch'];?></td>
                                            <?php
												if($nurse['nurse_status']=='Active'){ $color="style='color:green'";}
												else if($nurse['nurse_status']=='Delete'){ $color="style='color:red'";}
												else if($nurse['nurse_status']=='Inactive'){ $color="style='color:yellow'";}
												?>
                                            <td <?=$color;?>><?php echo $nurse['nurse_status'];?> </td>
                                            <td>
                                                <a href="<?php echo base_url();?>backend/Nurse/updateNurse/<?php echo base64_encode($nurse['nurse_id']);?>"><i data-feather="edit"></i></a>
                                                <a href="<?php echo base_url();?>backend/Nurse/deleteNurse/<?php echo base64_encode($nurse['nurse_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
                                                <a href="<?php echo base_url();?>backend/Nurse/nurseDetails/<?php echo base64_encode($nurse['nurse_id']);?>"><i data-feather="eye"></i></a>
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