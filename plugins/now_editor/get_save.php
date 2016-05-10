<?php
header('content-type: application/json; charset=utf-8');

include "connect.php";

	$sql=$conn->query("select * from now_editor where now_id = 1");
	while($row = $sql->fetch_assoc()) {
		$output[]=$row;
    }
	echo json_encode($output);

$conn->close();
?>