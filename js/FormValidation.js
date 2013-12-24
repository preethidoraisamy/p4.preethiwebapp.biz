
/*-------------------------------------------------------------------------------------------------
Phone number validation - phone # should be number
-------------------------------------------------------------------------------------------------*/
$('#phoneno').keyup(function() {

	// Figure out what the user typed in
	var phone_no = $(this).val();
	if(isNaN(phone_no))
	{
	 	var len = phone_no.length;
		document.getElementById("phoneno").value = phone_no.substring(0,len-1);
	}
	
});


/*-------------------------------------------------------------------------------------------------
Sign up button validation
-------------------------------------------------------------------------------------------------*/
$('#signup-btn').click(function() {

	console.log("inside");
	if(password.localeCompare(conpassword))
	{
		console.log("same");
	}
	else
	{
		console.log("no same");
	}
});

/*-------------------------------------------------------------------------------------------------
# of years Experience validation - phone # should be number
-------------------------------------------------------------------------------------------------*/
$('#experience').keyup(function() {

	// Figure out what the user typed in
	var phone_no = $(this).val();
	if(isNaN(phone_no))
	{
	 	var len = phone_no.length;
		document.getElementById("experience").value = phone_no.substring(0,len-1);
	}
	
});
/*-------------------------------------------------------------------------------------------------
Zipcode validation - Zipcode # should be number
-------------------------------------------------------------------------------------------------*/
$('#zipcode').keyup(function() {

	// Figure out what the user typed in
	var phone_no = $(this).val();
	if(isNaN(phone_no))
	{
	 	var len = phone_no.length;
		document.getElementById("zipcode").value = phone_no.substring(0,len-1);
	}
	
});


