<?php
session_start();
if($_POST["log"] == "true")
{
  $_SESSION["username"] = $_POST["username"];
  header("Location: alglist.php");
  die();
}
else
{
echo '
  <!DOCTYPE html>
  <html>
   <head>
     <meta charset="utf-8">
     <title>Login</title>
   </head>
   <body>
     <form action="login.php" method="post">
       Username: <input type="text" name="username" /><br/>
       <input type="hidden" name="log" value="true" />
       <button type="submit">Login</button>
     </form>
   </body>
  </html>';

}

?>
