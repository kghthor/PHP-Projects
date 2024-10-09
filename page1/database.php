<?php
$hostname = "localhost";
$username = "effism";
$password = "admin"; 
$databasename = "user_management";

$conn = mysqli_connect($hostname, $username, $password, $databasename);

if (!$conn) {
    die("Unable to connect to database: " . mysqli_connect_error());
}
?>
