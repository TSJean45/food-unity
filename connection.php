<?php
  $db_host = 'localhost';
  $db_user = 'id19343282_root';
  $db_password = 'w\?r*Jv%1lEA^xq?';
  $db_db = 'id19343282_foodunity';
 
  $db = mysqli_connect($db_host, $db_user, $db_password, $db_db);
	
  if ($db===false) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
?>