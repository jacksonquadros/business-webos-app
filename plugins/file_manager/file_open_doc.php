<?php
include "connect.php";

$file_val=$_POST['file_val'];
$file_val_name=$_POST['file_val_name'];

		$file_val=base64_decode($file_val);
		//echo $file_val;
		//$fileContent="uploads/cache/".$o_fname;
		$fileContent=$file_val_name;
		file_put_contents($fileContent,$file_val);
echo $file_val_name;
?>