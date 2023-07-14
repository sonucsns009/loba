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
                  <input type="hidden" name="booking_time" id="booking_time">

                  <input type="hidden" name="booking_id" id="booking_id" value="<?php if (isset($bookingData)) {
                                                                                                        echo $bookingData['booking_id'];
                                                                                                    } ?>">

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
                  <div class="col-md-6" style="padding: 5px;">

                    <div class="row">
                      <div class="col-sm-6">
                        <label for="SelectGender" class="form-label">Pickup Location<br><small>Save Places (Tap to select)</small></label>

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
                  <div class="col-md-6" style="padding: 5px;">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="SelectGender" class="form-label">Drop Location<br><small>Save Places (Tap to select)</small></label>

                      </div>
                      <div class="col-sm-6">

                      </div>
                    </div><br />
                    <div class="row" style="height: 200px;border: 1px solid #ced4da;border-radius: 5px;overflow-y: scroll;">
                      <div class="col-sm-12" style="text-align: center;padding:5px;">
                        <h5>Select Drop Address</h5>
                      </div>
                      <div class="col-sm-12">
                        <table class="table table-hover">
                          <thead>
                            <tr style="width: 100%;">
                              <td style="width: 20%;">Type</td>
                              <td style="width: 80%;" colspan="2">Address</td>
                            </tr>
                          </thead>
                          <tbody id="tbl_drop_addresses">
                            <?php foreach ($userAddresses as $row) {
                              $cnt++;
                            ?>
                              <tr style="width: 100%;" onclick="getSelectDropAddress(<?php echo $row['address_id']; ?>)">
                                <td style="width: 20%;"><?php echo $row['address_type']; ?></td>
                                <td style="width: 60%;"><?php echo $row['address1'] . ' ' . $row['address2']; ?></td>
                                <td style="width: 20%;">
                                  <?php if ($row['is_selected_drop'] == 1) { ?>
                                    <i style="margin-top: 5px;font-size: 20px;color:green;" class="fa fa-check"></i>
                                  <?php } ?>

                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div><br />
                    <span style="color: red;;" id="err_drop_address_id"></span>

                  </div>
                <?php }

                ?>
                <div class="row">

                  <div class="col-md-6">
                    <div class="contact-form-style mb-20">
                      <label for="date" class="form-label">Select a Date</label>
                      <input class="form-control" type="date" id="booking_date" name="booking_date" onchange="getChangeDate()">
                      <span style="color: red;;" id="err_booking_date"></span>

                    </div>
                  </div>
                  <div class="col-md-12" id="div_time_slot">

                  
                  </div>
                  <!-- <span style="color: red;;" id="err_booking_time"></span> -->

                  <div class="col-md-6">
                    <div class="contact-form-style mb-20">
                      <label for="NoofHours" class="form-label">No of Hours</label>
                      <select class="form-select" id="NoofHours" name="NoofHours" aria-label="Default select example">
                        <option selected value="">Select No of Hours</option>
                        <option value="1">1 Hours</option>
                        <option value="2">2 Hours</option>
                        <option value="3">3 Hours</option>
                        <option value="4">4 Hours</option>
                      </select>
                      <span style="color: red;;" id="err_NoofHours"></span>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contact-form-style mb-20">
                      <label for="MobilityAid" class="form-label">Select Mobility Aid</label>
                      <select class="form-select" aria-label="Default select example" id="MobilityAid" name="MobilityAid">
                        <option selected value="">Select Mobility Aid</option>
                        <option value="None">None</option>
                        <option value="Manual Wheelchair">Manual Wheelchair</option>
                        <option value="Auto Wheelchair">Auto Wheelchair</option>
                        <option value="Walking frame">Walking frame</option>
                      </select>
                      <span style="color: red;;" id="err_MobilityAid"></span>

                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button class="btn theme-btn mb-20 " onclick="addBooking()">Continue to Booking </button>
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
          <!-- <div class="col-lg-4 "> 
                  <div class="basic-details">                          
                    <div class="row">                                
                      <div class="col-md-12">
                        <h3>Wheelchair Friendly Ride Hailing</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="addroot pt-20 mb-20">
                            <div class="pickup_location">
                                <div class="locationdetails">
                                    <h5>Pickup Location</h5>
                                    <p>Jordan, Hong Kong</p>
                                </div>
                                <div class="editlocation">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="drop_location">
                                <div class="locationdetails">
                                    <h5>Drop Location</h5>
                                    <p>Hong Kong, 逸東酒店, 380 Nathan Road, Jordan</p>
                                </div>
                                <div class="editlocation">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="cart-dtl">
                            <p>Date <span>12/04/2023</span></p>
                            <p>Time Slot <span>08:00 am</span></p>
                            <p>No of hours <span>2 Hrs</span></p>
                            <p>Mobility Requirements <span>Manual Wheelchair</span></p>
                            <p>Amount <span>HK$560</span></p>                            
                        </div>                        
                      </div>
                      <div class="col-md-12">
                        <div class="contact-form-style mt-20 text-center">
                            <button class="btn theme-btn " type="submit"><span>Continue to Booking</span></button>
                        </div>
                      </div>
                    </div>
                  </div>                       
                </div> -->
        </div>
      </div>
    </form>

  </div>
</section>