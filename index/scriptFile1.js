


	  function validateForm(form)
	  {
		  	var passed = false;
		  	
	  		//var x=document.forms["Myform"]["name"].value;
		  	var x=form.FullName.value;
	  		//var y=document.forms["Myform"]["textArea"].value;
		  	var y=form.textarea.value;
		  	
	  		if (x==null || x=="")
	    	{
	  			fixElement(document.getElementById('errName'),form.fname, "please enter your name");
	  			return false;
	    	}
	  		else if (isValidEmail(document.getElementById("EAddress").value) != true) 
	    	{
	  			fixElement(document.getElementById('errEAddress'),form.EAddress, "Please enter a valid Email");
	  			return false;
	    	}
	  		else if (y==null || y=="")
	    	{
	  			fixElement(document.getElementById('errMsg'),form.textarea, "please write your prayer request");
	  			return false;
	    	}
	  		else 
	  		{
	  			passed = true;
	  							
	  		}
	  		
	  		return passed;
	  		
	  }
	  
	  //---------------------------------Choir Register-------------------------------------------------
	  
	  function isFormCorrect(form)
	  {
		  	var passed = false;
		  	
	  		var x=register.FirstName.value;
	  		var y=register.LastName.value;
	  		var z=register.phone.value;
	  		var a=register.bdate.value;
	  		var b=register.address.value;
	  		var c=register.city.value;
	  		var d=register.region.value;
	  		var e=register.zipcode.value;
	  		var f=register.EAddress.value;
	  		var g=register.userId.value;
	  	
	  		var validformat=/^\d{2}\/\d{2}\/\d{4}$/;
	  		
		  	
	  		if (x==null || x=="")
	    	{
	  			fixElementRegister(document.getElementById('errMessage1'),register.fname, "please enter your first name");
	  			return false;
	    	}
	  		else if (y==null || y=="")
	    	{
	  			fixElementRegister(document.getElementById('errMessage1'),register.lname, "please enter your last name");
	  			return false;
	    	}	  		
	  		else if (isValidPhone(document.getElementById("phone").value) != true) 
	    	{
	  			fixElementRegister(document.getElementById('errMessage1'),register.phone, "Please enter a valid phone number");
	  			return false;
	    	}
	  		else if (!validformat.test(a)) 
	    	{
	  			fixElementRegister(document.getElementById('errMessage1'),register.bdate, "Invalid Date Format! e.g MM/DD/YYYY");
	  			return false;
	    	}
	  		else if (fixElementRegister(document.getElementById("bdate").value) != true) 
	    	{
	  			fixElement(document.getElementById('errMessage1'),register.bdate, "Invalid Day, Month, or Year range detected!");
	  			return false;
	  			
	    	}
	  		else if (b==null || b=="") 
	  		{
	  			fixElementRegister(document.getElementById('errMessage2'),register.address, "Please enter your Address");
	  			return false;
	  		}
	  		else if (c==null || c=="") 
	  		{
	  			fixElementRegister(document.getElementById('errMessage2'),register.city, "Please enter your city");
	  			return false;
	  		}
	  		else if (d == "000")
	  		{

	  			fixElementRegister(document.getElementById('errMessage2'),register.region, "Please select a region");
	  			return false;
	  		}
	  		else if (isValidZipCode(form.zipcode.value) != true)
	  		{	
	  			fixElementRegister(document.getElementById('errMessage2'),register.zip, "include your zip code. #####-#### format");
	  			return false;
	  		}
	  		else if (isValidEmail(document.getElementById("EAddress").value) != true) 
	    	{
	  			fixElementRegister(document.getElementById('errMessage2'),register.EAddress, "Please enter a valid Email");
	  			return false;
	    	}
	  		else if (form.userId.value == "") 
	  		{	
	  			fixElementRegister(document.getElementById('errMessage3'),register.UId, "Please create a valid UserID");
	  			return false;
	  		}	
	  		else if (form.passwd1.value == "") 
	  		{
	  			fixElementRegister(document.getElementById('errMessage3'),register.pwd1, "Please Creat a password");
	  			return false;
	  		}
	  		else if (checkPasswordMatch() != true) 
	  		{
	  			fixElementRegister(document.getElementById('errMessage3'),register.pwd2, "Please re-enter your password");
	  			return false;
	  		}	  		
	  		else 
	  		{
	  			passed = true;
	  							
	  		}
	  		
	  		return passed;
	  		
	  }
	  	
	  //check birth date is valid
	  	function isValidBdate(value){
		  
		  var monthfield=document.register.bdate.value.split("/")[0]
		  var dayfield=document.register.bdate.value.split("/")[1]
		  var yearfield=document.register.bdate.value.split("/")[2]
		  var dayobj = new Date(yearfield, monthfield-1, dayfield)
		  
		  if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
		  {
		  
		  	return false;
		  }
		  
		  else{
			  return true;
		  }
		  
		  
		  
	  }
	  
	  
	  // check if phone number is valid
	  function isValidPhone(num){
		  
		  var validformat=/^\d{3}\-\d{3}\-\d{4}$/

			 return validformat.test(num);
	  }
	  
		 //check if password match
	  function checkPasswordMatch()
	  {	
	  	var passed = false;

	  	var password1 = document.getElementById("pwd1").value
	  	var password2 = document.getElementById("pwd2").value;

	  	if(password1 === password2){
	  			passed = true;
	  		}
	  		
	  	return passed;	
	  	
	  }
	  
	//check if the zipCode is valid
	  function isValidZipCode(elementValue)
	  {
	  	var zipCodePattern1 = /^\d{5}$/;
	  	var zipCodePattern2 = /^\d{5}-\d{4}$/;
	  	 
	  	 
	       return (zipCodePattern1.test(elementValue)||zipCodePattern2.test(elementValue));
	  }
	  
	  

	  //check if Email is valid
	  function isValidEmail(elementValue)
	  {  
		  var emailPattern = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
		  
		  return emailPattern.test(elementValue);
	      
	  }
	  
	
	  

	  function fixElement(location, element, message) 
	  {
	  	cancelMessage();
	  	location.innerHTML= message;
	  	element.focus();
	  	
	  }
	  function cancelMessage(){
		document.getElementById('errName').innerHTML= "";
		document.getElementById('errEAddress').innerHTML= "";
	  	document.getElementById('errMsg').innerHTML= "";
		  	
	  }
	  
	  function fixElementRegister(location, element, message) 
	  {
	  	cancelMessageRegister();
	  	location.innerHTML= message;
	  	element.focus();
	  	
	  }
	  function cancelMessageRegister(){
		document.getElementById('errMessage1').innerHTML= "";
		document.getElementById('errMessage2').innerHTML= "";
	  	document.getElementById('errMessage3').innerHTML= "";
		  	
	  }

