<?php
session_start();
unset($_SESSION["user_id_web"]);
header("Location:index.php");
?>