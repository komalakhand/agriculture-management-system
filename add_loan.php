<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "agriculture_management_system";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_date = $_POST['loan_date'];
    $loan_completion_date = $_POST['loan_completion_date'];
    $loan_amount = $_POST['loan_amount'];

    $insert_sql = "INSERT INTO loan (loan_date, loan_completion_date, loan_amount) VALUES ('$loan_date', '$loan_completion_date', '$loan_amount')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Loan added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch loans
$list_sql = "SELECT loan_id, loan_date, loan_completion_date, loan_amount FROM loan";
$loan_result = $conn->query($list_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Loans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
        }
        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .home-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        input, select {
            padding: 8px;
            width: 100%;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            width: auto;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="top-bar">
    <a href="dashboard.php" class="home-button">🏠 Home</a>
</div>

<h2>Add New Loan</h2>
<form method="POST" action="">
    <label>Loan Date:</label>
    <input type="date" name="loan_date" required>

    <label>Loan Completion Date:</label>
    <input type="date" name="loan_completion_date" required>

    <label>Loan Amount (₹):</label>
    <input type="number" step="0.01" name="loan_amount" required>

    <input type="submit" value="Add Loan">
</form>

<?php if ($loan_result->num_rows > 0): ?>
    <h2>Loan List</h2>
    <table>
        <thead>
            <tr>
                <th>Loan ID</th>
                <th>Loan Date</th>
                <th>Completion Date</th>
                <th>Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $loan_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['loan_id'] ?></td>
                    <td><?= $row['loan_date'] ?></td>
                    <td><?= $row['loan_completion_date'] ?></td>
                    <td><?= $row['loan_amount'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No loans added yet.</p>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
