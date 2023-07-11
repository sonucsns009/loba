
// validation for order change
function order_change(order_id,order_status,user_type,admin_id,customer_id)
{

	if(confirm("Dear Partner, Are you sure want to change order status?"))
	{
		var order_status=order_status;
		var order_id=order_id;

		var admin_id=admin_id;
		var user_type=user_type;

		var customer_id=customer_id;
		/*alert(order_status);
		alert(order_id);*/
		$("#display_status_msg").hide();
		$.ajax({
			type: "POST",
			url: BASEPATH+"Orders/ajaxSetOrderStatus",
			data:'order_status='+order_status+"&order_id="+order_id+"&admin_id="+admin_id+"&user_type="+user_type+"&customer_id="+customer_id,
			dataType: 'json',
			success: function(response)
			{
				if(response.chnage_st==1)
				{
					$("#display_status_msg").show();

					$('#display_status_msg').fadeOut(1000);

				}

			}
			});
	}
	else
	{
		return false;
	}
}



// code for all manage pages



function chk_isDeleteComnfirm()
{
	if(confirm("Are you really want to delete record?"))

		return true;
	else
		return false;

}

$("#ckbCheckAll").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
});

// validation for rst status change
function rst_status_change(rst_id,rst_status)
{
	if(confirm("Are you really want to "+rst_status+" record ?"))
	{
		var rst_status=rst_status;
		var rst_id=rst_id; 
		$("#display_status_msg").hide();
		$.ajax({
			type: "POST",
			url: BASEPATH+"Merchant/ajaxSetRstStatus",
			data:'rst_status='+rst_status+"&rst_id="+rst_id,
			dataType: 'json',
			success: function(response)
			{ 
				if(response.chnage_st==1)
				{
					$("#display_status_msg").show();
					$('#display_status_msg').fadeOut(1000);
				}
			}
			});
	}		
	else
	{
		return false;
	}
}

// function for changing customer status

function customer_status_change(user_id,user_status)
{
	$("#sucess_sttaus").hide();

	var user_id=user_id;

	var user_status=user_status;



	if(user_id!='')

	{
		if(confirm("Do you really want to "+user_status+" record?"))
		{
			$.ajax({

					type: "POST",

					url: BASEPATH+"Users/ajaxSetUserStatus",

					data:'user_id='+user_id+"&user_status="+user_status,

					dataType: 'json',

					success: function(response)

					{
		 
						$("#sucess_sttaus").show();

						$('#sucess_sttaus').fadeOut(3000);

					}

					});

		}
		else
		{
			//alert("chk");
			location.reload();
		}
			

	}
	else
	{
		return false;
	}
		

}




$(document).ready(function($)
{

	$('#generate_code').click(function(){
		let randomString = '';
		const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		const charactersLength = characters.length;
		let counter = 0;
		while (counter < 8) {
			randomString += characters.charAt(Math.floor(Math.random() * charactersLength));
			counter += 1;
		}
		//return result;
       // alert(randomString);
        if(randomString!='')
        {
            $("#promocode").val(randomString);
        }
        else
        {
            $("#promocode").val();
        }
    });

	$('#promocodetype').change(function(){
        var type= $('#promocodetype').val();

		if(type=='Fixed Price')
        {
            $("#pricediv").show();
            $("#percentagediv").hide();
        }
        else if(type=='Percentage')
        {
            $("#percentagediv").show();
			$("#pricediv").hide();
        }
    });

	$('#btn_save_promocode').click(function(){
        var promocodetype= $('#promocodetype').val();
        var promocode= $('#promocode').val();
        var price= $('#price').val();
        var percentage= $('#percentage').val();
        var service_id= $('#service_id').val();

		$("#err_promocodetype").html('');
		$("#err_price").html('');
		$("#err_percentage").html('');
		$("#err_promocode").html('');
		$("#err_service_id").html('');

		var flag=1;

		if(promocodetype=="")
		{
			$("#err_promocodetype").html('Select Code Type.');
			flag=0;
		}
		if(promocode=="")
		{
			$("#err_promocode").html('Generate Code.');
			flag=0;
		}
		
		if(promocodetype=='Fixed Price')
        {
			if(price=="")
			{
				$("#err_price").html('Enter Discount price.');
				flag=0;
			}
        }
        if(promocodetype=='Percentage')
        {
			if(percentage=="")
			{
				$("#err_percentage").html('Enter percentage.');
				flag=0;
			}
        }
		if(service_id=="")
		{
			$("#err_service_id").html('Select Services.');
			flag=0;
		}

		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
    });
/* end login */

	/* select all customers for notification section*/

	$(".check_all_customers_notification").click(function(){

		 $("input:checkbox.cls_check_all_customers").prop('checked',this.checked);

	});


/* valdiation for add  driver*/


/* valdiation for add  Service Provider*/
$('#btn_save_user').click(function(){
	var userfullname=$("#full_name").val();
	var email=$("#email").val();
	var mobilenumber=$("#mobile").val();
	var alt_mobile=$("#alt_mobile").val();
	var address=$("#address").val();
	var weight=$("#weight").val();
	var mobility_aid=$("#mobility_aid").val();
	var id_proof_no=$("#id_proof_no").val();
	var id_proof_front=$("#id_proof_front").val();
	var rst_image=$("#rst_image").val();
	var medical_history=$("#medical_history").val();
	var user_type=$("#user_type").val();
	var status=$("#status").val();
	var password=$("#password").val();
	
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	
	$("#err_full_name").html('');
	$("#err_email").html('');
	$("#err_mobile").html('');
	$("#err_alt_mobile").html('');
	$("#err_address").html('');
	$("#err_weight").html('');
	$("#err_mobility_aid").html('');
	$("#err_id_proof_no").html('');
	$("#err_id_proof_front").html('');
	$("#err_medical_history").html('');
	$("#err_user_type").html('');
	$("#err_status").html(''); 
	$("#err_password").html(''); 
	
	var flag=1;

	if(userfullname=="")
	{
		$("#err_full_name").html('Enter full name.');
		flag=0;
	}
	if(email=="")
	{
		$("#err_email").html('Enter email address.');
		flag=0;
	}
	if (email!="" && !testEmail.test(email))
    {
		$("#err_rst_email").html('Please enter a valid email address.');
		flag=0;
	}
	if(mobilenumber=="")
	{
	$("#err_mobile").html('Enter mobile number.');
		flag=0;
	}
	if(mobilenumber!="" &&  mobilenumber.length!=10)
	{
		$("#err_mobile").html('Please enter valid contact number of 10 digit.');
		flag=0;
	}
	if(mobilenumber!="" && isNaN(mobilenumber))
	{
		$("#err_mobile").html('Please enter valid contact number.');
		flag=0;
	}
	if(address=="")
	{
		$("#err_address").html('Enter address.');
		flag=0;
	}
	if(weight=="")
	{
		$("#err_weight").html('Select weight.');
		flag=0;
	}
	if(mobility_aid=="")
	{
		$("#err_mobility_aid").html('Select Mobility aid.');
		flag=0;
	}
	if(id_proof_no=="")
	{
		$("#err_id_proof_no").html('Enter Id proof no.');
		flag=0;
	}
	if(id_proof_front=="")
	{
		$("#err_id_proof_front").html('Select Id proof front photo');
		flag=0;
	}
	if(medical_history=="")
	{
		$("#err_medical_history").html('Enter medical history.');
		flag=0;
	}
	if(user_type=="")
	{
		$("#err_user_type").html('Select user type.');
		flag=0;
	}
	if(status=="")
	{
		$("#err_status").html('Select status.');
		flag=0;
	}
	if(password=="")
	{
		$("#err_password").html('Enter Password.');
		flag=0;
	}
	
	
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end slider */

/* valdiation for add Nurse */
$('#btn_save_nurse').click(function(){
	var userfullname=$("#full_name").val();
	var email=$("#email").val();
	var mobilenumber=$("#mobile").val();
	var address=$("#address").val();
	var from_organization=$("#from_organization").val();
	var charges_per_hourse=$("#charges_per_hourse").val();
	var charges_per_visit=$("#charges_per_visit").val(); 
	var password=$("#password").val();

	//CH
	var userfullname_ch=$("#full_name_ch").val();
 	var address_ch=$("#address_ch").val();
	var from_organization_ch=$("#from_organization_ch").val();
	var charges_per_hourse_ch=$("#charges_per_hourse_ch").val();
	var charges_per_visit_ch=$("#charges_per_visit_ch").val();
	
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	//var ext1 = $("#rst_image").val().split('.').pop().toLowerCase();
	//var ext_id_proof_front = $("#id_proof_front").val().split('.').pop().toLowerCase();

	$("#err_full_name").html('');
	$("#err_email").html('');
	$("#err_mobile").html('');
 	$("#err_address").html('');
	$("#err_from_organization").html('');
	$("#err_charges_per_hourse").html('');
	$("#err_charges_per_visit").html('');
	$("#err_password").html(''); 
	
	// CH
	$("#err_full_name_ch").html('');
  	$("#err_address_ch").html('');
	$("#err_from_organization_ch").html('');
	$("#err_charges_per_hourse_ch").html('');
	$("#err_charges_per_visit_ch").html('');

	var flag=1;

	if(userfullname=="")
	{
		$("#err_full_name").html('Enter full name.');
		flag=0;
	}
	if(email=="")
	{
		$("#err_email").html('Enter email address.');
		flag=0;
	}
	if (email!="" && !testEmail.test(email))
    {
		$("#err_email").html('Please enter a valid email address.');
		flag=0;
	}
	if(mobilenumber=="")
	{
	$("#err_mobile").html('Enter mobile number.');
		flag=0;
	}
	if(mobilenumber!="" &&  mobilenumber.length!=10)
	{
		$("#err_mobile").html('Please enter valid contact number of 10 digit.');
		flag=0;
	}
	if(mobilenumber!="" && isNaN(mobilenumber))
	{
		$("#err_mobile").html('Please enter valid contact number.');
		flag=0;
	}
	if(address=="")
	{
		$("#err_address").html('Enter address.');
		flag=0;
	}
	if(from_organization=="")
	{
		$("#err_from_organization").html('Enter from organization.');
		flag=0;
	}
	if(charges_per_hourse=="")
	{
		$("#err_charges_per_hourse").html('Enter charges per hours.');
		flag=0;
	}
	if(charges_per_visit=="")
	{
		$("#err_charges_per_visit").html('Enter charges per visit.');
		flag=0;
	}
	if(password=="")
	{
		$("#err_password").html('Enter password.');
		flag=0;
	}

	// CH 
	if(userfullname_ch=="")
	{
		$("#err_full_name_ch").html('Enter full name.(Chinese)');
		flag=0;
	}
	if(address_ch=="")
	{
		$("#err_address_ch").html('Enter address.(Chinese)');
		flag=0;
	}
	if(from_organization_ch=="")
	{
		$("#err_from_organization_ch").html('Enter from organization.(Chinese)');
		flag=0;
	}
	if(charges_per_hourse_ch=="")
	{
		$("#err_charges_per_hourse_ch").html('Enter charges per hours.(Chinese)');
		flag=0;
	}
	if(charges_per_visit_ch=="")
	{
		$("#err_charges_per_visit_ch").html('Enter charges per visit.(Chinese)');
		flag=0;
	}
	
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end Nurse */

/* valdiation for add Doctor */
$('#btn_save_doctor').click(function(){
	var userfullname=$("#full_name").val();
	var email=$("#email").val();
	var mobilenumber=$("#mobile").val();
	var address=$("#address").val();
	var from_organization=$("#from_organization").val();
	var charges_per_hourse=$("#charges_per_hourse").val();
	var charges_per_visit=$("#charges_per_visit").val(); 
	var password=$("#password").val();

	//CH
	var userfullname_ch=$("#full_name_ch").val();
 	var address_ch=$("#address_ch").val();
	var from_organization_ch=$("#from_organization_ch").val();
	var charges_per_hourse_ch=$("#charges_per_hourse_ch").val();
	var charges_per_visit_ch=$("#charges_per_visit_ch").val();
	
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	//var ext1 = $("#rst_image").val().split('.').pop().toLowerCase();
	//var ext_id_proof_front = $("#id_proof_front").val().split('.').pop().toLowerCase();

	$("#err_full_name").html('');
	$("#err_email").html('');
	$("#err_mobile").html('');
 	$("#err_address").html('');
	$("#err_from_organization").html('');
	$("#err_charges_per_hourse").html('');
	$("#err_charges_per_visit").html('');
	$("#err_password").html(''); 
	
	// CH
	$("#err_full_name_ch").html('');
  	$("#err_address_ch").html('');
	$("#err_from_organization_ch").html('');
	$("#err_charges_per_hourse_ch").html('');
	$("#err_charges_per_visit_ch").html('');

	var flag=1;

	if(userfullname=="")
	{
		$("#err_full_name").html('Enter full name.');
		flag=0;
	}
	if(email=="")
	{
		$("#err_email").html('Enter email address.');
		flag=0;
	}
	if (email!="" && !testEmail.test(email))
    {
		$("#err_email").html('Please enter a valid email address.');
		flag=0;
	}
	if(mobilenumber=="")
	{
	$("#err_mobile").html('Enter mobile number.');
		flag=0;
	}
	if(mobilenumber!="" &&  mobilenumber.length!=10)
	{
		$("#err_mobile").html('Please enter valid contact number of 10 digit.');
		flag=0;
	}
	if(mobilenumber!="" && isNaN(mobilenumber))
	{
		$("#err_mobile").html('Please enter valid contact number.');
		flag=0;
	}
	if(address=="")
	{
		$("#err_address").html('Enter address.');
		flag=0;
	}
	if(from_organization=="")
	{
		$("#err_from_organization").html('Enter from organization.');
		flag=0;
	}
	if(charges_per_hourse=="")
	{
		$("#err_charges_per_hourse").html('Enter charges per hours.');
		flag=0;
	}
	if(charges_per_visit=="")
	{
		$("#err_charges_per_visit").html('Enter charges per visit.');
		flag=0;
	}
	if(password=="")
	{
		$("#err_password").html('Enter password.');
		flag=0;
	}

	// CH 
	if(userfullname_ch=="")
	{
		$("#err_full_name_ch").html('Enter full name.(Chinese)');
		flag=0;
	}
	if(address_ch=="")
	{
		$("#err_address_ch").html('Enter address.(Chinese)');
		flag=0;
	}
	if(from_organization_ch=="")
	{
		$("#err_from_organization_ch").html('Enter from organization.(Chinese)');
		flag=0;
	}
	if(charges_per_hourse_ch=="")
	{
		$("#err_charges_per_hourse_ch").html('Enter charges per hours.(Chinese)');
		flag=0;
	}
	if(charges_per_visit_ch=="")
	{
		$("#err_charges_per_visit_ch").html('Enter charges per visit.(Chinese)');
		flag=0;
	}
	
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end Doctor */

/* valdiation for add Service */
$('#btn_save_service').click(function(){
	var services_title=$("#services_title").val();
	var service_description=$("#service_description").val();
	var tagline=$("#tagline").val();
	var paytype=$("#paytype").val();
	var pricetype=$("#pricetype").val();
	var amount=$("#amount").val();
	var duration=$("#duration").val(); 
	var buffer_time=$("#buffer_time").val();
	var payment_preferences=$("#payment_preferences").val();
	var video_conference=$(".video_conference").val();

	//CH
	var services_title_ch=$("#services_title_ch").val();
 	var service_description_ch=$("#service_description_ch").val();
	var tagline_ch=$("#tagline_ch").val();
	var paytype_ch=$("#paytype_ch").val();
	var pricetype_ch=$("#pricetype_ch").val();
	var amount_ch=$("#amount_ch").val();
	var duration_ch=$("#duration_ch").val();
	var buffer_time_ch=$("#buffer_time_ch").val();
	var payment_preferences_ch=$("#payment_preferences_ch").val();

	$("#err_services_title").html('');
	$("#err_service_description").html('');
	$("#err_tagline").html('');
 	$("#err_paytype").html('');
	$("#err_pricetype").html('');
	$("#err_amount").html('');
	$("#err_duration").html('');
	$("#err_buffer_time").html(''); 
	$("#err_payment_preferences").html(''); 
	$("#err_video_conference").html(''); 
	
	// CH
	$("#err_services_title_ch").html('');
  	$("#err_service_description_ch").html('');
	$("#err_tagline_ch").html('');
	$("#err_paytype_ch").html('');
	$("#err_pricetype_ch").html('');
	$("#err_amount_ch").html('');
	$("#err_duration_ch").html('');
	$("#err_buffer_time_ch").html('');
	$("#err_payment_preferences_ch").html('');

	var flag=1;

	if(services_title=="")
	{
		$("#err_services_title").html('Enter Service title.');
		flag=0;
	}
	if(service_description=="")
	{
		$("#err_service_description").html('Enter service description.');
		flag=0;
	}
	if(tagline=="")
	{
	$("#err_tagline").html('Enter Tagline.');
		flag=0;
	}
	
	if(paytype=="")
	{
		$("#err_paytype").html('Select Price & payment.');
		flag=0;
	}
	if(pricetype=="")
	{
		$("#err_pricetype").html('Select price type.');
		flag=0;
	}
	if(amount=="")
	{
		$("#err_amount").html('Enter amount.');
		flag=0;
	}
	if(duration=="")
	{
		$("#err_duration").html('Enter duration.');
		flag=0;
	}
	if(buffer_time=="")
	{
		$("#err_buffer_time").html('Enter buffer time.');
		flag=0;
	}
	if(payment_preferences=="")
	{
		$("#err_payment_preferences").html('Select payment preferences.');
		flag=0;
	}
	if(video_conference=="")
	{
		$("#err_video_conference").html('Select videi conference.');
		flag=0;
	}

	// CH 
	if(services_title_ch=="")
	{
		$("#err_services_title_ch").html('Enter Service title.');
		flag=0;
	}
	if(service_description_ch=="")
	{
		$("#err_service_description_ch").html('Enter service description.');
		flag=0;
	}
	if(tagline_ch=="")
	{
	$("#err_tagline_ch").html('Enter Tagline.');
		flag=0;
	}
	
	if(paytype_ch=="")
	{
		$("#err_paytype_ch").html('Select Price & payment.');
		flag=0;
	}
	if(pricetype_ch=="")
	{
		$("#err_pricetype_ch").html('Select price type.');
		flag=0;
	}
	if(amount_ch=="")
	{
		$("#err_amount_ch").html('Enter amount.');
		flag=0;
	}
	if(duration_ch=="")
	{
		$("#err_duration_ch").html('Enter duration.');
		flag=0;
	}
	if(buffer_time_ch=="")
	{
		$("#err_buffer_time_ch").html('Enter buffer time.');
		flag=0;
	}
	if(payment_preferences_ch=="")
	{
		$("#err_payment_preferences_ch").html('Select payment preferences.');
		flag=0;
	}
	
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end Service */

/* valdiation for add Package */
$('#btn_save_package').click(function(){
	var title=$("#title").val();
	var description=$("#description").val();
	var price=$("#price").val();
	var discountprice=$("#discountprice").val();
	var period=$("#period").val();
	var features=$("#features").val();
	var type=$("#type").val(); 
	var status=$("#status").val();

	//CH
	var title_ch=$("#title_ch").val();
	var description_ch=$("#description_ch").val();
	var price_ch=$("#price_ch").val();
	var discountprice_ch=$("#discountprice_ch").val();
	var period_ch=$("#period_ch").val();
	var features_ch=$("#features_ch").val();
	var type_ch=$("#type_ch").val(); 
	var status_ch=$("#status_ch").val();
	
	$("#err_title").html('');
	$("#err_description").html('');
	$("#err_price").html('');
 	$("#err_discountprice").html('');
	$("#err_features").html('');
	$("#err_period").html('');
	$("#err_type").html('');
	$("#err_status").html(''); 
	
	// CH
	$("#err_title_ch").html('');
  	$("#err_description_ch").html('');
	$("#err_price_ch").html('');
	$("#err_charges_per_hourse_ch").html('');
	$("#err_discountprice_ch").html('');
	$("#err_features_ch").html('');
	$("#err_period_ch").html('');
	$("#err_type_ch").html('');

	var flag=1;

	if(title=="")
	{
		$("#err_title").html('Enter Package title.');
		flag=0;
	}
	if(description=="")
	{
		$("#err_description").html('Enter Description.');
		flag=0;
	}
	
	if(price=="")
	{
	$("#err_price").html('Enter Price.');
		flag=0;
	}
	
	if(discountprice=="")
	{
		$("#err_discountprice").html('Enter Discounted Price.');
		flag=0;
	}
	if(features=="")
	{
		$("#err_features").html('Enter Features.');
		flag=0;
	}
	if(period=="")
	{
		$("#err_period").html('Enter period in days.');
		flag=0;
	}
	if(type=="")
	{
		$("#err_type").html('Select Package Type.');
		flag=0;
	}
	if(status=="")
	{
		$("#err_status").html('Select Status.');
		flag=0;
	}

	// CH 
	if(title_ch=="")
	{
		$("#err_title_ch").html('Enter Package title (Chinese).');
		flag=0;
	}
	if(description_ch=="")
	{
		$("#err_description_ch").html('Enter Description (Chinese).');
		flag=0;
	}
	
	if(price_ch=="")
	{
	$("#err_price_ch").html('Enter Price (Chinese).');
		flag=0;
	}
	
	if(discountprice_ch=="")
	{
		$("#err_discountprice_ch").html('Enter Discounted Price (Chinese).');
		flag=0;
	}
	if(features_ch=="")
	{
		$("#err_features_ch").html('Enter Features (Chinese).');
		flag=0;
	}
	if(period_ch=="")
	{
		$("#err_period_ch").html('Enter period in days (Chinese).');
		flag=0;
	}
	if(type_ch=="")
	{
		$("#err_type_ch").html('Select Package Type (Chinese).');
		flag=0;
	}
	 
	
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end Package */

/* valdiation for add  slider*/
$('#btn_addslider').click(function(){
	

	var banner_title=$("#banner_title").val();

	var banner_image=$("#banner_image").val();
	var banner_start_date=$("#banner_start_date").val();
	var banner_end_date=$("#banner_end_date").val();

	var ext1 = $("#banner_image").val().split('.').pop().toLowerCase();
//var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
//var re = "/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g";

	$("#err_banner_url").html('');
	$("#err_banner_title").html('');
	$("#err_banner_image").html('');
	$("#err_banner_start_date").html('');
	$("#err_banner_end_date").html('');

	var flag=1;
	var banner_subtype=$("#banner_subtype").val();
	if(banner_subtype=="product")
    {
        
         var sel_rest=$('#sel_rest').val();
         var sel_product=$('#sel_product').val();

         $("#err_rest").html('');
         $("#err_product").html('');

         if(sel_rest=="")
		{
			$("#err_rest").html('Select Restaurent.');
			flag=0;
		}
		if(sel_product=="")
		{
		$("#err_product").html('Select Product.');
			flag=0;
		}
       
    }
     else if(banner_subtype=="store")
	{
        
         var sel_rest=$('#sel_rest').val();
         

         $("#err_rest").html('');
         

         if(sel_rest=="")
		{
			$("#err_rest").html('Select Restaurent.');
			flag=0;
		}
		
       
    }
    else
    {
       elm = document.createElement('input');
       elm.setAttribute('type', 'url');
		var banner_url=$("#banner_url").val();
       $("#err_banner_url").html('');
       if(banner_url=="")
		{
			$("#err_banner_url").html('Enter url.');
			flag=0;
		}
		if (!/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#banner_url").val()) && banner_url!="") 
		{
			$("#err_banner_url").html('Enter valid url.');
			flag=0;
		}
    }
	if(banner_title=="")
	{
	$("#err_banner_title").html('Enter title.');
		flag=0;
	}
	if(banner_image=="")
	{
		$("#err_banner_image").html('Select banner image.');
		flag=0;
	}
	if(banner_image!="" && $.inArray(ext1, ['gif','png','jpg','jpeg','bmp']) == -1)
    {
        $("#err_banner_image").html('Invalid banner image.');
        flag=0;
     }

	if(banner_start_date=="")
	{
		$("#err_banner_start_date").html('Select start date');
		flag=0;
	}
	if(banner_end_date=="")
	{
		$("#err_banner_end_date").html('select end date.');
		flag=0;
	}

	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end slider */

$('#btn_updateslider').click(function(){
	//var banner_url=$("#banner_url").val();

	var banner_title=$("#banner_title").val();

	
	var banner_start_date=$("#banner_start_date").val();
	var banner_end_date=$("#banner_end_date").val();

	var ext1 = $("#banner_image").val().split('.').pop().toLowerCase();
var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/

	$("#err_banner_url").html('');
	$("#err_banner_title").html('');
	
	$("#err_banner_start_date").html('');
	$("#err_banner_end_date").html('');

	var flag=1;

	if(banner_title=="")
	{
	$("#err_banner_title").html('Enter title.');
		flag=0;
	}
	/*if(banner_image=="")
	{
		$("#err_banner_image").html('Select banner image.');
		flag=0;
	}
	if(banner_image!="" && $.inArray(ext1, ['gif','png','jpg','jpeg','bmp']) == -1)
    {
        $("#err_banner_image").html('Invalid banner image.');
        flag=0;
     }*/

	if(banner_start_date=="")
	{
		$("#err_banner_start_date").html('Select start date');
		flag=0;
	}
	if(banner_end_date=="")
	{
		$("#err_banner_end_date").html('select end date.');
		flag=0;
	}
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end slider */

});