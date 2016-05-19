<?php
include "connect.php";

if(mysqli_connect_errno())
{
	echo "database error";
}
/*else
{
	echo "connection ok";
}*/
if(isset($_POST['email']) && !isset($_POST['fname']))
{
  $email = $_POST['email'];	
  
  $email = mysqli_real_escape_string($conn, $email);
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
			echo 1;
	}
	else{
		//echo "email is valid";
				$result = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
				if(mysqli_num_rows($result) == 1)
				{
					echo "exists";
					
				}
		else {
			echo "ok";
		}
	}	
}




if(isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['gender']))
{
	 $fname = mysqli_real_escape_string($conn, $_POST['fname']);
	 
	 $email = mysqli_real_escape_string($conn, $_POST['email']);
	 $passwd = md5(mysqli_real_escape_string($conn, $_POST['passwd']));
	 $gender = mysqli_real_escape_string($conn, $_POST['gender']);
	 $date = date("d, F Y");
	 
	 $query1 = "INSERT INTO settings (set_bg,set_color) VALUES ('images/backgrounds/bg1.png','#cccccc')";
	 $done=mysqli_query($conn, $query1);
	 $set_id = mysqli_insert_id($conn);
	 if($done)
	 {
		$query = "INSERT INTO users (user_name,user_email,user_password,user_gender,user_date,setting_id) VALUES ('$fname','$email','$passwd','$gender','$date',$set_id)";
		 if(mysqli_query($conn, $query))
		 {
			 echo "done";
		 }
		 else
		 {
			 echo "error";
		 }
	 }
	 else
	 {
		 echo "error";
	 }
}





?>
