<?php
if(count($_POST)>0) {
$db_name=$_POST["dbname"];
$db_uname=$_POST["uname"];
$db_pass=$_POST["pwd"];
$db_host=$_POST["dbhost"];
$db_domain=$_POST["domain"];

$myfile = fopen("connect.php", "w") or die("Unable to open file!");
$txt = '<?php $main_path="'.$db_domain.'"; $servername = "'.$db_host.'"; $username = "'.$db_uname.'"; $password = "'.$db_pass.'"; $dbname = "'.$db_name.'";$conn = new mysqli($servername, $username, $password, $dbname);if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } ?>';
fwrite($myfile, $txt);
fclose($myfile);
header("Location:almost_done.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<title>WEBOS Setup Configuration File</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body style="background-color:#FFA726;">
<p id="logo"></p>

<form method="post" action="install.php" style="width:80%;margin:auto;background:#fff;padding:10px;border-radius:10px;margin-top:2%;">
<h1 class="screen-reader-text">Set up your database connection</h1>
	<p>Below you should enter your database connection details. If you&#8217;re not sure about these, contact your host.</p>
	<div class="form-group">
		<label for="dbname">Database Name</label>
		<input name="dbname" id="dbname" class="form-control" type="text" placeholder="The name of the database you want to use with WEBOS."/>
	</div>
	<div class="form-group">
		<label for="uname">Username</label>
		<input name="uname" id="uname" class="form-control" type="text" size="25" value="" placeholder="Your database username."/>
	</div>
	<div class="form-group">
		<label for="pwd">Password</label>
		<input name="pwd" id="pwd" class="form-control" type="text" size="25" value="" autocomplete="off" placeholder="Your database password."/>	
	</div>
	<div class="form-group">
		<label for="dbhost">Database Host</label>
		<input name="dbhost" id="dbhost" class="form-control" type="text" size="25" placeholder="You should be able to get this info from your web host, if localhost doesn&#8217;t work."/>	
	</div>
	<div class="form-group">
		<label for="domain">Enter your domain name</label>
		<input name="domain" id="domain" class="form-control" type="text" size="25" value="" placeholder="Provide your work domain like http://www.example.com/"/>
	</div>
	<input type="hidden" name="language" value="" />
	<p class="step">
	<button type="submit" class="btn btn-primary">Next step >></button>
	</p>
</form>
</body>
</html>
