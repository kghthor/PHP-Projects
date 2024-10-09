<?php
include("database.php");

$query = "SELECT DISTINCT user FROM user_detail";
$result = mysqli_query($conn, $query);

$usernames = array();
while ($row = mysqli_fetch_assoc($result)) {
    $usernames[] = $row;
}

echo json_encode($usernames);
?>
