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
                                <li class="breadcrumb-item active" aria-current="page">Add Payment Method</li>
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
                    <a class="btn theme-btn mb-20" href="mypayment.html" ><span> Back</span></a>
                </div>
            </div>           
            <div class="row">                 
                <div class="col-lg-3"> 
                <?php $this->load->view('front/sidebar_left');?>                                
                         
                </div> 
                <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header">
                       <h4 class="card-title">Add Payment Method </h4>
                      </div>
                      <div class="card-body">
                      <form name="add-card-form" id="add-card-form"  method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="SelectGender" class="form-label">Select Payment Type</label>
                                        <select class="form-select" aria-label="Default select example" name="card_type" id="card_type">
                                          <option selected="" value="">Select Payment Type</option>
                                          <option value="1">Debit Card</option>
                                          <option value="2">Credit Card</option>                                          
                                        </select>
                                    </div>
                                    <span id="err_card_type" style="color:red;"></span>

                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="card_name" class="form-label">Card Holder Name</label>
                                        <input class="form-control" id="card_name" name="card_name" placeholder="Enter Card Holder Name*" type="text">
                                        <span id="err_card_name" style="color:red;"></span>

                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="card_no" class="form-label">Card No</label>
                                        <input class="form-control" id="card_no" name="card_no" placeholder="Enter Card No*" type="text">
                                        <span id="err_card_no" style="color:red;"></span>

                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="contact-form-style mb-20">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input class="form-control" id="expiry_date" name="expiry_date"  type="text"   placeholder="MM / YY" 
       maxlength='5'>
                                        <span id="err_expiry_date" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-form-style mb-20">
                                        <label for="cvv_no" class="form-label">CVV</label>
                                        <input class="form-control" id="cvv_no" name="cvv_no" placeholder="Enter CVV No*" type="text">
                                        <span id="err_cvv_no" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form-style mt-20 text-center">
                                        <button class="btn theme-btn " type="button" name="btn_add_card" id="btn_add_card" onclick="javascript:return addCardValidate();"><span>Add Card</span></button>
                                    </div>
                                </div>                           
                            </div>
                        </form>
                      </div>
                    </div>
                                                       
                </div>               
            </div>                               
          
        </div>
    </section>  