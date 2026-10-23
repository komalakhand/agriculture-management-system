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
    $price = $_POST['price'];
    $product_id = $_POST['product_id'];
    $farmer_id = $_POST['farmer_id'];

    $insert_sql = "INSERT INTO orders (price, product_id, farmer_id) VALUES ('$price', '$product_id', '$farmer_id')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Order added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch orders
$list_sql = "SELECT order_id, price, product_id, farmer_id FROM orders";
$order_result = $conn->query($list_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .home-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        h2 {
            color: #4CAF50;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        input {
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
    <a href="dashboard.php" class="home-button">Home</a>
</div>

<h2>Add New Order</h2>
<form method="POST" action="">
    <label>Price:</label>
    <input type="number" step="0.01" name="price" required>

    <label>Product ID:</label>
    <input type="number" name="product_id" required>

    <label>Farmer ID:</label>
    <input type="number" name="farmer_id" required>

    <input type="submit" value="Add Order">
</form>

<?php if ($order_result->num_rows > 0): ?>
    <h2>Order List</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Price</th>
                <th>Product ID</th>
                <th>Farmer ID</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $order_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['order_id'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['product_id'] ?></td>
                    <td><?= $row['farmer_id'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No orders added yet.</p>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
