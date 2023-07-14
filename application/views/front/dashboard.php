<section class="bg-half-170 d-table w-100 bg-blue-light" style="background: url('images/bg/page.png') bottom center;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mt-5">
                <!-- /col -->
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-center">
                        <h3><?php if(isset($title)){ echo $title;}?></h3>  
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
                <div class="col-lg-3"> 
                    <?php $this->load->view('front/sidebar_left');?>                                
                            
                </div> 
                <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header">
                       <h4 class="card-title">My Orders </h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <a href="Accepted-Order.html" class="orders-wraper bg-blue">Accepting Order (4)</a>
                            </div>
                            <div class="col-md-6  col-lg-4">
                                <a href="Booked-Order.html" class="orders-wraper bg-violet">Booked Order (4)</a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="Ongoing-Order.html" class="orders-wraper bg-orange">Ongoing Order (4)</a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="Completed-Order.html" class="orders-wraper bg-green">Completed Order (4)</a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="Canceled-Order.html" class="orders-wraper bg-red">Canceled Order (4)</a>
                            </div>
                            
                        </div>
                      </div>
                    </div>
                    <div class="card mt-30">
                      <div class="card-header">
                       <h4 class="card-title">Current Order</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="orders-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="selected-service">                                    
                                                <div class="service-detail">
                                                   <div class="service-icon">
                                                        <img src="images/services/service-1.png" class="img-fluid">
                                                   </div>
                                                   <div class="service-title">
                                                        <h5>Wheelchair Friendly Ride Hailing</h5>
                                                   </div>
                                                </div>
                                                <div class="order-price-status">
                                                    <p class="status bg-blue">Waiting</p>
                                                    <p class="price">HK$350</p> 
                                                </div>                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="booking-details">                                    
                                                <div class="Order-id">
                                                    
                                                    <p>Order Id : <span>LOBA12345678</span></p>
                                                </div>
                                                <div class="Order-date">
                                                    
                                                    <p>Order Date : <span>May 31, 2023</span></p>
                                                </div>                         
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="location-container">
                                                 <div class="row">
                                                    <div class="col-lg-6">                                               
                                                        <div class="pickup_location">
                                                            <div class="locationdetails">
                                                                <h5>Pickup Location</h5>
                                                                <p>Jordan, Hong Kong</p>
                                                            </div>                                                        
                                                        </div>                                               
                                                    </div>
                                                    <div class="col-lg-6">                                                
                                                        <div class="drop_location">
                                                            <div class="locationdetails">
                                                                <h5>Drop Location</h5>
                                                                <p>Hong Kong, 逸東酒店, 380 Nathan Road, Jordan</p>
                                                            </div>                                                        
                                                        </div>                                               
                                                    </div>                                                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="btn theme-btn-1">Cancel Order</a>
                                            <a href="Order_details.html" class="btn theme-btn-1 pull-right">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="orders-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="selected-service">                                    
                                                <div class="service-detail">
                                                   <div class="service-icon">
                                                        <img src="images/services/service-1.png" class="img-fluid">
                                                   </div>
                                                   <div class="service-title">
                                                        <h5>Wheelchair Friendly Ride Hailing</h5>
                                                   </div>
                                                </div>
                                                <div class="order-price-status">
                                                    <p class="status bg-blue">Waiting</p>
                                                    <p class="price">HK$350</p> 
                                                </div>                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="booking-details">                                    
                                                <div class="Order-id">
                                                    
                                                    <p>Order Id : <span>LOBA12345678</span></p>
                                                </div>
                                                <div class="Order-date">
                                                    
                                                    <p>Order Date : <span>May 31, 2023</span></p>
                                                </div>                         
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="location-container">
                                                 <div class="row">
                                                    <div class="col-lg-6">                                               
                                                        <div class="pickup_location">
                                                            <div class="locationdetails">
                                                                <h5>Pickup Location</h5>
                                                                <p>Jordan, Hong Kong</p>
                                                            </div>                                                        
                                                        </div>                                               
                                                    </div>
                                                    <div class="col-lg-6">                                                
                                                        <div class="drop_location">
                                                            <div class="locationdetails">
                                                                <h5>Drop Location</h5>
                                                                <p>Hong Kong, 逸東酒店, 380 Nathan Road, Jordan</p>
                                                            </div>                                                        
                                                        </div>                                               
                                                    </div>                                                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="btn theme-btn-1">Cancel Order</a>
                                            <a href="Order_details.html" class="btn theme-btn-1 pull-right">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="orders-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="selected-service">                                    
                                                <div class="service-detail">
                                                   <div class="service-icon">
                                                        <img src="images/services/service-1.png" class="img-fluid">
                                                   </div>
                                                   <div class="service-title">
                                                        <h5>Wheelchair Friendly Ride Hailing</h5>
                                                   </div>
                                                </div>
                                                <div class="order-price-status">
                                                    <p class="status bg-blue">Waiting</p>
                                                    <p class="price">HK$350</p> 
                                                </div>                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="booking-details">                                    
                                                <div class="Order-id">
                                                    
                                                    <p>Order Id : <span>LOBA12345678</span></p>
                                                </div>
                                                <div class="Order-date">
                                                    
                                                    <p>Order Date : <span>May 31, 2023</span></p>
                                                </div>                         
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="location-container">
                                                 <div class="row">
                                                    <div class="col-lg-6">                                               
                                                        <div class="pickup_location">
                                                            <div class="locationdetails">
                                                                <h5>Pickup Location</h5>
                                                                <p>Jordan, Hong Kong</p>
                                                            </div>                                                        
                                                        </div>                                               
                                                    </div>
                                                    <div class="col-lg-6">                                                
                                                        <div class="drop_location">
                                                            <div class="locationdetails">
                                                                <h5>Drop Location</h5>
                                                                <p>Hong Kong, 逸東酒店, 380 Nathan Road, Jordan</p>
                                                            </div>                                                        
                                                        </div>                                               
                                                    </div>                                                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="btn theme-btn-1">Cancel Order</a>
                                            <a href="Order_details.html" class="btn theme-btn-1 pull-right">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                      </div>
                    </div>                                     
                </div>               
            </div>                               
          
        </div>
    </section>  