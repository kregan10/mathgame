<?php
session_start();
session_destroy();
$url = "http://$_SERVER[HTTP_HOST]/Regan_Kerry_php/login.php";
header("Location: $url"); // must be absolute
exit;
?>
