<?php
session_start();
require_once 'User.php';

$user = new User();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $user->register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['designation'], $_POST['income']);
    echo "<script>alert('Registration successful!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="text" name="designation" placeholder="Designation" required><br>
        <input type="number" name="income" placeholder="Income" required><br>
        <button type="submit" name="register">Register</button>
    </form>
    <br>
    <a href="login.php"><button>Login</button></a>
</body>
</html>
