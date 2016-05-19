<?php
include "connect.php";
session_start();
$uid=$_SESSION['user_id_web'];
echo '[{"usr":"'.$uid.'","link":"'.$main_path.'"}]';
?>