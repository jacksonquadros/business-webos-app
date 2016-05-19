<?php
header('content-type: application/json; charset=utf-8');
include "../connect.php";
$u_name=$_GET['user_id'];
$sql=$conn->query("select * from file_manager where f_user=$u_name order by file_id desc limit 9");

if ($sql->num_rows > 0) {
	while($row=$sql->fetch_assoc()){
	$output[]=$row;
}
	echo json_encode($output);
} 
else
{
	
    echo 0;

}

$conn->close();

?>