<?php
header('content-type: application/json; charset=utf-8');
include "../connect.php";
$fold_name=$_GET['fold_name'];
$u_name=$_GET['user_id'];

$sql_qery="select * from file_manager where f_type=$fold_name and f_user=$u_name order by file_id desc";
$sql=$conn->query($sql_qery);


if ($sql->num_rows > 0) {
	while($row=$sql->fetch_assoc()){
	$output[]=$row;
}
	echo $_GET['callback'] . '('.json_encode($output).')';
} 
else
{
	
    echo 0;

}

$conn->close();

?>