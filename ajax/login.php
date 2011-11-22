<?php
header('Content-Type: application/json');

include_once '../functions/userdb.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$user = authenticate_user($email, $password);

//print_r($user);
$output = ""; 
if( is_array($user) ) {
    //print_r($user);
    $user['password'] = ""; 
    
    $_SESSION['user'] = $user;
    $user['status'] = "success";
    $output = json_encode($user);
}
else {
    
    $error = array();
    $error['status'] = "failed";
    $output = json_encode($error);
}

print $output; 
?>
