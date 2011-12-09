<?php

include_once '../config.php';

function get_folders($page_num, $page_size) {
    $sql = "select * from image_folders limit %s, %s";
    global $database_url;
    global $database_user;
    global $database_name;
    global $database_password;
    // printf("the connection: %s, %s, %s", $database_url, $database_user, $database_password);
    $link = mysql_connect($database_url, $database_user, $database_password);
    mysql_select_db($database_name, $link);

    $escaped_page_num = mysql_escape_string($page_num);
    $escaped_page_size = mysql_escape_string($page_size);

    $escaped_sql = sprintf($sql, $escaped_page_num, $escaped_page_size);

    $result = mysql_query($escaped_sql);

    if (!$result) {
        die('the query ' . $escaped_sql . ' was errorneous' . mysql_error($link));
    }

    $resultset = array();

    while ($row = mysql_fetch_assoc($result)) {

        $resultset[] = $row;
    }

    mysql_free_result($result);
    mysql_close($link);

    return $resultset;
}

function get_folder_by_id($folder_id) {
    $sql = "select * from image_folders where folder_id = %s";
    global $database_url;
    global $database_user;
    global $database_name;
    global $database_password;
    // printf("the connection: %s, %s, %s", $database_url, $database_user, $database_password);
    $link = mysql_connect($database_url, $database_user, $database_password);
    mysql_select_db($database_name, $link);


    $escaped_folder_id = mysql_escape_string($folder_id);

    $escaped_sql = sprintf($sql, $escaped_folder_id);

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

function get_images_by_folder_id($folder_id, $page_num, $page_size) {
    $sql = "select * from images where image_folder_id = %s limit %s, %s";
    global $database_url;
    global $database_user;
    global $database_name;
    global $database_password;

    $link = mysql_connect($database_url, $database_user, $database_password);
    mysql_select_db($database_name, $link);

    $escaped_sql = sprintf($sql, mysql_escape_string($folder_id), mysql_escape_string($page_num), mysql_escape_string($page_size));

    $result = mysql_query($escaped_sql);

    if (!$result) {
        die('the query ' . $escaped_sql . ' was errorneous' . mysql_error($link));
    }

    $resultset = array();

    while ($row = mysql_fetch_assoc($result)) {
        $resultset[] = $row;
    }

    mysql_free_result($result);
    mysql_close($link);

    return $resultset;
}

function get_image_by_id($image_id) {
    global $database_url;
    global $database_username;
    global $database_name;
    global $database_password;

    $sql = "select * from images where image_id = %s";

    $escaped_sql = sprintf($sql, mysql_escape_string($image_id));
    $link = mysql_connect($database_url, $database_username, $database_password) or die('failed to connect database' . mysql_error());
    mysql_select_db($database_name, $link) or die('failed to select database ' . $database_name . mysql_error($link));
    $result = mysql_query($escaped_sql, $link);

    if (!$result) {
        die('the query ' . $escaped_sql . ' was errorneous' . mysql_error($link));
    }

    $resultset = array();
    while ($row = mysql_fetch_assoc($result) != null) {
        $resultset[] = $row;
    }

    mysql_free_result($result);
    mysql_close($link);

    return $resultset;
}

function createNewFolder($folderName, $folderDescription) {
    global $database_url;
    global $database_user;
    global $database_name;
    global $database_password;
    
    //echo "debug\n";
    //printf("the connection: %s, %s, %s", $database_url, $database_user, $database_password);
    $folderId = -1;
    //echo $escapedSql;

    $link = mysql_connect($database_url, $database_user, $database_password) or die('failed to connect database' . mysql_error());
    mysql_select_db($database_name, $link) or die ("failed to select database" . mysql_error());

    $sql = "insert into image_folders(folder_name, description, created, modified) values('%s', '%s', NOW(), NOW())";
    $escapedSql = sprintf($sql, mysql_escape_string($folderName), mysql_escape_string($folderDescription));
    //echo $escapedSql;
    $queryResult = mysql_query($escapedSql) or die (mysql_error());
    
    if( $queryResult ) {
        $folderId = mysql_insert_id();
    }
    
    return $folderId;
}

?>
