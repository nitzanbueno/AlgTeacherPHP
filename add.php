<html>
<body>

<?php
try {

$path = "algs.xml";
$doc = new DOMDocument();
$doc->load($path);
$doc->preserveWhiteSpace = false;

$cat = $doc->createElement("category", $_POST["category"]);
$desc = $doc->createElement("description", $_POST["description"]);
$moves = $doc->createElement("moves", $_POST["alg"]);
$imagelink = $doc->createElement("image", htmlspecialchars($_POST["imagelink"]));
$lastask = $doc->createElement("last-ask", time());
$phase = $doc->createElement("phase", 1);
$id = intval($doc->documentElement->getAttribute("nextid"));
$doc->documentElement->setAttribute("nextid", $id + 1);

$algElement = $doc->createElement("alg");
$algElement->appendChild($cat);
$algElement->appendChild($desc);
$algElement->appendChild($moves);
$algElement->appendChild($imagelink);
$algElement->appendChild($lastask);
$algElement->appendChild($phase);
$algElement->setAttribute("id", $id);
$doc->documentElement->appendChild($algElement);

$doc->save($path);

echo "<h1>Algorithm added successfully.</h1>" ;


} catch (Exception $e) {

echo "<h1>Addition Failed.</h1>";

}

?>
<form action="alglist.php"><button>Back to Main Menu</button></form>
</body>
</html>
