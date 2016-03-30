<!DOCTYPE html>
<html>
<body>
<?php
$id = $_POST["id"];
if($id == null)
{
	die("<h1>Error removing alg.</h1>");
}

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

$conn->query("DELETE FROM Algorithms WHERE ID=$id");
$conn->close();

echo "<h1>Alg removed successfully.</h1>
<form action='alglist.php' method='get'>
<button>Go Back</button>
</form>";

?>
</body>
</html>
