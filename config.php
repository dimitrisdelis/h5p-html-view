<?php
// Database credentials. 
define('DB_SERVER', 'localhost');
define('DB_username', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'h5p');
// Attempt to connect to MySQL database 
$link = mysqli_connect(DB_SERVER, DB_username, DB_PASSWORD, DB_NAME);
    // Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
	
// Change character set to utf8
mysqli_set_charset($link,"utf8");

?>