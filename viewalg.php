<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alg Viewer</title>
  </head>
  <body>

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

$alg = $xml->xpath("//alg[@id=$id]")[0];
if ($alg == null) {
  die("Invalid Alg.");
}
$image = $alg->image;
$category = $alg->category;
$description = $alg->description;
$moves = $alg->moves;

echo "<img src=\"$image\" /><br/>";
echo "<b>Category:</b> $category<br/>";
echo "<b>Description:</b> $description <br/>";
echo "<b>Execution:</b> $moves";

?>

  </body>
</html>
