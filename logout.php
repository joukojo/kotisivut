<?php
session_start();
session_unset();
session_destroy();
$user = $_SESSION['user'];

print_r($user);

?>

OK