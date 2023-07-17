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
						<h5>SERVICE PROVIDER LISTING</h5>
						 
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Serviceprovider/addServiceprovider" style="float:right">Add New Service Provider</a>
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

						<form name="frm_addslider" class="needs-validation" method="POST" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-sm-4">
									<label for="services_title" > Search</label>
									<input class="form-control" type="text" required="" name="search_name" placeholder="Search by Name" value="<?php if(isset($search_name) && $search_name!="") echo $search_name;?>">
									<div class="err_msg" id="err_full_name"></div>
								</div>
								<div class="col-sm-2">
									 <br>
									<input class="btn btn-success"  type="submit" name="btn_search_sp" value="Search">
 								</div>
								 <div class="col-sm-2">
									 <br>
									 <a  class="btn btn-primary custom-btn" href="<?php echo base_url();?>backend/Serviceprovider/manageServiceproviders">
									Clear</a>
 								</div>
							</div>
						</form>
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
							<?php
							 if(isset($userList) && count($userList)>0)									
							{
							?>							
                                <thead>
                                    <tr>												
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Mobile</th>
                                        <th>Address / CH</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Status Change</th>
                                        <th>Action</th>
                                    </tr>											
                                </thead>											
                                <tbody>	
                                <?php 
                               // print_r($userList);
                                $i=1; 											
                                    foreach($userList as $user)
                                    {			
										//echo $user['status_flag'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo ucfirst($user['full_name']);?></td>
                                            <td><?php echo $user['email'];?> </td>
                                            <td><?php echo $user['mobile'];?><br><?php echo $user['alt_mobile'];?></td>
                                            <td><?php echo $user['address'];?> </td>
                                            <td><?php echo $user['user_type'];?> </td>
                                            <?php
												if($user['status_flag']=='Active'){ $color="style='color:green'";}
												else if($user['status_flag']=='Delete'){ $color="style='color:red'";}
												else if($user['status_flag']=='Inactive'){ $color="style='color:#df9713'";}
                                            ?>
                                            <td <?=$color;?>><?php echo $user['status_flag'];?> </td>
											<td>
												<?php if($user['status_flag']!='Active') { ?>
													<a href="<?php echo base_url();?>backend/Serviceprovider/change_status/<?php echo base64_encode($user['user_id']);?>/<?php echo base64_encode('Active');?>" class="btn-sm btn-success">Active</a>
													<?php } else { ?>
													<a href="<?php echo base_url();?>backend/Serviceprovider/change_status/<?php echo base64_encode($user['user_id']);?>/<?php echo base64_encode('Inactive');?>" class="btn-sm btn-danger">Inactive</a>
												<?php } ?>
											</td>
                                            <td>
                                                <a href="<?php echo base_url();?>backend/Serviceprovider/updateServiceprovider/<?php echo base64_encode($user['user_id']);?>"><i data-feather="edit"></i></a>
                                                <a href="<?php echo base_url();?>backend/Serviceprovider/deleteServiceprovider/<?php echo base64_encode($user['user_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
                                                <a href="<?php echo base_url();?>backend/Serviceprovider/ServiceproviderDetails/<?php echo base64_encode($user['user_id']);?>"><i data-feather="eye"></i></a>
                                            </td>
                                        </tr>											
                                <?php $i++; }?>
                                </tbody>									
                            </table>
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate" style="margin-top:10px;">
                            </div>									
                            <?php } else { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
                            </div>									
                            <?php } ?>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->
</div>