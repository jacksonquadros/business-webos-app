<?php
include "../../connect.php";

$file_val=$_POST['file_val'];
$file_name=$_POST['file_name'];
$file_name="'".$file_name."'";

$sql_qery="update file_manager SET f_name = $file_name where file_id = $file_val;";
$sql=$conn->query($sql_qery);


if($sql){
	echo "done";
} 
else
{
	echo "error";
}

$conn->close();

?>