$(document).ready(function(){
	
     var fname = "";
     var lname = "";
     var email = "";
     var passwd = "";
     var repasswd = "";
     var gender = "";
     var website = "";

$("#fname").keyup(function(){
	
          var vall = $(this).val();
		  if(vall == "")
		  {
			  $("#fnameerror").html("please enter your first name");
			  fname = "";
		  }
		  else if(vall.length < 3)
		  {
			   $("#fnameerror").html("first name is too short");
			   fname = "";
		  }
		  else
		  {
			   $("#fnameerror").html("GOOD!");
			   fname=vall;
		  }

	});
	
	
	$("#lname").keyup(function(){
	
          var vall = $(this).val();
		  if(vall == "")
		  {
			  $("#lnameerror").html("please enter your last name");
			  lname = "";
		  }
		  else if(vall.length < 3)
		  {
			   $("#lnameerror").html("last name is too short");
			   lname = "";
		  }
		  else
		  {
			   $("#lnameerror").html("GOOD!");
			   lname=vall;
		  }

	});
	
	$("#email").keyup(function(){
		 
          var vall = $(this).val();
          if(vall == "")
		  {
			  $("#emailerror").html("Please enter your email Address");
			  email = "";
		  }
		  else
		  {
			   $("#emailerror").html("");
			   email = vall;
			/*$.ajax({
				type:'POST',
				url:'script.php',
				data:"email="+vall,
				success:function(msg){
					
					
					if(msg == 1){
						
					
					console.log(msg);
					
					
					$("#emailerror").html("email is invalid");
					email = "";
					
					}
					else if(msg == "exists")	{
						$("#emailerror").html("email is already exists");
                        email = "";
						
					}
					else if(msg == "ok"){
							$("#emailerror").html("GOOD");
							email = vall;
							
					}
				}
			});*/			
		  }
		 
	});

	$("#passwd").keyup(function(){
		 
          var vall = $(this).val();
          if(vall == "")
		  {
			  $("#passworderror").html("Please enter a new passsword");
		       passwd ="";
		  }
		  else if(vall.length < 9)
		  {
			 $("#passworderror").html("Passsword is too short!!");  
		      passwd ="";
		  }
		  
			  else
			  {
				 $("#passworderror").html("GOOD"); 
				 passwd = vall;
			  }
	
});

    $("#repasswd").keyup(function(){
		var vall = $(this).val();
		
		if(vall =="")
		{
			$("#repassworderror").html("please re-enter your passsword");
				repasswd = "";
		}
		else if(passwd !== vall)
		{
			$("#repassworderror").html("Passsword does not match");
			repasswd = "";
		}
		else {
			$("#repassworderror").html("GOOD"); 
			repasswd = vall;
			
		} 
});


	$("#male").click(function(){
			gender="male";
			$("#gendererror").html("GOOD");
	
	
});
		$("#female").click(function(){
			gender="female";
			$("#gendererror").html("GOOD");
	
});

	$("#website").keyup(function(){
			var vall = $(this).val();
				if(vall == "")
				{
					$("#websiteerror").html("please enter your website");
					website = "";
				}
					else{
						$("#websiteerror").html("GOOD");
						website = vall;
						
					}

	});
	
	$("#submitbtn").click(function(){
		if(fname== "" || email == "" || passwd == "" || repasswd == "" || gender == "")
		{
			$("#formerror").html("please check the form for errors");
		}
	else
	{
		$.ajax({
			
			type:'POST',
			url:'script.php',
			data:"fname="+fname+"&lname="+lname+"&email="+email+"&passwd="+passwd+"&gender="+gender,
			success:function(msg){
				
				if(msg == "done")
				{
				    $("#formerror").html("you are signed UP!!");
					window.location.href="login.php";
				}
				else
				{
                    $("#formerror").html("There is an error!!, please try again later");
				}
			}
			
			
			
			
			
		});
	}


})
	
});


	