<?php
// delete.php
include('includes/database.php');

$id = $_GET['id'];
$query = "DELETE FROM employees WHERE id = $id";
mysqli_query($conn, $query);

header('Location: index.php');
?>
