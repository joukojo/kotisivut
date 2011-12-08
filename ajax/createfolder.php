<?php
include_once '../functions/imagedb.php';
session_start();

$user = $_SESSION['user'];
$response = array();
if( $user ) {
    $folderName = $_POST['name'];
    $folderDesc = $_POST['desc'];
    
    $folderId = createNewFolder($folderName, $folderDesc);
    $response['status']= "success";
    $response['folderid']=$folderId;
   
}
else {
    $response['status']= "failed";
}

echo json_encode($response);
?>
