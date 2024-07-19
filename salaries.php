<?php
include 'connection.php';

// Insert Salary
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_salary'])) {
    $employee_id = $_POST['employee_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];

    $sql = "INSERT INTO Salaries (employee_id, amount, payment_date) VALUES ('$employee_id', '$amount', '$payment_date')";
    if ($conn->query($sql) === TRUE) {
        echo "New salary record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Salary
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_salary'])) {
    $salary_id = $_POST['salary_id'];

    $sql = "DELETE FROM Salaries WHERE salary_id = $salary_id";
    if ($conn->query($sql) === TRUE) {
        echo "Salary record deleted successfully!";
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
    <title>Manage Salaries</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Salaries</h1>
    
    <!-- Add Salary Form -->
    <h2>Add New Salary Record</h2>
    <form method="post" action="">
        <label for="employee_id">Employee ID:</label>
        <input type="number" id="employee_id" name="employee_id" required><br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br>
        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" required><br>
        <input type="submit" name="add_salary" value="Add Salary Record">
    </form>
    
    <!-- Delete Salary Form -->
    <h2>Delete Salary Record</h2>
    <form method="post" action="">
        <label for="salary_id">Salary ID:</label>
        <input type="number" id="salary_id" name="salary_id" required><br>
        <input type="submit" name="delete_salary" value="Delete Salary Record">
    </form>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
