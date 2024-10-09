<?php
require_once 'database.php';
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $db->create($_POST['name'], $_POST['clg_name'], $_POST['designation'], $_POST['salary'], $_POST['skills']);
    } elseif (isset($_POST['update'])) {
        $db->update($_POST['id'], $_POST['name'], $_POST['clg_name'], $_POST['designation'], $_POST['salary'], $_POST['skills']);
    } elseif (isset($_POST['delete'])) {
        $db->delete($_POST['id']);
    }
}

$employees = $db->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>
    <h2>Employee Management</h2>

    <form method="post" action="">
        <h3>Add Employee</h3>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="clg_name" placeholder="College Name" required>
        <input type="text" name="designation" placeholder="Designation" required>
        <input type="number" step="0.01" name="salary" placeholder="Salary" required>
        <input type="text" name="skills" placeholder="Skills" required>
        <button type="submit" name="create">Add</button>
    </form>

    <h3>Employees List</h3>
    <?php if ($employees->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>College Name</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Skills</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $employees->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['clg_name']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['skills']; ?></td>
                    <td>
                        <form method="post" action="" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="edit">Edit</button>
                        </form>
                        <form method="post" action="" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No employees found.</p>
    <?php endif; ?>

    <?php if (isset($_POST['edit'])): ?>
        <?php $employee = $db->readSingle($_POST['id']); ?>
        <form method="post" action="">
            <h3>Edit Employee</h3>
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <input type="text" name="name" value="<?php echo $employee['name']; ?>" required>
            <input type="text" name="clg_name" value="<?php echo $employee['clg_name']; ?>" required>
            <input type="text" name="designation" value="<?php echo $employee['designation']; ?>" required>
            <input type="number" step="0.01" name="salary" value="<?php echo $employee['salary']; ?>" required>
            <input type="text" name="skills" value="<?php echo $employee['skills']; ?>" required>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>
</body>
</html>
