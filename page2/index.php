<?php
// index.php
include('includes/database.php');

$query = "SELECT * FROM employees";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Records</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Employee Records</h1>
    <a href="add.php">Add New Employee</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Designation</th>
            <th>Salary</th>
            <th>Remark</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['company_name']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['remark']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
