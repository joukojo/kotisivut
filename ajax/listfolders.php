<?
header('Content-Type: application/json');
include_once '../functions/imagedb.php';
?>
<?php
$arr = get_folders(0, 50);

echo json_encode($arr);
?>


