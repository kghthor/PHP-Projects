<?php
session_start();
include("database.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['upload'])) {
    $image_dir = 'uploads/images/';
    $pdf_dir = 'uploads/pdfs/';
    
    if (!empty($_FILES['user_image']['name'])) {
        $image_path = $image_dir . basename($_FILES['user_image']['name']);
        if (move_uploaded_file($_FILES['user_image']['tmp_name'], $image_path)) {
            echo "Image uploaded successfully.";
        } else {
            echo "Failed to upload image.";
        }
    }

    if (!empty($_FILES['user_pdf']['name'])) {
        $pdf_path = $pdf_dir . basename($_FILES['user_pdf']['name']);
        if (move_uploaded_file($_FILES['user_pdf']['tmp_name'], $pdf_path)) {
            echo "PDF uploaded successfully.";
        } else {
            echo "Failed to upload PDF.";
        }
    }

    $query = "UPDATE users SET image_path = IFNULL('$image_path', image_path), pdf_path = IFNULL('$pdf_path', pdf_path) WHERE id = $user_id";
    mysqli_query($conn, $query);
}

if (isset($_GET['delete'])) {
    $file = $_GET['delete'];
    $file_type = pathinfo($file, PATHINFO_EXTENSION);

    // Determine the file type based on the file extension
    if ($file_type === 'pdf') {
        $pdf_path = 'uploads/pdfs/' . basename($file);
        if (file_exists($pdf_path)) {
            unlink($pdf_path);
            $query = "UPDATE users SET pdf_path = NULL WHERE id = $user_id";
            mysqli_query($conn, $query);
        }
    } else {
        $image_path = 'uploads/images/' . basename($file);
        if (file_exists($image_path)) {
            unlink($image_path);
            $query = "UPDATE users SET image_path = NULL WHERE id = $user_id";
            mysqli_query($conn, $query);
        }
    }

    header("Location: dashboard.php");
    exit();
}

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        iframe { width: 100%; height: 500px; border: none; }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

    <form action="dashboard.php" method="post" enctype="multipart/form-data">
        <label>Upload Image:</label>
        <input type="file" name="user_image" accept="image/*"><br>
        <label>Upload PDF:</label>
        <input type="file" name="user_pdf" accept="application/pdf"><br>
        <input type="submit" name="upload" value="Upload">
    </form>

    <?php if ($user['image_path']): ?>
    <h2>Your Image:</h2>
    <img src="<?php echo $user['image_path']; ?>" width="200"><br>
    <a href="?delete=<?php echo urlencode(basename($user['image_path'])); ?>">Delete Image</a>
    <?php endif; ?>
    <?php if ($user['pdf_path']): ?>
    <h2>Your PDF:</h2>
    <iframe src="<?php echo $user['pdf_path']; ?>" type="application/pdf" style="width: 40%; height: 600px; border: none;"></iframe><br>
    <a href="?delete=<?php echo urlencode(basename($user['pdf_path'])); ?>">Delete PDF</a>
<?php endif; ?>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
