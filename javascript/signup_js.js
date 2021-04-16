function chkefirstname()
{
	var e=document.getElementById("firstname").value;
	var demo = /^[a-zA-Z ]+$/;
	
	if (e == "") {
		document.getElementById("error1").innerHTML="Please Fill This Field";
	}	

	else
	{
		if(!(demo.test(e)))
		{
			document.getElementById("error1").innerHTML="First name should only have alphabets";
		}

		else
		{
			if((e.length)<3)
				document.getElementById("error1").innerHTML="First Name should have more than 3 characters";

			else
				document.getElementById("error1").innerHTML="";
		}
		
	}
}

function chkelastname()
{
	var e=document.getElementById("lastname").value;
	var demo = /^[a-zA-Z]+$/;

	if (e == "") {
		document.getElementById("error2").innerHTML="Please Fill This Field";
	}

	else
	{
		if(!(demo.test(e)))
		{
			document.getElementById("error2").innerHTML="Last name should only have alphabets";
		}

		else
		{
			if((e.length)<3)
				document.getElementById("error2").innerHTML="Last Name should have more than 3 characters";

			else
				document.getElementById("error2").innerHTML="";
		}
		
	}
}

function chkeemail()
{
	var e=document.getElementById("email").value;
	var demo = /^[a-zA-Z0-9`~!#$%^&*(),<>?/|{}]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$/

	if (e == "") {
		document.getElementById("error3").innerHTML="Please Fill This Field";
	}
	
	else
	{
		if(!(demo.test(e)))
		{
			document.getElementById("error3").innerHTML="Invalid email";
		}

		else
		document.getElementById("error3").innerHTML="";
	}

}

function chkepass()
{
	var e=document.getElementById("password").value;
    var demo = /^[a-zA-Z0-9]+$/;
	
	if (e == "") {
		document.getElementById("error4").innerHTML="Please Fill This Field";
	}

	else
	{
		if(!(demo.test(e)))
		{
			document.getElementById("error4").innerHTML="Password should only have alphabets and Numbers";
		}

		else
		{
			if((e.length)<6)
				document.getElementById("error4").innerHTML="Password should have more than 5 characters";

			else
				document.getElementById("error4").innerHTML="";
		}
		
	}
}