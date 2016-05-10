<?php
include "connect.php";
$fold_name=$_GET['fold_name'];

$sql_qery="select * from file_manager where f_type=$fold_name and f_recycle=0 and f_delete=0 order by file_id desc";
$sql=$conn->query($sql_qery);


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