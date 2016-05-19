<?php
header('content-type: application/json; charset=utf-8');
include "../connect.php";
$fold_u=$_GET['UserName'];
$fold_p=$_GET['Password'];
$fold_p=md5($fold_p);
$sql_qery="select * from users where user_name='$fold_u' and user_password='$fold_p'";
$sql=$conn->query($sql_qery);


if ($sql->num_rows > 0) {
	while($row=$sql->fetch_assoc()){
	echo $row["user_id"];
}
} 
else
{
 echo "Failed";
}

$conn->close();

?>