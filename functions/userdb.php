<?php

include_once '../config.php';

function authenticate_user($email, $password) {
    global $user_salt;
    global $database_url;
    global $database_user;
    global $database_name;
    global $database_password;

    $decrypted_password = $user_salt . $password;
    $encoded_password = md5($decrypted_password);


    
    $sql = "select * from users where email = '%s' and password = '%s'";
    $link = mysql_connect($database_url, $database_user, $database_password);
    mysql_select_db($database_name, $link);

    $escaped_user = mysql_escape_string($email);
    $escaped_sql = sprintf($sql, $escaped_user, $encoded_password);
    //printf("%s", $encoded_password);
    //printf("%s", $escaped_sql);
    $result = mysql_query($escaped_sql);

    if (!$result) {
        die('the query ' . $escaped_sql . ' was errorneous' . mysql_error($link));
    }

    $resultset = array();

    $row = mysql_fetch_assoc($result);


    mysql_free_result($result);
    mysql_close($link);

    return $row;
}

function get_user_by_id($userid) {
    return null;
}

function save_user($email, $password) {
    return null;
}

?>
