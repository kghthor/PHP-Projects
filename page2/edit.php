<?php
// edit.php
include('includes/database.php');

$id = $_GET['id'];
$query = "SELECT * FROM employees WHERE id = $id";
$result = mysqli_query($conn, $query);
$employee = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $company_name = $_POST['company_name'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $remark = $_POST['remark'];

    $query = "UPDATE employees SET name = '$name', company_name = '$company_name', designation = '$designation', salary = '$salary', remark = '$remark' WHERE id = $id";
    mysqli_query($conn, $query);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br>
        <label>Company Name:</label><br>
        <input type="text" name="company_name" value="<?php echo $employee['company_name']; ?>" required><br>
        <label>Designation:</label><br>
        <input type="text" name="designation" value="<?php echo $employee['designation']; ?>" required><br>
        <label>Salary:</label><br>
        <input type="text" name="salary" value="<?php echo $employee['salary']; ?>" required><br>
        <label>Remark:</label><br>
        <textarea name="remark"><?php echo $employee['remark']; ?></textarea><br><br>
        <input type="submit" value="Update Employee">
    </form>
    <a href="index.php">Back to Employee Records</a>
</body>
</html>
