<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mt-5">
                <!-- /col -->
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-center">
                        <h3><?php echo $title;?></h3>
                        <p class="text-muted text-center text-md-center mt-2 mb-0">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                        </p>
                        <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                            <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service Booking </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <section class="sign-up-area pt-60 pb-60">
      <div class="container">
            <div class="row"> 
                <div class="col-lg-12"> 
                            <a class="btn theme-btn mb-20" href="javascript:history.go(-1)" ><span>Back</span></a>

                </div>
            </div>
            <form id="sign-up-form" action="checkout.html" method="post">
              <div class="form-container ">
              <div class="row g-0"> 
                
                <div class="col-lg-12">
                    <div class="doctor-search-wrap">
                        <div class="doctor-search">
                            <input type="text" class="  search form-control" placeholder="Search" id="nurse_search" name="nurse_search" onkeypress="geNurseSearchByName()" onkeydown="geNurseSearchByName()"/>
                        </div>
                    </div>                        
                        
                  
                </div>
                
              </div>
              </div>
            </form>  
            <div class="doctor-list-wrap">
                <div class="row" id="div_nurse_list"> 
                    <?php 
                    if(isset($doctorList) && count($doctorList)>0)
                    {

                        foreach($doctorList as $row){
                    ?>
                    <div class="col-lg-6" class="">
                        <div class="Staff-detail-wraper">
                            <div class="Staff-img">
                                <?php if($row['nurse_image']!=""){?>
                                    <img src="<?php echo base_url().'uploads/nurse_images/'.$row['nurse_image'];?>" class="img-fluid">
                                <?php }else{?>
                                    <img src="<?php echo base_url().'uploads/user/user.png';?>" class="img-fluid">
                                <?php }?>

                                </div>
                            <div class="Staff-containt">
                                <div class="Staff-basic-details">
                                    <div class="staff-left">
                                        <h5> <?php echo $row['nurse_full_name'];?> <!-- <span class="ratings"><i class="fa fa-star" aria-hidden="true"></i>5</span> --></h5>
                                        
                                        <p class="staff-fee">Fees :-  HK<?php echo $row['charges_per_hourse'];?></p>
                                        
                                    </div> 
                                    <div class="staff-right">
                                        <p class="Staff-id">ID : <?php echo $row['loba_id'];?></p>
                                        <div class="staff-contact">
                                            <a href="<?php if(isset($category_id)){ echo base_url().'Doctor/bookNurse/'.base64_encode($row['nurse_id']).'/'.base64_encode($category_id);}?>" class="btn theme-btn ">Book Now</a>
                                            
                                        </div>
                                    </div>                                                    
                                </div>                                                
                            </div>                             
                        </div> 
                    </div>
                    <?php }
                    }?>
                </div>
            </div>                  
          
      </div>
    </section>  
        