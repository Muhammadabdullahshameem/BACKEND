<?php
include 'connection.php';

// Insert Class
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_class'])) {
    $class_name = $_POST['class_name'];
    $capacity = $_POST['capacity'];

    $sql = "INSERT INTO Classes (class_name, capacity) VALUES ('$class_name', '$capacity')";
    if ($conn->query($sql) === TRUE) {
        echo "New class added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Class
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_class'])) {
    $class_id = $_POST['class_id'];

    $sql = "DELETE FROM Classes WHERE class_id = $class_id";
    if ($conn->query($sql) === TRUE) {
        echo "Class deleted successfully!";
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
    <title>Manage Classes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Classes</h1>
    
    <!-- Add Class Form -->
    <h2>Add New Class</h2>
    <form method="post" action="">
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" required><br>
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required><br>
        <input type="submit" name="add_class" value="Add Class">
    </form>
    
    <!-- Delete Class Form -->
    <h2>Delete Class</h2>
    <form method="post" action="">
        <label for="class_id">Class ID:</label>
        <input type="number" id="class_id" name="class_id" required><br>
        <input type="submit" name="delete_class" value="Delete Class">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
