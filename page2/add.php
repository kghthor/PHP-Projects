<?php
// add.php
include('includes/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $company_name = $_POST['company_name'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $remark = $_POST['remark'];

    $query = "INSERT INTO employees (name, company_name, designation, salary, remark) VALUES ('$name', '$company_name', '$designation', '$salary', '$remark')";
    mysqli_query($conn, $query);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h1>Add New Employee</h1>
    <form action="add.php" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Company Name:</label><br>
        <input type="text" name="company_name" required><br>
        <label>Designation:</label><br>
        <input type="text" name="designation" required><br>
        <label>Salary:</label><br>
        <input type="text" name="salary" required><br>
        <label>Remark:</label><br>
        <textarea name="remark"></textarea><br><br>
        <input type="submit" value="Add Employee">
    </form>
    <a href="index.php">Back to Employee Records</a>
</body>
</html>
