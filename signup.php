<html>

    <head>
     <title>sign up</title>
	 <script src="js/jquery.js"> </script>
	 <script src="js/validation.js"> </script>
	 <link rel="stylesheet" href="css/signup_style.css" />
	 <link rel="stylesheet" href="css/bootstrap.css" />
	</head> 
        <body>

		<div class="sign_up_form">
		<div class="form_inner">
	         <input type="text" id="fname" placeholder="Frist name" /><br><span class="error"id="fnameerror"></span><br><br>
	         <input type="text" id="lname"placeholder="Last name" /><br><span class="error" id="lnameerror"></span><br><br>
             <input type="text" id="email"placeholder="Email" /><br><span class="error" id="emailerror"></span><br><br>
             <input type="password" id="passwd"placeholder="Password" /><br><span  class="error"id="passworderror"></span><br><br>
             <input type="password" id="repasswd"placeholder="Password Again" /><br><span class="error" id="repassworderror"></span><br><br>
             
			 <p style="color:white;">Male&nbsp;<input type="radio" id="male"name="gender" /> &nbsp;&nbsp;&nbsp;
             Female&nbsp;<input type="radio" id="female"name="gender" /><br><span class="error" id="gendererror"></span><br><br></p>
            
             <input type="button" id="submitbtn" value="Sign Up" /><br><span class="error" id="formerror"></span>
		</div>
	</div>

</body>


</html>