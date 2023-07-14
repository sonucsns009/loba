<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mt-5">
            <!-- /col -->
            <div class="col-lg-12">
                <div class="title-heading text-center text-md-center">
                    <h3>Service Booking</h3>
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
                        <div class="Other-details">
                            <div class="row">
                                    <!-- col -->
                                    <div class="col-md-8">
                                    <h3>Service Details</h3>
                                    <input type="hidden" name="pickup_address_id" id="pickup_address_id" value="<?php if (isset($selectedAddress)) {
                                                                                                                    echo $selectedAddress['address_id'];
                                                                                                                } ?>">
                                    <input type="hidden" name="drop_address_id" id="drop_address_id" value="<?php if (isset($selectedDropAddress)) {
                                                                                                                echo $selectedDropAddress['address_id'];
                                                                                                            } ?>">
                                    <input type="hidden" name="category_id" id="category_id" value="<?php if (isset($category_id)) {
                                                                                                        echo $category_id;
                                                                                                    } ?>">
                                    <input type="hidden" name="doctor_id" id="doctor_id" value="<?php if (isset($doctorList)) {
                                                                                                        echo $doctorList['doctor_id'];
                                                                                                    } ?>">
                                    <input type="hidden" name="booking_time" id="booking_time">


                                    </div>
                                    <div class="col-md-2">
                                    <button class="btn theme-btn mb-20 " onclick="showAddressList()">Select Address </button>
                                    <!-- <a class="btn theme-btn mb-20 " href="#" onclick="showAddressList()"><span>Select Address</span></a> -->
                                    </div>
                                    <div class="col-md-2">
                                    <button class="btn theme-btn mb-20 " onclick="showAddContent()">Add Address </button>
                                    <!-- <a class="btn theme-btn mb-20 " href="#" onclick="showAddContent()"><span>Add Address</span></a> -->
                                    </div>
                                </div>
                                <!-- row -->
                            <!-- row -->
                            <div class="row" id="div_address_list">
                                <!-- col -->
                                <!-- <div class="col-md-6">
                        <h3>Service Details</h3>
                        <input type="hidden" name="pickup_address_id" id="pickup_address_id" value="<?php if (isset($selectedAddress)) {
                                                                                                        echo $selectedAddress['address_id'];
                                                                                                    } ?>">
                        <input type="hidden" name="drop_address_id" id="drop_address_id" value="<?php if (isset($selectedDropAddress)) {
                                                                                                    echo $selectedDropAddress['address_id'];
                                                                                                } ?>">
                        
                        

                      </div>
                      <div class="col-md-3">
                        <a class="btn theme-btn mb-20 " href="#" onclick="showAddressList()"><span>Select Address</span></a>
                      </div>
                      <div class="col-md-3">
                        <a class="btn theme-btn mb-20 " href="#" onclick="showAddContent()"><span>Add Address</span></a>
                      </div> -->
                                <?php if (count($userAddresses) > 0) {
                                    $cnt = 0;
                                ?>
                                    <div class="col-md-12" style="padding: 5px;">

                                        <div class="row">
                                            <div class="col-sm-6">
                                            <label for="SelectGender" class="form-label">Patient Location<br><small>Save Places (Tap to select)</small></label>
                                            </div>
                                            <div class="col-sm-6">

                                            </div>
                                        </div><br />
                                        <div class="row" style="height: 200px;border: 1px solid #ced4da;border-radius: 5px;overflow-y: scroll;">
                                            <div class="col-sm-12" style="text-align: center;padding:5px;">
                                                <h5>Select Pickup Address</h5>
                                            </div>
                                            <div class="col-sm-12">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr style="width: 100%;">
                                                            <td style="width: 20%;">Type</td>
                                                            <td style="width: 80%;" colspan="2">Address</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_addresses">
                                                        <?php foreach ($userAddresses as $row) {
                                                            $cnt++;
                                                        ?>
                                                            <tr style="width: 100%;" onclick="getSelectAddress(<?php echo $row['address_id']; ?>)">
                                                                <td style="width: 20%;"><?php echo $row['address_type']; ?></td>
                                                                <td style="width: 60%;"><?php echo $row['address1'] . ' ' . $row['address2']; ?></td>
                                                                <td style="width: 20%;">
                                                                    <?php if ($row['is_seleted'] == 1) { ?>
                                                                        <i style="margin-top: 5px;font-size: 20px;color:green;" class="fa fa-check"></i>
                                                                    <?php } ?>

                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br />
                                        <span style="color: red;;" id="err_pickup_address_id"></span>

                                    </div>
                                   
                                <?php }

                                ?>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="contact-form-style mb-20">
                                            <label for="date" class="form-label">Select a Date</label>
                                            <input class="form-control" type="date" id="booking_date" name="booking_date" onchange="getChangeDate()">
                                            <span style="color: red;;" id="err_booking_date"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-12" id="div_time_slot">


                                    </div>
                                    <!-- <span style="color: red;;" id="err_booking_time"></span> -->

                                    
                                    <div class="col-md-12 text-center">
                                        <button class="btn theme-btn mb-20 " onclick="addDoctorBooking()">Continue to Booking </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="div_add_address" style="<?php if (count($userAddresses) > 0) {
                                                                                echo 'display:none;';
                                                                            } ?>">

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="SelectGender" class="form-label">Add New Location<br><small>Save Places (Tap to select)</small></label>
                                            <div class="contact-form-style mb-20">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Home" onclick="getAddAddress()">
                                                    <label class="form-check-label" for="inlineRadio1"><i class="uil-location-point"></i> Home</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Work" onclick="getAddAddress()">
                                                    <label class="form-check-label" for="inlineRadio2"><i class="uil-location-point"></i> Work</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Other" onclick="getAddAddress()">
                                                    <label class="form-check-label" for="inlineRadio3"><i class="uil-location-point"></i> Other</label>
                                                </div>
                                                <span style="color: red;;" id="err_address_type"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="contact-form-style mb-20">
                                                <input type="hidden" name="pickup_longitude" id="pickup_longitude" value="">

                                                <input type="hidden" name="pickup_latitude" id="pickup_latitude" value="">
                                                <label for="AddpickupAddress" class="form-label">Add Address</label>
                                                <input class="form-control" id="pickup_location" name="pickup_location" placeholder="Add Address" type="text" required onFocus="geolocate()" style="width: 100%;">
                                                <span style="color: red;;" id="err_address"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="AddpickupAddress" class="form-label"> </label><br />
                                            <button class="btn theme-btn mb-20 " onclick="getAddAddress()" style="margin-top: 5px;">Save Address </button>

                                            <!-- <a class="btn theme-btn mb-20" href="#" onclick="getAddAddress()"><span>Save Address</span></a> -->

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- row -->
                        </div>
                    </div>
                   
                </div>
            </div>
        </form>

    </div>
</section>