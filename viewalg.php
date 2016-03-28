<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alg Viewer</title>
  </head>
  <body>
<a href="alglist.php">Back</a><br/>
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

$id = $_GET["id"];

if ($id == null) {
  die("Invalid Alg.");
}

$sql = "SELECT Alg, Image, Category, Description FROM Algorithms WHERE ID=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  die("Invalid Alg.");
}

$alg = $result->fetch_assoc();

if ($alg == null) {
  die("Invalid Alg.");
}
$image = $alg["Image"];
$category = $alg["Category"];
$description = $alg["Description"];
$moves = $alg["Alg"];

echo "<img src=\"$image\" /><br/>
<b>Category:</b> $category<br/>
<b>Description:</b> $description<br/>";

$remembers = $_GET["mem"];
if ($remembers != "yes" and $remembers != "no") {
	echo "<h1>Do you remember this alg?</h1><br/>
	<table>
	<tr>
	<td>
	<form action=\"viewalg.php\" method=\"get\">
	<input type='hidden' name='id' value='$id'/>
	<input type='hidden' name='mem' value='yes'/>
	<button>Yes</button>
	</form>
	</td>
	<td>
	<form action=\"viewalg.php\" method=\"get\">
	<input type='hidden' name='id' value='$id'/>
	<input type='hidden' name='mem' value='no'/>
	<button>No</button>
	</form>
	</td>
	</tr>
	</table>";
} elseif($remembers == "yes") {
	echo "<h1>Great job!</h1>";
} else {
	echo "<h1>Here it is:</br></h1>Execution: $moves<br/>";
	if ($alg["comment"] != null)
	{
		echo "Comment: " . $alg["Comment"] . "<br/>";
	}
}

echo "<br/><br/><form action='remove.php' method='post'>
<input type='hidden' name='id' value='$id' />
<button>Remove this Alg</button>
</form>";

?>

  </body>
</html>
