<?php
include "connect.php";
session_start();
$message="";
if(count($_POST)>0) {
$sql = "select * FROM users WHERE user_name='" . $_POST["email"] . "' and user_password = '".$_POST["password"]."'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$_SESSION["user_id_web"] = $row["user_id"];
    }
} else {
    $message = "Invalid Username or Password!";
}
$conn->close();
}

if(isset($_SESSION["user_id_web"])) {
header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in form</title>

    <link rel="stylesheet" href="css/login_style.css" media="screen" type="text/css" />

</head>
<body class="profile-login">
<header class="global-header">
<div>
<nav class="global-nav">
</nav>
</div>
</header>
  <section class="login">
	<form name="frmUser" method="post" action="">
	<span class="top"></span>
		<form id="login-form" accept-charset="utf-8" method="post" action="#">
		<h1>Log in</h1>
		<input type="text" value="" placeholder="Username" tabindex="20" name="email">
		  <div class="password-container">
		<input type="password" placeholder="Password" tabindex="21" name="password">
		
		</div>
		<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<span class="move_left">
		<button class="button submit" data-analytics="sign-in" type="submit">Log in Now</button>
		</span>
		<!--<span class="create-account move_left">
		<a data-analytics="create-account" href="sign_up.php">Create an Account</a>
		</span>-->
	</form>	
  </section>

</body>

</html>