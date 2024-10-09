<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

function sanitizeForCSV($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeForCSV($_POST['name']);
    $email = sanitizeForCSV($_POST['email']);
    $message = sanitizeForCSV($_POST['message']);

    $csvFile = '/var/www/html/page/contacts.csv';

    $file = fopen($csvFile, 'a');

    if (!$file) {
        die("Error opening file: " . error_get_last()['message']);
    }

    fputcsv($file, array($name, $email, $message));

    fclose($file);

    echo "<p>Message sent successfully.</p>";

    header("Location: contact.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <section>
        <div class="section-header">
            <div class="container">
                <h2>Contact Us</h2>
                <p>Welcome to Our Website you are here to say a review about over product.To understand the business purpose, it is important to distinguish it from your company's vision or mission.</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Name</h4>
                            <p><?php echo htmlspecialchars($user['name']); ?></p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Email</h4>
                            <p><?php echo htmlspecialchars($user['email']); ?></p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Username</h4>
                            <p><?php echo htmlspecialchars($user['user']); ?></p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <form action="contact.php" method="POST">
                        <h2>Send Message</h2>
                        <div class="input-box">
                            <input type="text" required name="name">
                            <span>Full Name</span>
                        </div>
                        <div class="input-box">
                            <input type="email" required name="email">
                            <span>Email</span>
                        </div>
                        <div class="input-box">
                            <textarea required name="message"></textarea>
                            <span>Type your Message...</span>
                        </div>
                        <div class="input-box">
                            <input type="submit" value="Send">
                        </div>
                    </form>
                    
                </div>
                <div class="logout-btn">
        <form action="logout.php" method="POST">
            <input type="submit" value="Logout">
        </form>
    </div>
            </div>
           
        </div>
    </section>

   
</body>

</html>
