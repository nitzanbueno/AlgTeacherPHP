<html>
<body>

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
    die("<h1>Addition Failed:" . $conn->connect_error . "</h1>");
}


$category = $_POST["category"];
$desc = $_POST["description"];
$alg = $_POST["alg"];
$image = $_POST["imagelink"];
$comment = $_POST["comment"];

$sql = $conn->prepare("INSERT INTO Algorithms(Username, Category, Description, Alg, Image, Comment)
VALUES (?, ?, ?, ?, ?, ?)");
if(!$sql->bind_param("ssssss", $sessioname, $category, $desc, $alg, $image, $comment))
{
  die("<h1>Addition Failed:" . $sql->errno . "</h1>");
}
if(!$sql->execute())
{
  die("<h1>Addition Failed:" . $sql->errno . "</h1>");
}

echo "<h1>Algorithm added successfully.</h1>" ;

?>
<form action="sqlist.php"><button>Back to Main Menu</button></form>
</body>
</html>
