<?php
include "../../connect.php";

$file_val=$_POST['file_val'];

$sql_qery="update file_manager SET f_recycle = 1 where file_id = $file_val;";
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