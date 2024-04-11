<?php

//error_reporting(0);
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'crud';

$connection = mysqli_connect($servername, $username, $password, $dbname);

if($connection){
    // echo 'Connection successful';
} else {
    echo 'Connection failed '.mysqli_connect_error();
}

?>