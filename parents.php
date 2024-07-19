<?php
include 'connection.php';

// Insert Parent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_parent'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO Parents (name, address, email, phone) VALUES ('$name', '$address', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        echo "New parent added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Parent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_parent'])) {
    $parent_id = $_POST['parent_id'];

    $sql = "DELETE FROM Parents WHERE parent_id = $parent_id";
    if ($conn->query($sql) === TRUE) {
        echo "Parent deleted successfully!";
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
    <title>Manage Parents</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Parents</h1>
    
    <!-- Add Parent Form -->
    <h2>Add New Parent</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>
        <input type="submit" name="add_parent" value="Add Parent">
    </form>
    
    <!-- Delete Parent Form -->
    <h2>Delete Parent</h2>
    <form method="post" action="">
        <label for="parent_id">Parent ID:</label>
        <input type="number" id="parent_id" name="parent_id" required><br>
        <input type="submit" name="delete_parent" value="Delete Parent">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
