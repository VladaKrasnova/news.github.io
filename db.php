<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'news';

$db = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);

if ($db->connect_error) {
    echo 'Errno: '.$db->connect_errno;
    echo '<br>';
    echo 'Error: '.$db->connect_error;
    exit();
}


function getSinglesById($id){
    global $db;
    $sql = "SELECT * FROM news WHERE id =".$id;
    $result = mysqli_query($db, $sql);
    $post = mysqli_fetch_assoc($result);
    return $post;
}

