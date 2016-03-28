<?php
session_start();
session_unset();
session_destroy();
echo "Logged out. <br/>";
echo "<a href='login.html'>Go back</a>";
die();
 ?>
