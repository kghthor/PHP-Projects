<?php
$hostname = "localhost";
$username = "effism";
$password = "admin";
$databasename = "login_page";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $databasename);

// Check connection
if (!$conn) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>
