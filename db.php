<?php

$servername = "localhost";
$username = "root";
$dbpassword = "";
$db = "dlsud";

// Create connection
$con = mysqli_connect($servername, $username, $dbpassword,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>