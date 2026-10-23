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

// Debug: Check the contents of $_POST array
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_name']) && isset($_POST['product_type'])) {
        $name = $_POST['product_name'];
        $type = $_POST['product_type'];

        // Insert into database
        $insert_sql = "INSERT INTO product (product_name, product_type) VALUES ('$name', '$type')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "<script>alert('Product added successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Form data is missing.');</script>";
    }
}

// Fetch products
$list_sql = "SELECT product_id, product_name, product_type FROM product";
$product_result = $conn->query($list_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
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
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
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
    <a href="dashboard.php" class="home-button">Home</a>
</div>

<h2>Add New Product</h2>
<form method="POST" action="">
    <label>Product Name:</label>
    <input type="text" name="product_name" required>

    <label>Product Type:</label>
    <select name="product_type" required>
        <option value="">-- Select Type --</option>
        <option value="Fertilizer">Fertilizer</option>
        <option value="Insecticide">Insecticide</option>
        <option value="Pesticides">Pesticides</option>
    </select>

    <input type="submit" value="Add Product">
</form>

<?php if ($product_result->num_rows > 0): ?>
    <h2>Product List</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Type</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $product_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['product_id'] ?></td>
                    <td><?= $row['product_name'] ?></td>
                    <td><?= $row['product_type'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No products added yet.</p>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
