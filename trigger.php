<?php
include 'db_connect.php'; 

// Handle form submission for loan insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get loan details from the form
    $loan_amount = $_POST['loan_amount'];
    $loan_date = $_POST['loan_date'];
    $loan_completion_date = $_POST['loan_completion_date'];

    // Insert loan query (without specifying loan_id)
    $insert_loan_query = "INSERT INTO loan (loan_amount, loan_date, loan_completion_date) 
                          VALUES ('$loan_amount', '$loan_date', '$loan_completion_date')";

    // Execute the insert query
    if ($conn->query($insert_loan_query) === TRUE) {
        // Get the last inserted loan_id (auto-generated)
        $loan_id = $conn->insert_id;

        echo "✅ Loan inserted successfully with ID: $loan_id<br>";

        // Fetch and display logs related to this loan
        $fetch_logs_query = "SELECT * FROM loan_log WHERE loan_id = $loan_id";
        $result = $conn->query($fetch_logs_query);

        if ($result->num_rows > 0) {
            echo "<h3>Loan Log Entries:</h3><table border='1'>
                    <tr><th>Log ID</th><th>Loan ID</th><th>Log Message</th><th>Log Time</th><th>Actions</th></tr>";
            
            // Output log entries with interactive edit/delete buttons
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['log_id'] . "</td>
                        <td>" . $row['loan_id'] . "</td>
                        <td>" . $row['log_message'] . "</td>
                        <td>" . $row['log_time'] . "</td>
                        <td>
                            <a href='edit_log.php?log_id=" . $row['log_id'] . "'>Edit</a> | 
                            <a href='delete_log.php?log_id=" . $row['log_id'] . "' onclick='return confirm(\"Are you sure you want to delete this log?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "❌ No logs found for the loan.";
        }
    } else {
        echo "❌ Error inserting loan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Insertion Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #fbc2eb, #a6c1ee);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 30px;
            color: #2c3e50;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            width: 80%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            font-weight: 600;
        }
        .error {
            color: red;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📑 Insert New Loan</h2>

    <!-- Loan Insertion Form -->
    <form method="POST" action="">
        <input type="number" name="loan_amount" placeholder="Enter Loan Amount" required><br>
        <input type="date" name="loan_date" required><br>
        <input type="date" name="loan_completion_date" required><br>
        <button type="submit">Insert Loan</button>
    </form>

    <div class="result">
        <?php
            // The loan insertion and log fetching logic is already handled above
        ?>
    </div>
</div>

</body>
</html>
