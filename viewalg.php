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

  $sql = "SELECT Alg, Image, Category, Description, Comment FROM Algorithms WHERE ID=$id";
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
  $comment = $alg["Comment"];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alg Viewer</title>
  </head>
  <body>
    <script>
      function loadDoc(cFunc) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            cFunc(xhttp);
          }
        }
        return xhttp;
      }
      function yes() {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "update.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=<?php echo addslashes($id);?>");
        document.getElementById("memo").innerHTML = "<h1>Great Job!</h1>";
      }

      function no() {
        document.getElementById("memo").innerHTML = "Execution: <b><?php echo htmlspecialchars($moves);?></b><br/>Comment: <?php echo htmlspecialchars($comment);?>";
      }

      function sure() {
        document.getElementById("remove").innerHTML = "Are you sure? <br/> \
        <table><tr><td><button onclick=\"removealg()\">Yes</button></td><td><button onclick=\"notsure()\">No</button></td></tr></table>";
      }

      function notsure() {
        document.getElementById("remove").innerHTML = "<button onclick=\"sure()\">Remove this Alg</button>";
      }

      function removealg() {
        var xhttp = loadDoc(function(x){
          document.getElementById("remove").innerHTML = x.responseText;
        });
        xhttp.open("POST", "remove.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=<?php echo addslashes($id);?>");
      }
    </script>
    <a href="alglist.php">Back</a><br/>

    <?php
      echo "<img src=\"$image\" /><br/>
      <b>Category:</b> $category<br/>
      <b>Description:</b> $description<br/>";
    ?>


    <div id="memo">
      <h1>Do you remember this alg?</h1><br/>
      <table>
        <tr>
          <td>
            <button onclick="yes()">Yes</button>
          </td>
          <td>
            <button onclick="no()">No</button>
          </td>
        </tr>
      </table>
    </div>
<br/><br/>
    <div id="remove">
      <button onclick="sure()">Remove this Alg</button>
    </div>


  </body>
</html>
