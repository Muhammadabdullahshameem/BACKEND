<?php
include 'connection.php';

// Insert Pupil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_pupil'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $medical_information = $_POST['medical_information'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO Pupils (name, address, medical_information, class_id) VALUES ('$name', '$address', '$medical_information', '$class_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New pupil added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Pupil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_pupil'])) {
    $pupil_id = $_POST['pupil_id'];

    $sql = "DELETE FROM Pupils WHERE pupil_id = $pupil_id";
    if ($conn->query($sql) === TRUE) {
        echo "Pupil deleted successfully!";
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
    <title>Manage Pupils</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Pupils</h1>
    
    <!-- Add Pupil Form -->
    <h2>Add New Pupil</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="medical_information">Medical Information:</label>
        <textarea id="medical_information" name="medical_information"></textarea><br>
        <label for="class_id">Class ID:</label>
        <input type="number" id="class_id" name="class_id" required><br>
        <input type="submit" name="add_pupil" value="Add Pupil">
    </form>
    
    <!-- Delete Pupil Form -->
    <h2>Delete Pupil</h2>
    <form method="post" action="">
        <label for="pupil_id">Pupil ID:</label>
        <input type="number" id="pupil_id" name="pupil_id" required><br>
        <input type="submit" name="delete_pupil" value="Delete Pupil">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
