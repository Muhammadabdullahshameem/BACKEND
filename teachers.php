<?php
include 'connection.php';

// Insert Teacher
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_teacher'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $annual_salary = $_POST['annual_salary'];
    $background_check = isset($_POST['background_check']) ? 1 : 0;
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO Teachers (name, address, phone, annual_salary, background_check, class_id) VALUES ('$name', '$address', '$phone', '$annual_salary', '$background_check', '$class_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New teacher added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Teacher
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_teacher'])) {
    $teacher_id = $_POST['teacher_id'];

    $sql = "DELETE FROM Teachers WHERE teacher_id = $teacher_id";
    if ($conn->query($sql) === TRUE) {
        echo "Teacher deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teachers</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Teachers</h1>
    
    <!-- Add Teacher Form -->
    <h2>Add New Teacher</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>
        <label for="annual_salary">Annual Salary:</label>
        <input type="number" id="annual_salary" name="annual_salary" step="0.01" required><br>
        <label for="background_check">Background Check:</label>
        <input type="checkbox" id="background_check" name="background_check"><br>
        <label for="class_id">Class ID:</label>
        <input type="number" id="class_id" name="class_id" required><br>
        <input type="submit" name="add_teacher" value="Add Teacher">
    </form>
    
    <!-- Delete Teacher Form -->
    <h2>Delete Teacher</h2>
    <form method="post" action="">
        <label for="teacher_id">Teacher ID:</label>
        <input type="number" id="teacher_id" name="teacher_id" required><br>
        <input type="submit" name="delete_teacher" value="Delete Teacher">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
