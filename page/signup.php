<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style2.css">
    <script src="validation.js"></script>
</head>
<body>
    <div class="container">
        <form action="signup.php" method="POST" class="form" onsubmit="return validatePassword()">
            <h2 class="title">Register</h2>
            <p class="title-message">Signup now and get full access to our app.</p>
            <br>
            <label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </label>
            <label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </label>
            <label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </label>
            <label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </label>
            <label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            </label>
            <button class="submit" type="submit">Submit</button>
            <p class="sign-in">Already have an account? <a href="login.php" style="color: #43c7e8">Sign In</a></p>

            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            function validatePasswordPHP($password) {
                if (strlen($password) < 8) {
                    return "Password must be at least 8 characters long.";
                }
                if (!preg_match('/[!@#$%^&*()\-_=+{}\[\]|\\\;:\'"<>,.\/?]/', $password)) {
                    return "Password must contain at least one special character (!@#$%^&*()-_=+{}[]|\\;:'\"<>,./?)";
                }
                if (!preg_match('/[A-Z]/', $password)) {
                    return "Password must contain at least one uppercase letter.";
                }
                return true;
            }

            $errorMessage = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                $validationResult = validatePasswordPHP($password);
                if ($validationResult !== true) {
                    $errorMessage = $validationResult;
                } else if ($password !== $confirmPassword) {
                    $errorMessage = "Passwords do not match.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $conn = new mysqli("localhost", "effism", "admin", "login_page");

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $stmt = $conn->prepare("INSERT INTO user_detail (name, email, user, password) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $name, $email, $username, $hashedPassword);

                    if ($stmt->execute() === TRUE) {
                        echo "<script>alert('New record created successfully. Redirecting to login page...'); window.location.href='login.php';</script>";
                    } else {
                        $errorMessage = "Error: " . $stmt->error;
                    }

                    $stmt->close();
                    $conn->close();
                }
            }
            ?>
            <?php if (!empty($errorMessage)) : ?>
                <p style="color:red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
