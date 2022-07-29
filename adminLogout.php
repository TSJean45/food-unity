<?php
session_start();
echo "<script>window.location.href = 'index.php';</script>";
session_destroy();

die();

?>