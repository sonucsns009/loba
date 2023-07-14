<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mt-5">
            <!-- /col -->
            <div class="col-lg-12">
                <div class="title-heading text-center text-md-center">
                    <h3>Check Out</h3>
                    <p class="text-muted text-center text-md-center mt-2 mb-0">Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>
                    <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="cart.html">Service Booking</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check Out </li>
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
        <form id="sign-up-form" action="payment.html" method="post">
            <div class="form-container ">
                <div class="row g-0">

                    <div class="col-lg-8">
                        <div class="Other-details">
                            <!-- row -->
                            <div class="row">
                                <!-- col -->
                                <div class="col-md-12">
                                    <h3>Fill out your details</h3>
                                </div>
                                <?php if ($userData['full_name'] == "") { ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-primary mb-20" role="alert"> Already have an account? <a href="login.html" class="alert-link">Login</a> for faster booking.
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input class="form-control" name="fullName" id="FullName" placeholder="Full Name*" type="text">
                                        <span id="err_full_name" style="color:red;"></span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="EmailAddress" class="form-label">Email Address</label>
                                        <input class="form-control" id="emailAddress" name="emailAddress" placeholder="Email Address*" type="email">
                                        <span id="err_emailAddress" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form-style mb-20">
                                        <label for="MobileNo" class="form-label">Mobile No</label>
                                        <input class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile No*" type="text">
                                        <span id="err_mobileNo" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="Street" class="form-label">Apt. / Floor No. / Street</label>
                                        <input class="form-control" name="Street" id="Street" placeholder="Apt. / Floor No. / Street*" type="text">
                                        <span id="err_mobileNo" style="color:red;"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="zip" class="form-label">Postcode / zip code</label>
                                        <input class="form-control" id="zip" name="subject" placeholder="Postcode / zip code*" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="City" class="form-label">City</label>
                                        <input class="form-control" name="City" id="City" placeholder="City*" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="State" class="form-label">State</label>
                                        <input class="form-control" id="State" name="State" placeholder="State*" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="Gender" class="form-label">Gender</label>
                                        <select class="form-select" id="Gender" aria-label="Default select example">
                                            <option selected>Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <label for="MobilityAid" class="form-label">Select Weight</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select Weight</option>
                                            <option value="1">50 t0 80 kg</option>
                                            <option value="2">80 to 100 kg</option>
                                            <option value="3">100+ kg</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- row -->
                        </div>
                    </div>
        </form>

        <div class="col-lg-4 ">
            <div class="basic-details">
                <!-- row -->
                <form name="order-form" id="order-form" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
                            <h3><?php if ($categoryInfo['service_id'] > 0) {
                                    echo $categoryInfo['service_name'];
                                } ?></h3>
                        </div>
                        <div class="col-md-12">
                            <div class="addroot pt-20 mb-20">
                                <div class="pickup_location">
                                    <div class="locationdetails">
                                        <h5>Pickup Location</h5>
                                        <p><?php if ($pickupaddress['address_id'] > 0) {
                                                echo $pickupaddress['address1'];
                                            } ?></p>
                                    </div>
                                    <div class="editlocation">
                                        <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
                                    </div>
                                </div>
                                <div class="drop_location">
                                    <div class="locationdetails">
                                        <h5>Drop Location</h5>
                                        <p><?php if ($dropaddress['address_id'] > 0) {
                                                echo $dropaddress['address1'];
                                            } ?></p>
                                    </div>
                                    <div class="editlocation">
                                        <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-dtl">
                                <p>Date <span><?php if ($bookingData['booking_id'] > 0) {
                                                    echo date('d M Y', strtotime($bookingData['booking_date']));
                                                } ?></span></p>
                                <p>Time Slot <span><?php if ($bookingData['booking_id'] > 0) {
                                                        echo $bookingData['time_slot'];
                                                    } ?></span></p>
                                <p>No of hours <span><?php if ($bookingData['booking_id'] > 0) {
                                                            echo $bookingData['no_of_hourse'] . ' hrs';
                                                        } ?></span></p>
                                <p>Mobility Requirements <span><?php if ($bookingData['booking_id'] > 0) {
                                                                    echo $bookingData['select_mobility_aid'];
                                                                } ?></span></p>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="addpromo">
                                <p><strong>Add a promo code</strong></p>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="promo_code" name="promo_code">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="getAddPromocode()">Add</button>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="cart-dtl">
                                <p>Total Amount <span>HK<?php if ($categoryInfo['service_id'] > 0) {
                                                            echo $categoryInfo['amount'];
                                                        } ?></span></p>
                                <p>Discount <span><?php if (isset($promoCode)){ echo $promoCode['promocode_discount'];} ?></span></p>
                                <?php
                                $discount = 0;
                                $finalamt = $categoryInfo['amount'] - $discount;
                                ?>
                                <p>Pay Amount <span>HK<?php echo $finalamt; ?></span></p>
                                <input type="hidden" name="category_amount" id="category_amount" value="<?php echo $categoryInfo['amount']; ?>" />
                                <input type="hidden" name="final_amount" id="final_amount" value="<?php echo $finalamt; ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-form-style mt-20 text-center">
                                <button class="btn theme-btn " type="submit" name="btn_pay_now" id="btn_pay_now"><span>Pay Now</span></button>
                            </div>
                        </div>





                        <!-- /col -->
                    </div>
                </form>
                <!-- row -->
            </div>
        </div>
    </div>
    </div>

    </div>
</section>