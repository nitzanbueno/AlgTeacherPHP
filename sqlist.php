<?php
session_start();
 ?>

<html>
  <head>
    <style>
      .cases{
        width: 500px
      }
    </style>
  </head>
  <body>
    <h2>Alg Teacher</h2>
    <form action="addalgdb.html">
      <input type="submit" value="Add an Alg" />
    </form>
    <form action="logout.php">
      <input type="submit" value="Log Out" />
    </form>
    <div class="cases">
      <?php

$sessioname = $_SESSION["username"];
if(!$sessioname)
{
  $sessioname = "default";
}

$servername = "mysql.hostinger.co.il";
$username = "u857564284_user";
$password = "icosahedra";
$dbname = "u857564284_algs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, Image FROM Algorithms WHERE Username='" . $sessioname . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id = $row["ID"];
      $image = $row["Image"];
      echo "<a href=\"viewalg.php?id=$id\"><img src=\"$image\" /> </a>";
    }
} else {
    echo "0 results";
}
$conn->close();
       ?>
    </div>
  </body>
</html>
