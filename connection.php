<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'foodunity';
 
  $db = mysqli_connect($db_host, $db_user, $db_password, $db_db);
	
  if ($db===false) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
?>