<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mt-5">
                <!-- /col -->
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-center">
                        <h3>Payment</h3>
                        <p class="text-muted text-center text-md-center mt-2 mb-0">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                        </p>
                        <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                            <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">payment </li>
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
                    <a class="btn theme-btn mb-20" href="checkout.html" ><span>Back</span></a>
                </div>
            </div>
            <form id="sign-up-form" action="payment.html" method="post">
              <div class="form-container ">
              <div class="row"> 
                
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                       <h4 class="card-title">Select Payment Method <a class="btn theme-btn pull-right" href="<?php echo site_url('Home/addCard')?>" ><span>Add Payment</span></a></h4>
                      </div>
                      <div class="card-body">
                      <?php if ($this->session->flashdata('success') != "") { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error') != "") { ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error_msg') != "") { ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error_msg'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <?php if(count($cardData)>0 ){
                                foreach($cardData as $row){?>
                                <?php if($row['is_select']=="yes"){?>
                                        <div class="col-lg-12">
                                            <div class="payment-method-list" onclick="getCardSelect(<?php echo $row['card_id'];?>)">                                    
                                                <label  for="card"><i class="uil-credit-card" ></i> <?php echo $row['card_no'];?></label>
                                                <input class="form-check-input" type="radio" checked name="pay_card" id="pay_card" >
                                            </div>
                                        </div>
                                    <?php }else{?>
                                        <div class="col-lg-12">
                                            <div class="payment-method-list" onclick="getCardSelect(<?php echo $row['card_id'];?>)">                                    
                                                <label  for="card"><i class="uil-credit-card" ></i> <?php echo $row['card_no'];?></label>
                                                <input class="form-check-input" type="radio" name="pay_card" id="pay_card" >
                                            </div>
                                        </div>
                                    <?php }?>
                            <?php } } else {?>
                            <div class="col-lg-12">
                                <div class="payment-method-list">                                    
                                   <h4>No Card Found</h4>
                                </div>
                            </div>
                                <?php } ?>
                            <!-- <div class="col-lg-6">
                                <div class="payment-method-list">                                    
                                    <label for="bank"><i class="uil-university"></i> Net Banking</label>                                    
                                    <input class="form-check-input" type="radio" name="payment" id="bank">
                                </div>
                            </div> -->
                        </div>
                      </div>
                    </div>                  
                </div>
                
              </div>
              </div>
            </form>                    
          
      </div>
    </section>  