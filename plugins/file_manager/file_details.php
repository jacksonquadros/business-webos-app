<?php
include "../../connect.php";

$file_val=$_POST['file_val'];

$sql_qery="select * from file_manager where file_id=$file_val";
$sql=$conn->query($sql_qery);


if ($sql->num_rows > 0) {
	while($row=$sql->fetch_assoc()){
	$output[]=$row;
}
	echo json_encode($output);

} 
else
{
	
    echo "something went wrong";

}

$conn->close();

?>