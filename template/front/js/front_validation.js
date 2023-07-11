$(document).ready(function($) 
{
		



	// code for add contact delivery enquiry
	$("#btn_delivery_enquiry").click(function()
	{
		var full_name=$("#full_name").val();
		var lng=$("#lng").val();
		var email_address=$("#email_address").val();
		var mobile_number=$("#mobile_number").val();
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		
		var flag=1;
		$("#err_owner_name").html('');
		$("#err_email_address").html('');
		$("#err_mobile_number").html('');
		
		if(full_name=="")
		{
			if(lng=="English")
			{
					$("#err_full_name").html('Enter full name.');
			}
			else
			{
				$("#err_full_name").html('Ingrese el nombre completo.');
			}
			flag=0;
		}
		if(email_address=="")
		{
			if(lng=="English")
			{
					$("#err_email_address").html('Enter email address.');
			}
			else
			{
				$("#err_email_address").html('Introducir la dirección de correo electrónico.');
			}
			flag=0;
		}
		if(email_address!="" && !testEmail.test(email_address))
		{
			if(lng=="English")
			{
					$("#err_email_address").html('Please enter valid email address.');
			}
			else
			{
				$("#err_email_address").html('Por favor ingrese una dirección de correo electrónico válida.');
			}
			flag=0;
		}
		if(mobile_number=="")
		{
			if(lng=="English")
			{
					$("#err_mobile_number").html("Enter phone number.");
			}
			else
			{
				$("#err_mobile_number").html("Introduzca el número de teléfono.");
			}
			flag=0;
		}
		if(mobile_number!="" && isNaN(mobile_number))
		{
			if(lng=="English")
			{
					$("#err_mobile_number").html('Please enter valid phone number.');
			}
			else
			{
				$("#err_mobile_number").html('Por favor, introduzca un número de teléfono válido.');
			}
			flag=0;
		}
		if(flag==1)
			return true;
		else
			return false;
	});	

	// code for add contact delivery enquiry
	$("#btn_signup").click(function()
	{
		var fullName=$("#fullName").val();
		var mobileNo=$("#mobileNo").val();
		var emailAddress=$("#emailAddress").val();
		var emergencyno=$("#emergencyno").val();
		var address=$("#address").val();
		var selectGender=$("#selectGender").val();
		var selectWeight=$("#selectWeight").val();
		var mobilityAid=$("#mobilityAid").val();
		var idNumber=$("#idNumber").val();
		var front_id_file=$("#front_id_file").val();
		var back_id_file=$("#back_id_file").val();
		var medicalHistory=$("#medicalHistory").val();

		var lng=$("#lng").val();
		// var email_address=$("#email_address").val();
		// var mobile_number=$("#mobile_number").val();
		// var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		
		var flag=1;
		$("#err_full_name").html('');
		$("#err_mobileNo").html('');
		$("#err_emailAddress").html('');
		$("#err_emergencyno").html('');
		$("#err_address").html('');
		$("#err_selectGender").html('');
		$("#err_selectWeight").html('');
		$("#err_mobilityAid").html('');
		$("#err_idNumber").html('');
		$("#err_medicalHistorye").html('');
		
		$('#fullName').css('border-color', '#ced4da');
		$('#mobileNo').css('border-color', '#ced4da');
		$('#emailAddress').css('border-color', '#ced4da');
		$('#emergencyno').css('border-color', '#ced4da');
		$('#address').css('border-color', '#ced4da');
		$('#selectGender').css('border-color', '#ced4da');
		$('#selectWeight').css('border-color', '#ced4da');
		$('#mobilityAid').css('border-color', '#ced4da');
		$('#idNumber').css('border-color', '#ced4da');
		$('#medicalHistory').css('border-color', '#ced4da');

		if(fullName=="")
		{
			if(lng=="English")
			{
				$("#err_full_name").html('Enter full name.');
				$('#fullName').css('border-color', 'red');
			}
			else
			{
				$("#err_full_name").html('Ingrese el nombre completo.');
				$('#fullName').css('border-color', 'red');

			}
			flag=0;
		}
		
		if(mobileNo=="")
		{
			if (validateNumber(mobileNo)) 
			{
				if(lng=="English")
				{
					$("#err_mobileNo").html('Enter mobile number.');
					$('#mobileNo').css('border-color', 'red');
				}
				else
				{
					$("#err_mobileNo").html('Enter mobile number.');
					$('#mobileNo').css('border-color', 'red');
	
				}
			}
			else
			{
				$("#err_mobileNo").html('Invalid mobile number.');
					$('#mobileNo').css('border-color', 'red');
			}
			flag=0;
		}
		if(emailAddress=="")
		{
			if (validateNumber(mobileNo)) 
			{
				if(lng=="English")
				{
					$("#err_emailAddress").html('Enter email address.');
					$('#emailAddress').css('border-color', 'red');
				}
				else
				{
					$("#err_emailAddress").html('Enter email address.');
					$('#emailAddress').css('border-color', 'red');

				}
			}
			else
			{
				$("#err_emailAddress").html('Invalid email address.');
					$('#emailAddress').css('border-color', 'red');
			}
			flag=0;
		}
		if(emergencyno=="")
		{
			if(lng=="English")
			{
				$("#err_emergencyno").html('Enter emergency no.');
				$('#emergencyno').css('border-color', 'red');
			}
			else
			{
				$("#err_emergencyno").html('Enter emergency no.');
				$('#emergencyno').css('border-color', 'red');

			}
			flag=0;
		}
		if(address=="")
		{
			if(lng=="English")
			{
				$("#err_address").html('Enter address.');
				$('#address').css('border-color', 'red');
			}
			else
			{
				$("#err_address").html('Enter address.');
				$('#address').css('border-color', 'red');

			}
			flag=0;
		}
		if(selectWeight=="")
		{
			if(lng=="English")
			{
				$("#err_selectWeight").html('Enter select weight.');
				$('#selectWeight').css('border-color', 'red');
			}
			else
			{
				$("#err_selectWeight").html('Enter select weight.');
				$('#selectWeight').css('border-color', 'red');

			}
			flag=0;
		}
		if(mobilityAid=="")
		{
			if(lng=="English")
			{
				$("#err_mobilityAid").html('Enter mobility Aid .');
				$('#mobilityAid').css('border-color', 'red');
			}
			else
			{
				$("#err_mobilityAid").html('Enter mobility Aid .');
				$('#mobilityAid').css('border-color', 'red');

			}
			flag=0;
		}
		if(idNumber=="")
		{
			if(lng=="English")
			{
				$("#err_idNumber").html('Enter idNumber.');
				$('#idNumber').css('border-color', 'red');
			}
			else
			{
				$("#err_idNumber").html('Enter id number.');
				$('#idNumber').css('border-color', 'red');
			}
			flag=0;
		}
		if(medicalHistory=="")
		{
			if(lng=="English")
			{
				$("#err_medicalHistory").html('Enter medical history.');
				$('#medicalHistory').css('border-color', 'red');
			}
			else
			{
				$("#err_medicalHistory").html('Enter medical history.');
				$('#medicalHistory').css('border-color', 'red');
			}
			flag=0;
		}
		if(flag==1)
			return true;
		else
			return false;
	});	

	// code for add contact delivery enquiry
	$("#btn_login").click(function()
	{
		var phone_no=$("#phone_no").val();
		
		var lng=$("#lng").val();
		// var email_address=$("#email_address").val();
		// var mobile_number=$("#mobile_number").val();
		// var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		
		var flag=1;
		$("#err_phone_no").html('');
		
		
		$('#phone_no').css('border-color', '#ced4da');
		

		if(phone_no=="")
		{
			
				$("#err_phone_no").html('Enter phone no.');
				$('#phone_no').css('border-color', 'red');
			
			flag=0;
		}
		
		
		if(flag==1)
			return true;
		else
			return false;
	});	

	// code for add contact delivery enquiry
	$("#btn_verify_otp").click(function()
	{
		var mobile_otp=$("#mobile_otp").val();
		
		var lng=$("#lng").val();
		// var email_address=$("#email_address").val();
		// var mobile_number=$("#mobile_number").val();
		// var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		
		var flag=1;
		$("#err_mobile_otp").html('');
		
		
		$('#mobile_otp').css('border-color', '#ced4da');
		

		if(mobile_otp=="")
		{
			
				$("#err_mobile_otp").html('OTP Required.');
				$('#mobile_otp').css('border-color', 'red');
			
			flag=0;
		}
		
		
		if(flag==1)
			return true;
		else
			return false;
	});	


	// code for add card
$("#btn_add_card").click(function(){
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
		return false;
	else
		return false;
});	

	
});

function validateNumber(input) {
	var re = /^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/
  
	return re.test(input)
  }
  function validateEmail(email) {
	var regex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
	return regex.test(email);
  }