<?php
include "../../connect.php";
	
$sql=$conn->query("select * from file_manager order by file_id desc limit 9");

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