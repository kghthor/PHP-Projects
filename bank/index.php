<?php
session_start();
require_once 'User.php';

$user = new User();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $user->register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['designation'], $_POST['income']);
        echo "<script>alert(Registration successful!);</script>";
    } elseif (isset($_POST['login'])) {
        $loggedInUser = $user->login($_POST['username'], $_POST['password']);
        if ($loggedInUser) {
            $_SESSION['user'] = $loggedInUser;
        } else {
            echo "<script>alert('Login Incomplete wrong password!');</script>";
        }
    } elseif (isset($_POST['credit'])) {
        $amount = $_POST['amount'];
        if ($amount > 50000) {
            echo "<script>alert('Credit limit is 50000!');</script>";
        } else {
            $user_id = $_SESSION['user']['id'];
            $balance = $_SESSION['user']['balance'] + $amount;
            $user->updateBalance($user_id, $balance);
            $user->addTransaction($user_id, $amount, 'credit');
            $_SESSION['user']['balance'] = $balance;
            echo "<script>alert('Amount credited successfully!');</script>";
        }
    } elseif (isset($_POST['debit'])) {
        $amount = $_POST['amount'];
        $reason = $_POST['reason'];
        if ($amount < 10 || $amount > 50000) {
            echo "<script>alert('Debit amount should be between 10 and 50000!');</script>";
        } elseif ($amount > $_SESSION['user']['balance']) {
            echo "<script>alert('Insufficient balance!');</script>";
        } else {
            $user_id = $_SESSION['user']['id'];
            $balance = $_SESSION['user']['balance'] - $amount;
            $user->updateBalance($user_id, $balance);
            $user->addTransaction($user_id, $amount, 'debit', $reason);
            $_SESSION['user']['balance'] = $balance;
            echo "<script>alert('Amount debited successfully!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banking System</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])): ?>
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

        <h2>Login</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    <?php else: ?>
        <h2>Welcome, <?php echo $_SESSION['user']['name']; ?></h2>
        <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
        <p>Username: <?php echo $_SESSION['user']['username']; ?></p>
        <p>Designation: <?php echo $_SESSION['user']['designation']; ?></p>
        <p>Income: <?php echo $_SESSION['user']['income']; ?></p>
        <p>Balance: <?php echo $_SESSION['user']['balance']; ?></p>

        <h2>Credit Amount</h2>
        <form method="post" action="">
            <input type="number" name="amount" placeholder="Amount" required><br>
            <button type="submit" name="credit">Credit</button>
        </form>

        <h2>Debit Amount</h2>
        <form method="post" action="">
            <input type="number" name="amount" placeholder="Amount" required><br>
            <input type="text" name="reason" placeholder="Reason" required><br>
            <button type="submit" name="debit">Debit</button>
        </form>
       <br>
        <a href="?logout=true"><button type="submit" name="debit">Logout</button></a>
    <?php endif; ?>
</body>
</html>