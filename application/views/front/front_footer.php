<footer class="footer bg-gray-700">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row mb-60">
                <!-- col -->
                <div class="col-lg-4">
                    
                    <h3 class="footer-desc f-15">Please feel free to get in touch with us
                        voluptatibus.</h3>
                    
                </div>
                <!-- /col -->
                <!-- /col -->
                <div class="col-lg-7 offset-lg-1">
                    <!-- row -->
                    <div class="row mt-lg-0">
                        <!-- col -->
                        <div class="col-md-6 mt-4 mt-lg-0">
                            <h4 class="footer-list-title f-18 font-weight-normal mb-3">Our Location</h4>
                            <ul class="list-unstyled company-sub-menu">
                                <li><a href="#">401 Broadway, 24th Floor, Orchard Cloud View, London</a></li>                                
                            </ul>                           
                        </div>
                        <!-- col -->
                        <!-- /col -->
                        <div class="col-md-6 mt-4 mt-lg-0">
                            <h4 class="footer-list-title f-18 font-weight-normal mb-3">How can we help?</h4>
                            <ul class="list-unstyled company-sub-menu">
                                <li><a class="btn-link" href="mailto:info@loba.com"> info@loba.com</a></li>
                                <li><a class="btn-link" href="mailto:contact@loba.com"> contact@loba.com</a></li>
                            </ul>
                            
                        </div>
                        <!-- col -->
                        
                    </div>
                    <!-- /row -->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <!-- row -->
            <div class="row border-top pt-20 pb-20">
                <!-- /col -->
                <div class="col-lg-4 mt-3">
                    <div class="text-left footer-alt my-3">                        
                        <a href="index.html"><img src="<?php echo base_url();?>template/front/images/logo-light.png" alt="" class="logo-light" height="30"></a>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="text-center footer-alt my-3">
                        <p class="f-15">© Copyrights 2023 LOBA all rights reserved.</p>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-4 mt-3">
                    <div class="text-right footer-alt">
                      <ul class="footer-icons list-inline f-20 mb-0">
                        <li class="list-inline-item mr-3"><a href="#" class=""><i class="uil uil-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item mr-3"><a href="#" class=""><i class="uil uil-twitter"></i></a></li>
                        <li class="list-inline-item mr-3"><a href="#" class=""><i class="uil uil-instagram-alt"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class=""><i class="uil uil-youtube"></i></a></li>
                      </ul>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </footer>
   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

    <script src=" https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js "></script>

    <script src="<?php echo base_url();?>template/front/Plugin/owel/owl.carousel.min.js"></script>
     <!-- Main Js -->
     <script src="<?php echo base_url();?>template/front/js/main.js"></script>
     <script src="<?php echo base_url();?>template/front/js/front_validation.js"></script>
     <script type="text/javascript">
        function setBookingTime(cnt)
        {
            var Timeslot1=$("#Timeslot1"+cnt).val();
            //alert(Timeslot1);
            $("#booking_time").val(Timeslot1);
        }
        
        function getChangeDate()
        {
            
           var booking_date=$("#booking_date").val();
           
              $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/getTimeSlot",
                     data:{
                        booking_date:booking_date
                       }              
                    }).done(function(message){
                    
                   
                            $('#div_time_slot').empty();
                             $('#div_time_slot').append(message);
                            
                     });

        } 

        function getSelectAddress(id)
        {
            
           
              $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/getSelectAddress",
                     data:{
                        id:id
                       }              
                    }).done(function(message){
                    
                   
                             $('#tbl_addresses').empty();
                             $('#tbl_addresses').append(message);
                             $('#pickup_address_id').val(id);
                            // location.reload();
                             
                     });

        } 
        function getSelectDropAddress(id)
        {
            
           
              $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/getSelectDropAddress",
                     data:{
                        id:id
                       }              
                    }).done(function(message){
                    
                   
                            $('#tbl_drop_addresses').empty();
                             $('#tbl_drop_addresses').append(message);
                             $('#drop_address_id').val(id);
                             

                             
                     });

        } 
        function getAddAddress()
        {
            
           var type= $('input[name="inlineRadioOptions"]:checked').val();
           var address= $('#pickup_location').val();
           var pickup_latitude= $('#pickup_latitude').val();
           var pickup_longitude= $('#pickup_longitude').val();
           var flag=1;
            if(type=="")
            {   
                $("#err_address_type").html('Please select address type.');
                flag=0;
            }

            if(address=="")
            {   
                $("#err_address").html('Please select address.');
                flag=0;
            }

            if(flag==1)
            {
                $("#err_address_type").html('');
                $("#err_address").html('');

                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/getAddAddress",
                     data:{
                        type:type,
                        address:address,
                        pickup_latitude:pickup_latitude,
                        pickup_longitude:pickup_longitude
                       }              
                    }).done(function(message){
                    
                   
                            $('#div_add_address').hide();
                            location.reload();
                            
                             
                     });
            }
             

        } 
        function showAddressList()
        {
            $('#div_address_list').show(); 
            $('#div_add_address').hide();
        }
        function showAddContent()
        {
            $('#div_address_list').hide(); 
            $('#div_add_address').show();
        }

        function addBooking()
        {
            
           var pickup_address_id= $('#pickup_address_id').val();
           var drop_address_id= $('#drop_address_id').val();
           var category_id= $('#category_id').val();
           var booking_time= $('#booking_time').val();
           var booking_date= $('#booking_date').val();
           var NoofHours= $('#NoofHours').val();
           var MobilityAid= $('#MobilityAid').val();
           var booking_id= $('#booking_id').val();
           var flag=1;
            if(pickup_address_id=="")
            {   
                $("#err_pickup_address_id").html('Please select pickup address .');
                flag=0;
            }
            else
            {
                $("#err_pickup_address_id").html('');
                flag=1;
            }
            if(drop_address_id=="")
            {   
                $("#err_drop_address_id").html('Please select drop address .');
                flag=0;
            }
            else
            {
                $("#err_drop_address_id").html('');
                flag=1;
            }
            // if(category_id=="")
            // {   
            //     $("#err_category_id").html('Please select pickup address .');
            //     flag=0;
            // }
            // if(booking_time=="")
            // {   
            //     $("#err_booking_time").html('Please select booking time .');
            //     flag=0;
            // }
            if(booking_date=="")
            {   
                $("#err_booking_date").html('Please select booking date and booking time .');
                flag=0;
            }
            else
            {
                $("#err_booking_date").html('');
                flag=1;
            }
            if(NoofHours=="")
            {   
                $("#err_NoofHours").html('Please select no of hourse .');
                flag=0;
            }
            else
            {
                $("#err_NoofHours").html('');
                flag=1;
            }
            if(MobilityAid=="")
            {   
                $("#err_MobilityAid").html('Please select mobility aid .');
                flag=0;
            }
            else
            {
                $("#err_MobilityAid").html('');
                flag=1;
            }
            if(flag==1)
            {
                $("#err_pickup_address_id").html('');
                $("#err_drop_address_id").html('');
                $("#err_category_id").html('');
                $("#err_booking_time").html('');
                $("#err_booking_date").html('');
                $("#err_NoofHours").html('');
                $("#err_MobilityAid").html('');

                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/addBooking",
                     data:{
                        pickup_address_id:pickup_address_id,
                        drop_address_id:drop_address_id,
                        category_id:category_id,
                        booking_time:booking_time,
                        booking_date:booking_date,
                        NoofHours:NoofHours,
                        MobilityAid:MobilityAid,
                        booking_id:booking_id
                       }              
                    }).done(function(message){
                    
                   
                           // $('#div_add_address').hide();
                           // location.reload();
                         //  window.location.href = "<?php echo site_url("Home/placeOrder")?>"; 
                           window.location.href = "<?php echo site_url("Home/bookingDetails")?>"; 
                             
                     });
            }
             

        } 
        function addDoctorBooking()
        {
            
           var pickup_address_id= $('#pickup_address_id').val();
           var drop_address_id= $('#drop_address_id').val();
           var category_id= $('#category_id').val();
           var booking_time= $('#booking_time').val();
           var booking_date= $('#booking_date').val();
          
           var doctor_id= $('#doctor_id').val();
           var flag=1;
            if(pickup_address_id=="")
            {   
                $("#err_pickup_address_id").html('Please select pickup address .');
                flag=0;
            }
            else
            {
                $("#err_pickup_address_id").html('');
                flag=1;
            }
            if(drop_address_id=="")
            {   
                $("#err_drop_address_id").html('Please select drop address .');
                flag=0;
            }
            else
            {
                $("#err_drop_address_id").html('');
                flag=1;
            }
            // if(category_id=="")
            // {   
            //     $("#err_category_id").html('Please select pickup address .');
            //     flag=0;
            // }
            // if(booking_time=="")
            // {   
            //     $("#err_booking_time").html('Please select booking time .');
            //     flag=0;
            // }
            if(booking_date=="")
            {   
                $("#err_booking_date").html('Please select booking date and booking time .');
                flag=0;
            }
            else
            {
                $("#err_booking_date").html('');
                flag=1;
            }
            
            if(flag==1)
            {
                $("#err_pickup_address_id").html('');
                $("#err_drop_address_id").html('');
                $("#err_category_id").html('');
                $("#err_booking_time").html('');
                $("#err_booking_date").html('');
               
               // alert(doctor_id);
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Doctor/addDoctorBooking",
                     data:{
                        pickup_address_id:pickup_address_id,
                        drop_address_id:drop_address_id,
                        category_id:category_id,
                        booking_time:booking_time,
                        booking_date:booking_date,
                       
                        doctor_id:doctor_id
                       }              
                    }).done(function(message){
                    
                   
                           // $('#div_add_address').hide();
                           // location.reload();
                         //  window.location.href = "<?php echo site_url("Home/placeOrder")?>"; 
                           window.location.href = "<?php echo site_url("Doctor/doctorBookingDetails")?>"; 
                             
                     });
            }
             

        } 
        function addNurseBooking()
        {
            
           var pickup_address_id= $('#pickup_address_id').val();
           var drop_address_id= $('#drop_address_id').val();
           var category_id= $('#category_id').val();
           var booking_time= $('#booking_time').val();
           var booking_date= $('#booking_date').val();
           var NoofHours= $('#NoofHours').val();

           var nurse_id= $('#nurse_id').val();
           var booking_id= $('#booking_id').val();
           var flag=1;
            if(pickup_address_id=="")
            {   
                $("#err_pickup_address_id").html('Please select pickup address .');
                flag=0;
            }
            else
            {
                $("#err_pickup_address_id").html('');
                flag=1;
            }
            if(drop_address_id=="")
            {   
                $("#err_drop_address_id").html('Please select drop address .');
                flag=0;
            }
            else
            {
                $("#err_drop_address_id").html('');
                flag=1;
            }
           
            if(booking_date=="")
            {   
                $("#err_booking_date").html('Please select booking date and booking time .');
                flag=0;
            }
            else
            {
                $("#err_booking_date").html('');
                flag=1;
            }
            
            if(NoofHours=="")
            {   
                $("#err_NoofHours").html('Please select no of hourse .');
                flag=0;
            }
            else
            {
                $("#err_NoofHours").html('');
                flag=1;
            }

            if(flag==1)
            {
                $("#err_pickup_address_id").html('');
                $("#err_drop_address_id").html('');
                $("#err_category_id").html('');
                $("#err_booking_time").html('');
                $("#err_booking_date").html('');
                $("#err_NoofHours").html('');
               
               // alert(doctor_id);
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Doctor/addNurseBooking",
                     data:{
                        pickup_address_id:pickup_address_id,
                        drop_address_id:drop_address_id,
                        category_id:category_id,
                        booking_time:booking_time,
                        booking_date:booking_date,
                        NoofHours:NoofHours,
                        nurse_id:nurse_id,
                        booking_id:booking_id
                       }              
                    }).done(function(message){
                    
                   
                           // $('#div_add_address').hide();
                           // location.reload();
                         //  window.location.href = "<?php // echo site_url("Home/placeOrder")?>"; 
                           window.location.href = "<?php echo site_url("Doctor/nurseBookingDetails")?>"; 
                             
                     });
            }
             

        } 
        function getAddPromocode()
        {
            
           var promo_code=$("#promo_code").val();
           
              $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/addPromoCode",
                     data:{
                        promo_code:promo_code
                       }              
                    }).done(function(message){
                    
                   
                        window.location.href = "<?php echo site_url("Home/placeOrder")?>"; 
                            
                     });

        } 

//code for select card
function getCardSelect(id)
{
    
    
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>Home/addCardSelect",
                data:{
                card_id:id
                }              
            }).done(function(message){
            
                //location.reload();
                window.location.href = "<?php echo site_url("Home/placeBooking")?>"; 
                    
                });

} 
 // code for add card
 function addCardValidate(){
	var card_type=$("#card_type").val();
	var lng="English";//$("#lng").val();
	var card_name=$("#card_name").val();
	var card_no=$("#card_no").val();
	var expiry_date=$("#expiry_date").val();
	var cvv_no=$("#cvv_no").val();
	
	var flag=1;
	$("#err_card_type").html('');
	$("#err_card_name").html('');
	$("#err_card_no").html('');
	$("#err_expiry_date").html('');
	$("#err_cvv_no").html('');
	
	if(card_type=="")
	{
		if(lng=="English")
		{
			$("#err_card_type").html('Select Payment Type.');
		}
		else
		{
			$("#err_card_type").html('Ingrese el nombre completo.');
		}
		flag=0;
	}
	if(card_name=="")
	{
		if(lng=="English")
		{
				$("#err_card_name").html('Enter Card Holder Name.');
		}
		else
		{
			$("#err_card_name").html('Introducir la dirección de correo electrónico.');
		}
		flag=0;
	}
	
	if(card_no=="")
	{
		if(lng=="English")
		{


				$("#err_card_no").html("Enter Card No.");
		}
		else
		{
			$("#err_card_no").html("Introduzca el número de teléfono.");
		}
		flag=0;
	}
    else if(card_no.length!=16)
    {
        if(lng=="English")
		{
				$("#err_card_no").html("Invalid Card.");
		}
		else
		{
			$("#err_card_no").html("Introduzca el número de teléfono.");
		}
		flag=0;
    }
	
	if(expiry_date=="")
	{
		if(lng=="English")
		{
				$("#err_expiry_date").html('Enter Expiry Date.');
		}
		else
		{
			$("#err_expiry_date").html('Seleccione el tipo de negocio.');
		}
		flag=0;
	}
	if(cvv_no=="")
	{
		if(lng=="English")
		{
				$("#err_cvv_no").html('Enter CVV No.');
		}
		else
		{
			$("#err_address").html('Ingresa la direccion.');
		}
		flag=0;
	}
	if(flag==1)
	{		
       

        $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Home/addCardSave",
                     data:{
                        card_type:card_type,
                        card_name:card_name,
                        card_no:card_no,
                        expiry_date:expiry_date,
                        cvv_no:cvv_no,
                       
                       }              
                    }).done(function(message){
                    
                           window.location.href = "<?php echo site_url("Home/cardList")?>"; 
                             
                     });


    }
	else
    {
		return false;
    }
}

function getDoctorSearchByName()
{
    var doctor_search=$("#doctor_search").val();

        $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Doctor/getDoctorSearchByName",
                     data:{
                        doctor_search:doctor_search,
                       
                       
                       }              
                    }).done(function(message){
                    
                        $('#div_doctor_list').empty();
                        $('#div_doctor_list').append(message);
                        
                     });
}

function geNurseSearchByName()
{
    var nurse_search=$("#nurse_search").val();

        $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>Doctor/geNurseSearchByName",
                     data:{
                                nurse_search:nurse_search,
                            }              
                    }).done(function(message){
                    
                        $('#div_nurse_list').empty();
                        $('#div_nurse_list').append(message);
                        
                     });
}
</script>
<!-- <script>
$(document).ready(function() {
    $('#add-card-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            expiry_date: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'The expiration date is required'
                    },
                    regexp: {
                        message: 'The expiration date must be YYYY/MM',
                        regexp: /^\d{4}\/\d{1,2}$/
                    },
                    callback: {
                        message: 'The expiration date is expired',
                        callback: function(value, validator, $field) {
                            var sections = value.split('/');
                            if (sections.length !== 2) {
                                return {
                                    valid: false,
                                    message: 'The expiration date is not valid'
                                };
                            }

                            var year         = parseInt(sections[0], 10),
                                month        = parseInt(sections[1], 10),
                                currentMonth = new Date().getMonth() + 1,
                                currentYear  = new Date().getFullYear();

                            if (month <= 0 || month > 12 || year > currentYear + 10) {
                                return {
                                    valid: false,
                                    message: 'The expiration date is not valid'
                                };
                            }

                            if (year < currentYear || (year == currentYear && month < currentMonth)) {
                                // The date is expired
                                return {
                                    valid: false,
                                    message: 'The expiration date is expired'
                                };
                            }

                            return true;
                        }
                    }
                }
            }
        }
    });
});
</script> -->
    <!-- /Main Js -->
    <script type="text/javascript">

    $(document).ready(function($) {

        $("#pickup_location_choice1").click(function() {

            $("#pickup_location_textfield_div").show();

            $("#pickup_location_dropdownp_div").hide();

            // $('#request_step1')[0].reset();

        });

        $("#pickup_location_choice2").click(function() {

            $("#pickup_location_dropdownp_div").show();

            $("#pickup_location_textfield_div").hide();

        });

        $("#destination_location_choice1").click(function() {

            $("#destination_location_textfield_div").show();

            $("#destination_location_dropdownp_div").hide();

            // $('#request_step1')[0].reset();



        });

        $("#destination_location_choice2").click(function() {

            $("#destination_location_dropdownp_div").show();

            $("#destination_location_textfield_div").hide();

        });



        $('#pickup_location_dropdownp').change(function() {

            var pickup_longitude = $(this).children('option:selected').data('long');

            var pickup_latitude = $(this).children('option:selected').data('lat');

            var address_1 = $(this).children('option:selected').data('address_1');

            document.getElementById('pickup_longitude').value = pickup_longitude;

            document.getElementById('pickup_latitude').value = pickup_latitude;

            $("#pickup_location").val(address_1);

            console.log(pickup_longitude);



        });

        $('#destination_location_dropdownp').change(function() {

            var destination_longitude = $(this).children('option:selected').data('long');

            var destination_latitude = $(this).children('option:selected').data('lat');

            var address_1 = $(this).children('option:selected').data('address_1');

            document.getElementById('destination_longitude').value = destination_longitude;

            document.getElementById('destination_latitude').value = destination_latitude;

            $("#destination_location").val(address_1);

            console.log(destination_longitude);

        });



        //

        //btnActive

        $("#err_div").hide();

        $("#success_div").hide();



        $(".formclass").removeClass("border-danger");



        $("#request_step1").submit(function(e) {

            $(".hideall").hide();
            
            $(".location_textfield").show();

            $(".formclass").removeClass("border-danger");

            $("#err_div").hide();

            $("#success_div").hide();





            var isError = false;

            var errMsg = "";

            var errMsg_alert = "";



            if ($('#pickup_location_choice1').is(':checked')) {







                if (!$("#pickup_location").val()) {

                    isError = true;

                    error_msg = "Please enter an pickup location";

                    $("#pickup_location").addClass("border-danger");



                    $(".pickup_location").show();



                }

            }

            if ($('#destination_location_choice1').is(':checked')) {

                if (!$("#destination_location").val()) {

                    isError = true;

                    error_msg = "Please enter an destination location";

                    $("#destination_location").addClass("border-danger");



                    $(".destination_location").show();



                }

            }

            //  alert(error_msg);



            if (!$("#pickup_date").val()) {

                    isError = true;

                    error_msg = "Please enter an Pickup Date";

                    $("#pickup_date").addClass("border-danger");



                    $(".pickup_date").show();



                }

                if (!$("#drop_destination_date").val()) {

                    isError = true;

                    error_msg = "Please enter an Delivery Date";

                    $("#drop_destination_date").addClass("border-danger");



                    $(".drop_destination_date").show();



                }   



            if (!isError) {

                //dataString = $("#regform").serialize();

                // alert(web_site_url);

                $("#err_div").html("");

                $("#err_div").hide();

                //$('#request_step1').submit();

                return true;



            } else {

                console.log("error_msg ", error_msg);

                //alert("11");

                //   $("#err_div").html(error_msg);

                //  $("#err_div").show();

            }

            return false;

        });









        $(".formclass").click(function() {

            $(this).removeClass("border-danger");

            var id = $(this).attr('id');

            $("." + id).hide();

        });

        $(".formclass").blur(function() {

            if (!$(this).val()) {

                var id = $(this).attr('id');

                $(this).addClass("border-danger");

                $("." + id).show();

            }





        });



    });

    </script>

    <script>

    //search location

    var pickup_location, destination_location;

    var componentForm = {

        street_number: 'short_name',

        route: 'long_name',

        locality: 'long_name',

        administrative_area_level_1: 'short_name',

        country: 'long_name',

        postal_code: 'short_name',

        postal_lat: 'lat',

        postal_lng: 'lng'

    };



    function initAutocomplete() {

        // Create the autocomplete object, restricting the search to geographical

        // location types.

        autocomplete = new google.maps.places.Autocomplete(

            /** @type {!HTMLInputElement} */

            (document.getElementById('pickup_location')), {

                types: ['geocode']

            });

        // When the user selects an address from the dropdown, populate the address

        // fields in the form.

        autocomplete.addListener('place_changed', fillInAddress);



        autocomplete2 = new google.maps.places.Autocomplete(

            /** @type {!HTMLInputElement} */

            (document.getElementById('destination_location')), {

                types: ['geocode']

            });

        // When the user selects an address from the dropdown, populate the address

        // fields in the form.

        autocomplete2.addListener('place_changed', fillInAddress2);





    }



    function fillInAddress() {

        // Get the place details from the autocomplete object.

        var place = autocomplete.getPlace();

        var latitude = place.geometry.location.lat();

        var longitude = place.geometry.location.lng();

        //alert(latitude)

        //alert(longitude)

        document.getElementById('pickup_longitude').value = longitude;

        document.getElementById('pickup_latitude').value =  latitude;

        calculateDistances();

    }



    function fillInAddress2() {

        // Get the place details from the autocomplete object.

        var place = autocomplete2.getPlace();

        var latitude = place.geometry.location.lat();

        var longitude = place.geometry.location.lng();

        //alert(latitude)

        //alert(longitude)

        document.getElementById('destination_longitude').value = longitude;

        document.getElementById('destination_latitude').value = latitude;



        calculateDistances();



    }



    function geolocate() {

        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position) {

                var geolocation = {

                    lat: position.coords.latitude,

                    lng: position.coords.longitude

                };

                var circle = new google.maps.Circle({

                    center: geolocation,

                    radius: position.coords.accuracy

                });

                autocomplete.setBounds(circle.getBounds());

            });

        }

    }



    var origin1 = {

        lat: 55.93,

        lng: -3.118

    };

    var origin2 = 'Greenwich, England';

    var destinationA = 'Stockholm, Sweden';

    var destinationB = {

        lat: 50.087,

        lng: 14.421

    };



    function calculateDistances() {

        var destination_longitude = document.getElementById('destination_longitude').value;

        var destination_latitude = document.getElementById('destination_latitude').value;

        var pickup_longitude = document.getElementById('pickup_longitude').value;

        var pickup_latitude = document.getElementById('pickup_latitude').value;



        if (destination_longitude != "" && destination_latitude != "" && pickup_longitude != "" && pickup_latitude) {

            var service = new google.maps.DistanceMatrixService();

            service.getDistanceMatrix({

                origins: [origin1, origin2],

                destinations: [destinationA, destinationB],

                travelMode: google.maps.TravelMode.DRIVING,

                unitSystem: google.maps.UnitSystem.METRIC,

                avoidHighways: false,

                avoidTolls: false

            }, callback);

        }



    }





    function callback(response, status) {

        if (status != google.maps.DistanceMatrixStatus.OK) {

            //  alert('Error was: ' + status);

            console.log("Error was:", status);

        } else {

            var origins = response.originAddresses;

            var destinations = response.destinationAddresses;





            console.log("origins", origins);

            console.log("destinations", destinations);



            for (var i = 0; i < origins.length; i++) {

                var results = response.rows[i].elements;



                for (var j = 0; j < results.length; j++) {

                    console.log(results[j].distance.text + ' in ' + results[j].duration.text);

                }

            }

        }

    }

    //  calculateDistances();

    </script>

    <script

        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0-m0BRbw8AtbMAawt7YPC4hFKmAO2hBI&libraries=places&callback=initAutocomplete"

        async defer></script>
  </body>
</html>