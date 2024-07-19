<?php
include 'connection.php';

// Insert Teaching Assistant
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_assistant'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO TeachingAssistants (name, address, phone, class_id) VALUES ('$name', '$address', '$phone', '$class_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New teaching assistant added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Teaching Assistant
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_assistant'])) {
    $assistant_id = $_POST['assistant_id'];

    $sql = "DELETE FROM TeachingAssistants WHERE assistant_id = $assistant_id";
    if ($conn->query($sql) === TRUE) {
        echo "Teaching assistant deleted successfully!";
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
    <title>Manage Teaching Assistants</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Teaching Assistants</h1>
    
    <!-- Add Teaching Assistant Form -->
    <h2>Add New Teaching Assistant</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>
        <label for="class_id">Class ID:</label>
        <input type="number" id="class_id" name="class_id" required><br>
        <input type="submit" name="add_assistant" value="Add Teaching Assistant">
    </form>
    
    <!-- Delete Teaching Assistant Form -->
    <h2>Delete Teaching Assistant</h2>
    <form method="post" action="">
        <label for="assistant_id">Teaching Assistant ID:</label>
        <input type="number" id="assistant_id" name="assistant_id" required><br>
        <input type="submit" name="delete_assistant" value="Delete Teaching Assistant">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
