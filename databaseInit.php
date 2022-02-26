<?php
//initializes database, this should be included in all files needing database access
//and this file should be changed when database needs to be updated
$db_host = 'localhost';
$db_user= 'root';
$db_password='root';
$db_db = 'commsimple';
$db_port = '8889';

$mysqli = new mysqli( 
    $db_host,
    $db_user,
    $db_password,
    $db_db
);

if($mysqli ->connect_error){//access database and load into $mysqli
    echo "errno: ".$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}
?>