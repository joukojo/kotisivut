<?
header('Content-Type: application/json');
header('Cache-Control: public,max-age=900');
include_once '../functions/imagedb.php';
?>
<?php
$arr = get_folders(0, 50);

echo json_encode($arr);
?>


