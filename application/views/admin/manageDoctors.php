<?php 
 $sessiondata=$this->session->userdata('logged_in');
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
						<h5>DOCTOR LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Doctors/addDoctor" style="float:right">Add Doctor</a>
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
							 if(isset($doctorList) && count($doctorList)>0)									
							{
							?>							
                                <thead>
                                    <tr>												
                                        <th>Sr.No</th>
                                        <th>Name / CH</th>
                                        <th>Email / CH</th>
                                        <th>Mobile</th>
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
                                    foreach($doctorList as $doctor)
                                    {			
                                        //print_r($doctor);
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo ucfirst($doctor['doctor_full_name']);?> / <?php echo ucfirst($doctor['doctor_full_name']);?></td>
                                            <td><?php echo ucfirst($doctor['email']);?> </td>
                                            <td><?php echo ucfirst($doctor['mobile_no']);?></td>
                                            <td><?php echo $doctor['from_organization'];?> / <?php echo $doctor['from_organization'];?></td>
                                            <td><?php echo $doctor['charges_per_hourse'];?> / <?php echo $doctor['charges_per_hourse'];?></td>
                                            <td><?php echo $doctor['charges_per_visit'];?> / <?php echo $doctor['charges_per_visit'];?></td>
                                            <?php
												if($doctor['doctor_status']=='Active'){ $color="style='color:green'";}
												else if($doctor['doctor_status']=='Delete'){ $color="style='color:red'";}
												else if($doctor['doctor_status']=='Inactive'){ $color="style='color:yellow'";}
												?>
                                            <td <?=$color;?>><?php echo $doctor['doctor_status'];?></td>
                                            <td>
                                                <a href="<?php echo base_url();?>backend/Doctors/updateDoctor/<?php echo base64_encode($doctor['doctor_id']);?>"><i data-feather="edit"></i></a>
                                                <a href="<?php echo base_url();?>backend/Doctors/deleteDoctor/<?php echo base64_encode($doctor['doctor_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
                                                <a href="<?php echo base_url();?>backend/Doctors/doctorDetails/<?php echo base64_encode($doctor['doctor_id']);?>"><i data-feather="eye"></i></a>
                                        
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