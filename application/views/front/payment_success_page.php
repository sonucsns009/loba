<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mt-5">
                <!-- /col -->
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-center">
                        <h3>Add Payment Method</h3>
                        <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                            <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Page</li>
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
                <!-- <div class="col-lg-12"> 
                    <a class="btn theme-btn mb-20" href="mypayment.html" ><span> Back</span></a>
                </div> -->
            </div>           
            <div class="row"> 
                <div class="col-lg-4 ">
                    
                </div>
                <div class="col-lg-5 text-center"> 
                    <div class="card" style="background-color:powderblue;">
                        <div class="row card-body" >
                                <div class="col-lg-12"> 
                                    <img src="<?php echo base_url();?>template/front/images/correct.png" style="height: 100px;width: 100px;" /><br/>
                                    <h4>Thank You.</h4>
                                    <h6>Your Order ID :- <?php if(isset($orderData)){ echo $orderData['order_no'];}?></h6>
                                </div>
                                <div class="col-lg-12" style="margin-top: 20px;"> 
                                    <a class="btn theme-btn mb-20" href="<?php echo site_url('Dashboard')?>" ><span> Back To Home </span></a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>                 
          
        </div>
    </section>  