<?php
include "connect.php";

$bg_val=$_POST['bg_sel'];
$bg_path="";
if($bg_val=="no")
{
	$sql_qery="select * from settings where set_id=1";
	$sql=$conn->query($sql_qery);


	if ($sql->num_rows > 0) {
		while($row=$sql->fetch_assoc()){
		echo $row["set_bg"];
	}

	} 
	else
	{
		
		echo "error";

	}
}
else
{
	if($bg_val=="bg1")
	{
		$bg_pat = "'images/backgrounds/bg1.png'";
	}else if($bg_val=="bg2")
	{
		$bg_pat = "'images/backgrounds/bg2.jpg'";
	}else if($bg_val=="bg3")
	{
		$bg_pat = "'images/backgrounds/bg3.png'";
	}else if($bg_val=="bg4")
	{
		$bg_pat = "'images/backgrounds/bg4.jpg'";
	}else if($bg_val=="bg5")
	{
		$bg_pat = "'images/backgrounds/bg5.png'";
	}else if($bg_val=="bg6")
	{
		$bg_pat = "'images/backgrounds/bg6.png'";
	}else if($bg_val=="bg7")
	{
		$bg_pat = "'images/backgrounds/bg7.png'";
	}else if($bg_val=="bg8")
	{
		$bg_pat = "'images/backgrounds/bg8.png'";
	}else if($bg_val=="bg9")
	{
		$bg_pat = "'images/backgrounds/bg9.png'";
	}else if($bg_val=="bg10")
	{
		$bg_pat = "'images/backgrounds/bg10.png'";
	}

	$sql_qery="update settings SET set_bg = $bg_pat where set_id = 1;";
	$sql=$conn->query($sql_qery);


	if($sql){
		
	$sql_qery="select * from settings where set_id=1";
	$sql=$conn->query($sql_qery);


	if ($sql->num_rows > 0) {
		while($row=$sql->fetch_assoc()){
		echo $row["set_bg"];
	}
	} 
	else
	{
		echo "error";
	}

		
	} 
	else
	{
		echo "error";
	}
	
}

$conn->close();

?>