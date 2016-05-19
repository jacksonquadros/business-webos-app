<?php
include "connect.php";

// sql to create table
$sql1 = "CREATE TABLE IF NOT EXISTS `file_manager` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` longtext NOT NULL,
  `f_encrypt_name` longtext NOT NULL,
  `f_ext` varchar(1000) NOT NULL,
  `f_type` varchar(1000) NOT NULL,
  `f_directory` longtext NOT NULL,
  `f_date` mediumtext NOT NULL,
  `f_delete` tinyint(1) NOT NULL,
  `f_recycle` tinyint(1) NOT NULL,
  `f_user` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
)";
$sql2 = "CREATE TABLE IF NOT EXISTS `backgrounds` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_path` text NOT NULL,
  PRIMARY KEY (`bg_id`)
)";
$sql3 = "CREATE TABLE IF NOT EXISTS `now_editor` (
  `now_id` int(11) NOT NULL AUTO_INCREMENT,
  `now_file_name` text NOT NULL,
  `now_file_location` text NOT NULL,
  `now_editor_user` int(11) NOT NULL,
  PRIMARY KEY (`now_id`)
)";
$sql4 = "CREATE TABLE IF NOT EXISTS `settings` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_bg` text NOT NULL,
  `set_color` varchar(1000) NOT NULL,
  PRIMARY KEY (`set_id`)
)";
$sql5 = "CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(1000) NOT NULL,
  `user_email` text NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_gender` text NOT NULL,
  `user_date` text NOT NULL,
  `setting_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
)";
 
$sq1=$conn->query($sql1);
$sq2=$conn->query($sql2);
$sq3=$conn->query($sql3);
$sq4=$conn->query($sql4);
$sq5=$conn->query($sql5);

if ($sq1||$sq1||$sq1||$sq1||$sq1) {
    //echo "Tables created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<title>WEBOS Setup Configuration File</title>
	 <script src="js/jquery.js"> </script>
	 <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body style="background-color:#FFA726;">

	<div style="width:80%;margin:auto;background:#fff;padding:10px;border-radius:10px;margin-top:2%;">
		<div class="form_inner">
		<h1>Enter admin details...</h1>
			<div class="form-group">
				<label for="fname">User name</label>&nbsp;&nbsp;&nbsp;<span class="error"id="fnameerror"></span>
				<input type="text" id="fname" placeholder="User name" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="email">Email</label>&nbsp;&nbsp;&nbsp;<span class="error" id="emailerror"></span>
				<input type="text" id="email" placeholder="Email" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="passwd">Password</label>&nbsp;&nbsp;&nbsp;<span  class="error"id="passworderror"></span>
				<input type="password" id="passwd" placeholder="Password" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="repasswd">Retype Password</label>&nbsp;&nbsp;&nbsp;<span class="error" id="repassworderror"></span>
				<input type="password" id="repasswd" placeholder="Password Again" class="form-control"/>
			</div>
             
			 <p>
			 <label>Gender</label>&nbsp;&nbsp;&nbsp;<span class="error" id="gendererror"></span>
			 <div class="radio">
				<label>
					<input type="radio" id="male"name="gender" />
					Male
				</label>
				&nbsp;&nbsp;&nbsp;
				<label>
					<input type="radio" id="female"name="gender" />
					Female
				</label>
			 </div>
			 
			 </p>
            <button type="submit" id="submitbtn" class="btn btn-primary">Next step >></button>
            <br/><span class="error" id="formerror"></span>
		</div>
	</div>
	<script>
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
					window.location.href="alldone.php";
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


	
	</script>
</body>
</html>
