<?php
include 'connection.php';

// Insert Pupil-Parent Relationship
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_relationship'])) {
    $pupil_id = $_POST['pupil_id'];
    $parent_id = $_POST['parent_id'];

    $sql = "INSERT INTO Pupil_Parents (pupil_id, parent_id) VALUES ('$pupil_id', '$parent_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Pupil-Parent relationship added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Pupil-Parent Relationship
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_relationship'])) {
    $pupil_id = $_POST['pupil_id'];
    $parent_id = $_POST['parent_id'];

    $sql = "DELETE FROM Pupil_Parents WHERE pupil_id = $pupil_id AND parent_id = $parent_id";
    if ($conn->query($sql) === TRUE) {
        echo "Pupil-Parent relationship deleted successfully!";
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
    <title>Manage Pupil-Parent Relationships</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Pupil-Parent Relationships</h1>
    
    <!-- Add Pupil-Parent Relationship Form -->
    <h2>Add New Pupil-Parent Relationship</h2>
    <form method="post" action="">
        <label for="pupil_id">Pupil ID:</label>
        <input type="number" id="pupil_id" name="pupil_id" required><br>
        <label for="parent_id">Parent ID:</label>
        <input type="number" id="parent_id" name="parent_id" required><br>
        <input type="submit" name="add_relationship" value="Add Relationship">
    </form>
    
    <!-- Delete Pupil-Parent Relationship Form -->
    <h2>Delete Pupil-Parent Relationship</h2>
    <form method="post" action="">
        <label for="pupil_id">Pupil ID:</label>
        <input type="number" id="pupil_id" name="pupil_id" required><br>
        <label for="parent_id">Parent ID:</label>
        <input type="number" id="parent_id" name="parent_id" required><br>
        <input type="submit" name="delete_relationship" value="Delete Relationship">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
