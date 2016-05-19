<?php
header('content-type: application/json; charset=utf-8');

include "../../connect.php";
//get post data
$data_now = "'".$_POST['content_edit']."'";


$targetPath = "files/test.txt"; 
$fileContent = $_POST['content_edit'];
//echo $fileContent;

file_put_contents($targetPath,$fileContent);

//inserting data order

$order = "update now_editor SET now_content = $data_now where now_id = 1;";
//declare in the order variable
$result = $conn->query($order);

$last_id = mysqli_insert_id($conn);

if($result){
	
	$sql=$conn->query("select * from now_editor where now_id = 1");
	while($row = $sql->fetch_assoc()) {
		$output[]=$row;
    }
	echo json_encode($output);

} else{

    echo "something went wrong";

}
$conn->close();
?>