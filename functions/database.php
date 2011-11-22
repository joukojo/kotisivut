<?php


include_once '../config.php';
$link = mysql_connect($database_url, $database_user, $database_password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($database_name);


echo 'Connected successfully';
mysql_close($link);



?>
