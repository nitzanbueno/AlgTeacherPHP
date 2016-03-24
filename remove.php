<html>
  <head>
    <meta charset="utf-8">
    <title>Remove Alg</title>
  </head>
  <body>

<?php
$id = $_POST["id"];
if($id == null)
{
	die("<h1>Error removing alg.</h1>");
}

if($_POST["sure"] != "yes")
{
	echo "<h1>Are you sure?</h1><br/>
	<table>
	<tr>
	<td>
	<form action='remove.php' method='post'>
	<input type='hidden' name='id' value='$id'/>
	<input type='hidden' name='sure' value='yes'/>
	<button>Yes</button>
	</form>
	</td>
	<td>
	<form action='viewalg.php' method='get'>
	<input type='hidden' name='id' value='$id'/>
	<button>No</button>
	</form>
	</td>
	</tr>
	</table>";
}
else
{
	$doc = new DOMDocument();
	$doc->load("algs.xml");
	$alg = $doc->getElementById($id);
	$alg->parentNode->removeChild($alg);
	$doc->save("algs.xml");
	echo "<h1>Alg removed successfully.</h1>
	<form action='alglist.php' method='get'>
	<button>Go Back</button>
	</form>";
}
?>
</body>
</html>