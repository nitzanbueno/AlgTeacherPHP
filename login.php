<?php
session_start();
$_SESSION["username"] = $_POST["username"];

header("Location: sqlist.php");
die();

 ?>
