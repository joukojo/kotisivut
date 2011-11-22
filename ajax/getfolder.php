<?php
header('Content-Type: application/json');
include_once '../functions/imagedb.php';
$folderId = $_GET['folderid'];

$folder = get_folder_by_id($folderId);
echo json_encode($folder);
?>


