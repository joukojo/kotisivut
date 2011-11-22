<? 
session_start();
$user = $_SESSION['user'];

if( !$user ) {
    header('Location: ../login.php');
    return; 
}
?>

<!doctype html>
<html>
    <head>
        <? include_once 'admin-scripts-include.php'; ?>
    </head>
    <body>


        <div id="pagewidth" >
            <div id="header"><? include_once 'admin-header-include.php'; ?></div>
            <div id="wrapper" class="clearfix">
                <div id="maincol">