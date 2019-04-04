<?php

/*
$db_host = getenv('JAWSDB_HOST');
$db_port = getenv('JAWSDB_PORT');
$db_user = getenv('JAWSDB_USERNAME');
$db_databse = getenv('JAWSDB_DATABASE');
$db_password = getenv('JAWSDB_PASS');
*/

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_DATABASE', 'it-challenge');
define('DB_PASS', '');

//$mysqli = mysqli_connect($db_host . ":" . $db_port, $db_user, $db_password, $db_database);
$mysqli = mysqli_connect(DB_HOST . ":" . DB_PORT, DB_USER, DB_PASS, DB_DATABASE);
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
}
