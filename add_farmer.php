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

// Insert new farmer if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mobile_no = $_POST['mobile_no'];
    $address = $_POST['address'];

    $insert_sql = "INSERT INTO farmer (name, mobile_no, address) VALUES ('$name', '$mobile_no', '$address')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Farmer added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch farmers
$sql = "SELECT id, name, mobile_no, address FROM farmer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Farmers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            position: relative;
        }
        h2 {
            color: #4CAF50;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            padding: 8px;
            width: 100%;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }

        .home-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<a class="home-button" href="dashboard.php">Home</a>

<h2>Add New Farmer</h2>
<form method="POST" action="">
    <label>Farmer Name:</label>
    <input type="text" name="name" required>

    <label>Mobile No:</label>
    <input type="text" name="mobile_no" required pattern="[0-9]{10}" title="Enter 10-digit mobile number">

    <label>Address:</label>
    <textarea name="address" rows="3" required></textarea>

    <input type="submit" value="Add Farmer">
</form>

<h2>Farmer List</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mobile No</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["mobile_no"] . "</td>
                        <td>" . $row["address"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No farmers found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php $conn->close(); ?>
