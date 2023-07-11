<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <!-- Service Provider Basic details -->
                    <div class="col-sm-6">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5>  SERVICE PROVIDER DETAILS </h5>
                            </div>
                            <div class="card-body">
						<?php
							 if(isset($serviceproviderInfo) && count($serviceproviderInfo)>0)									
							{
							?>
                               
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
                                        <div class="form-group row">
											  
                                            <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <?php
                                                        $str_images=$str_images1='';										
                                                        if($serviceproviderInfo[0]['profile_pic']!="")
                                                        {
                                                            $str_images='<img src="'.base_url().'uploads/user/profile_pic/'.$serviceproviderInfo[0]['profile_pic'].'" style="width:110px;height:110px">';
                                                        }
                                                        if($str_images!="") 
                                                        {
                                                        echo $str_images;
                                                        } else { ?>
                                                            <img src="<?php echo base_url();?>template/admin/assets/images/lookbook.jpg" alt="No image Found"style="width:110px;height:110px" />
                                                        <?php } 
                                                        ?>
                                                    </div>
													<div class="form-group">
														<label for="services_title" > Full Name  </label><br>
														<?php echo $serviceproviderInfo[0]['full_name'];?> / <?php echo $serviceproviderInfo_ch[0]['full_name'];?>
													</div>

													<div class="form-group">
														<label>Email</label><br>
														<?php echo $serviceproviderInfo[0]['email'];?> / <?php echo $serviceproviderInfo_ch[0]['email'];?>
													</div>

													<div class="form-group">
														<label>Mobile No</label><br>
														<?php echo $serviceproviderInfo[0]['mobile'];?> / <?php echo $serviceproviderInfo_ch[0]['mobile'];?>
													</div>
													<div class="form-group">
														<label>Emergency Mobile No</label><br>
														<?php echo $serviceproviderInfo[0]['alt_mobile'];?> / <?php echo $serviceproviderInfo_ch[0]['alt_mobile'];?>
													</div>
													<div class="form-group">
														<label>Address</label><br>
														<?php echo $serviceproviderInfo[0]['address'];?> / <?php echo $serviceproviderInfo_ch[0]['address'];?>
													</div>
													<div class="form-group">
														<label>Gender</label><br>
														<?php echo $serviceproviderInfo[0]['gender'];?> / <?php echo $serviceproviderInfo_ch[0]['gender'];?>
													</div>
													<div class="form-group">
														<label>Weight</label><br>
														<?php echo $serviceproviderInfo[0]['weight'];?> / <?php echo $serviceproviderInfo_ch[0]['weight'];?>
													</div>
													<div class="form-group">
														<label>Mobility Aid</label><br>
														<?php echo $serviceproviderInfo[0]['mobility_aid'];?> / <?php echo $serviceproviderInfo_ch[0]['mobility_aid'];?>
													</div>
													<div class="form-group">
														<label>Identification Document Number</label><br>
														<?php echo $serviceproviderInfo[0]['id_proof_no'];?> / <?php echo $serviceproviderInfo_ch[0]['id_proof_no'];?>
													</div>
                                                    <div class="form-group">
														<label>Identification Document</label><br>
                                                        <?php
                                                        if($serviceproviderInfo[0]['id_proof_front']!="")
                                                        {
                                                            echo $str_images='<a href="'.base_url().'uploads/user/id_proof/'.$serviceproviderInfo[0]['id_proof_front'].'" target="_blank">View Front Id Proof</a>';
                                                        }else {  
                                                           echo "NA";
                                                        } 
                                                        if($serviceproviderInfo[0]['id_proof_back']!="")
                                                        {
                                                            echo $str_images=' / <a href="'.base_url().'uploads/user/id_proof/'.$serviceproviderInfo[0]['id_proof_back'].'" target="_blank">View Back Id Proof</a>';
                                                        }else {  
                                                           echo "NA";
                                                          } 
                                                        ?>
													</div>     
                                                   
													<div class="form-group">
														<label>Medical History</label><br>
														<?php echo $serviceproviderInfo[0]['medical_history'];?> / <?php echo $serviceproviderInfo_ch[0]['medical_history'];?>
													</div>
												</div>
										    </div>
                                        </div>
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
<!-- Services List -->
                    <div class="col-sm-6">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> ALL SERVICES  </h5>
                            </div>
                        <div class="card-body">
						    <?php
							 if(isset($serviceList) && count($serviceList)>0)									
							{
							?>
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									   		<div class="form-group row">
											   
											  	<div class="col-sm-12">
                                                  <table class="table table-bordered table-striped mb-0" id="datatable-default">			
                                                    <?php
                                                    if(isset($serviceList) && count($serviceList)>0)									
                                                    {
                                                    ?>							
                                                        <thead>
                                                            <tr>												
                                                                <th>Sr.No</th>
                                                                <th>Service Name</th>
                                                                
                                                            </tr>											
                                                        </thead>											
                                                        <tbody>	
                                                        <?php 
                                                        //print_r($serviceList);
                                                        $i=1; 											
                                                            foreach($serviceList as $service)
                                                            {			
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $i;?></td>
                                                                    <td><?php echo ucfirst($service['service_name']);?></td>
                                                                    
                                                                </tr>											
                                                        <?php $i++; } ?>
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
								<?php } else 
								{?>
                                 <div class="tab-content" id="myTabContent">
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records available.
								</div>									
								</div>									
								<?php }?>
                            </div>
                        </div>
                    </div> 
<div class="col-md-12"></div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>
