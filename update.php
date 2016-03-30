<?php
  $servername = "mysql.hostinger.co.il";
  $username = "u857564284_user";
  $password = "icosahedra";
  $dbname = "u857564284_algs";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection Failed:" . $conn->connect_error);
  }

  $id = $_POST["id"];

  $conn->query("UPDATE Algorithms SET LastAsk=CURRENT_TIMESTAMP WHERE ID=$id");
?>
