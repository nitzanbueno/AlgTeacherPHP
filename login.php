<?php
session_start();
if(!$_SESSION["username"])
{
  $_SESSION["username"] = $_POST["username"];
  header("Location: sqlist.php");
  die();
}

?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title>Login</title>
 </head>
 <body>
   <form action="login.php" method="post">
     Username: <input type="text" name="username" /><br/>
     <button type="submit">Login</button>
   </form>
 </body>
</html>
