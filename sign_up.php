<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Sign up form</title>

    <link rel="stylesheet" href="css/login_style.css" media="screen" type="text/css" />
	<script src="js/jquery.js"> </script>
<script src="js/validation.js"> </script>
</head>
<body class="profile-login">
<header class="global-header">
<div>
<nav class="global-nav">
</nav>
</div>
</header>
  <section class="login">
	<span class="top"><i class="fa fa-user" aria-hidden="true"></i></span>
		
		<h1>Sign up</h1>
		<div class="sign_up_form">
		<div class="form_inner">
	         <input type="text" id="fname" placeholder="Frist name" /><br><span class="error"id="fnameerror"></span>
	         <input type="text" id="lname"placeholder="Last name" /><br><span class="error" id="lnameerror"></span>
             <input type="text" id="email"placeholder="Email" /><br><span class="error" id="emailerror"></span>
             <input type="password" id="passwd"placeholder="Password" /><br><span  class="error"id="passworderror"></span>
             <input type="password" id="repasswd"placeholder="Password Again" /><br><span class="error" id="repassworderror"></span>
             
			 <p style="color:white;">Male&nbsp;<input type="radio" id="male"name="gender" /> &nbsp;&nbsp;&nbsp;
             Female&nbsp;<input type="radio" id="female"name="gender" /><br><span class="error" id="gendererror"></span></p>
            
             <input type="button" id="submitbtn" value="Sign Up" /><br><span class="error" id="formerror"></span>
		</div>
	</div>
		<span class="move_left">
		<button class="button submit" data-analytics="sign-in" type="submit">Sign Up</button>
		</span>
		<span class="create-account move_left">
		<a data-analytics="create-account" href="login.php">Log in</a>
		</span>
  </section>

</body>

</html>