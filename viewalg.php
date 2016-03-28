<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alg Viewer</title>
  </head>
  <body>
<a href="alglist.php">Back</a><br/>
<?php

$path = "algs.xml";
/*$doc = new DOMDocument();
$doc->load($path);
$doc->preserveWhiteSpace = false;
$id = $_GET["id"];
$alg = $doc->getElementById($id);
echo "<img src=\"" . $alg->getElementsByTagName("image")->item(0)->nodeValue . "\" />";*/
$xml = simplexml_load_file($path) or die("Error: Cannot create object");

$id = $_GET["id"];

if ($id == null) {
  die("Invalid Alg.");
}

list($alg) = $xml->xpath("//alg[@id=$id]");
if ($alg == null) {
  die("Invalid Alg.");
}
$image = $alg->image;
$category = $alg->category;
$description = $alg->description;
$moves = $alg->moves;

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
	if ($alg->comment != null)
	{
		echo "Comment: " . $alg->comment . "<br/>"; 
	}
}

echo "<br/><br/><form action='remove.php' method='post'>
<input type='hidden' name='id' value='$id' />
<button>Remove this Alg</button>
</form>";

?>

  </body>
</html>
