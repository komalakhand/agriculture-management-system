<?php
include 'db_connect.php'; // Include the database connection

// Function to fetch and display records in a table (without Actions column)
function display_table($query, $columns) {
    global $conn;
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($conn) . "</p>";
        return;
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' style='width: 100%; border-collapse: collapse;'>
                <thead>
                    <tr>";
        foreach ($columns as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr></thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>" . $row[$column] . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No records found.</p>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entity = $_POST['entity'];
    echo "<h2>Displaying records for: $entity</h2>";

    if ($entity == 'company') {
        $query = "SELECT * FROM company";
        $columns = ['id', 'name', 'mobile_no', 'address'];
    } elseif ($entity == 'farmer') {
        $query = "SELECT * FROM farmer";
        $columns = ['id', 'name', 'mobile_no', 'address'];
    } elseif ($entity == 'loan') {
        $query = "SELECT * FROM loan";
        $columns = ['loan_id', 'loan_date', 'loan_completion_date', 'loan_amount'];
    } elseif ($entity == 'product') {
        $query = "SELECT * FROM product";
        $columns = ['product_id', 'product_name', 'product_type'];
    } elseif ($entity == 'orders') {
        $query = "SELECT * FROM orders";
        $columns = ['order_id', 'price', 'product_id', 'farmer_id'];
    } else {
        echo "Invalid table selected.";
        exit;
    }

    display_table($query, $columns);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <style>
        body {
            background: #f0fdf4;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
        }
        .form-container {
            background: #e3f9e5;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            width: 500px;
            margin-bottom: 30px;
        }
        h2 {
            color: #1b4332;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #081c15;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #81b29a;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #2d6a4f;
            color: white;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>View Table Records</h2>
    <form method="POST">
        <label for="entity">Select Table</label>
        <select name="entity" id="entity">
            <option value="company">Company</option>
            <option value="farmer">Farmer</option>
            <option value="loan">Loan</option>
            <option value="product">Product</option>
            <option value="orders">Orders</option>
        </select>
        <br><br>
        <button type="submit" style="padding: 10px; background: #2d6a4f; color: white; border: none; border-radius: 6px;">View Records</button>
    </form>
</div>

</body>
</html>
