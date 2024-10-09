<?php
session_start();
require_once 'User.php';

$user = new User();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['credit'])) {
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
    $_SESSION['transactions'] = $user->getTransactions($_SESSION['user']['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banking System</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])): ?>
        <p>Please <a href="login.php">login</a> to access your account.</p>
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

        <h2>Transaction History</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Reason</th>
                <th>Date</th>
            </tr>
            <?php if (isset($_SESSION['transactions'])): ?>
                <?php foreach ($_SESSION['transactions'] as $transaction): ?>
                    <tr>
                        <td><?php echo $transaction['id']; ?></td>
                        <td><?php echo $transaction['amount']; ?></td>
                        <td><?php echo $transaction['type']; ?></td>
                        <td><?php echo $transaction['reason']; ?></td>
                        <td><?php echo $transaction['date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <br>
        <a href="?logout=true"><button>Logout</button></a>
    <?php endif; ?>
</body>
</html>
