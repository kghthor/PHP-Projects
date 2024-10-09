<?php
// includes/database.php

$hostname = "localhost";
$username = "effism";
$password = "admin";
$databasename = "company_db";

$conn = mysqli_connect($hostname, $username, $password, $databasename);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
