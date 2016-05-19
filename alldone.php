<?php
rename('main', 'index.php');
$file1 = "install.php";
if (!unlink($file1))
  {
  echo ("Error while installation");
  }
else
  {
  
  }
$file2 = "almost_done.php";
if (!unlink($file2))
  {
  echo ("Error while installation");
  }
else
  {
  
  }
$file3 = "alldone.php";
if (!unlink($file3))
  {
  echo ("Error while installation");
  }
else
  {
  
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
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
</head>
<body style="background-color:#FFA726;">
<div style="width:400px;margin:auto;text-align:center;background:#fff;padding:10px;border-radius:10px;margin-top:10%;">
<p id="logo"></p>
<i class="fa fa-check-circle-o" aria-hidden="true" style="font-size:100px;color:#8BC34A;"></i>
<h1 class="screen-reader-text">Installation Complete...</h1>
<h5>Go to <a href="index.php">main page</a></h5>
</div>
</body>
</html>
