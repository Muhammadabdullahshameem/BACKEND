<?php
include 'connection.php';

// Fetch data from all tables
$classes_result = $conn->query("SELECT * FROM Classes");
$pupils_result = $conn->query("SELECT * FROM Pupils");
$parents_result = $conn->query("SELECT * FROM Parents");
$teachers_result = $conn->query("SELECT * FROM Teachers");
$assistants_result = $conn->query("SELECT * FROM TeachingAssistants");
$salaries_result = $conn->query("SELECT * FROM Salaries");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tab {
            margin: 20px 0;
        }
        .tab button {
            background-color: #f1f1f1;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .tab button.active {
            background-color: #ccc;
        }
        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
    <script>
        function openTab(tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";  
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";  
            event.currentTarget.className += " active";
        }
    </script>
</head>
<body>
    <h1>View Data</h1>
    
    <div class="tab">
        <button class="tablink" onclick="openTab('Classes')">Classes</button>
        <button class="tablink" onclick="openTab('Pupils')">Pupils</button>
        <button class="tablink" onclick="openTab('Parents')">Parents</button>
        <button class="tablink" onclick="openTab('Teachers')">Teachers</button>
        <button class="tablink" onclick="openTab('Assistants')">Teaching Assistants</button>
        <button class="tablink" onclick="openTab('Salaries')">Salaries</button>
    </div>

    <!-- Classes Tab -->
    <div id="Classes" class="tabcontent">
        <h2>Classes</h2>
        <table>
            <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Capacity</th>
            </tr>
            <?php
            if ($classes_result->num_rows > 0) {
                while ($row = $classes_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['class_id']}</td>
                            <td>{$row['class_name']}</td>
                            <td>{$row['capacity']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Pupils Tab -->
    <div id="Pupils" class="tabcontent">
        <h2>Pupils</h2>
        <table>
            <tr>
                <th>Pupil ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Medical Information</th>
                <th>Class ID</th>
            </tr>
            <?php
            if ($pupils_result->num_rows > 0) {
                while ($row = $pupils_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['pupil_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['medical_information']}</td>
                            <td>{$row['class_id']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Parents Tab -->
    <div id="Parents" class="tabcontent">
        <h2>Parents</h2>
        <table>
            <tr>
                <th>Parent ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php
            if ($parents_result->num_rows > 0) {
                while ($row = $parents_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['parent_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Teachers Tab -->
    <div id="Teachers" class="tabcontent">
        <h2>Teachers</h2>
        <table>
            <tr>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Annual Salary</th>
                <th>Background Check</th>
                <th>Class ID</th>
            </tr>
            <?php
            if ($teachers_result->num_rows > 0) {
                while ($row = $teachers_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['teacher_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['annual_salary']}</td>
                            <td>" . ($row['background_check'] ? 'Yes' : 'No') . "</td>
                            <td>{$row['class_id']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Teaching Assistants Tab -->
    <div id="Assistants" class="tabcontent">
        <h2>Teaching Assistants</h2>
        <table>
            <tr>
                <th>Assistant ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Class ID</th>
            </tr>
            <?php
            if ($assistants_result->num_rows > 0) {
                while ($row = $assistants_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['assistant_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['class_id']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Salaries Tab -->
    <div id="Salaries" class="tabcontent">
        <h2>Salaries</h2>
        <table>
            <tr>
                <th>Salary ID</th>
                <th>Employee ID</th>
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
            <?php
            if ($salaries_result->num_rows > 0) {
                while ($row = $salaries_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['salary_id']}</td>
                            <td>{$row['employee_id']}</td>
                            <td>{$row['amount']}</td>
                            <td>{$row['payment_date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        // Open the default tab (Classes)
        document.getElementsByClassName("tablink")[0].click();
    </script>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
