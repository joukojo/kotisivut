<?php
header('Content-Type: application/json');
session_start();
$user = $_SESSION['user'];

print json_encode($user);

?>
