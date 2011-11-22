<?php
include_once '../functions/imagedb.php';

$folder_id = $_GET['folderid'];
$page = $_GET['page'];
$size = $_GET['size'];

if( $page == null || empty($page) ) {
    $page=0;
}

if($size == null || empty($size) ) {
    $size=10;
}

$start = $page * $size; 
$images = get_images_by_folder_id($folder_id, $page, $size);

echo json_encode($images);
?>
