<?php
session_start();
require_once 'User.php';

$user = new User();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $loggedInUser = $user->login($_POST['username'], $_POST['password']);
    if ($loggedInUser) {
        $_SESSION['user'] = $loggedInUser;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Login Incomplete: wrong password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <br>
    <a href="register.php"><button>Register</button></a>
</body>
</html>
