<?php
include 'db_connect.php'; // Make sure this path is correct

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $mobile   = $_POST['mobile_no'];
    $address  = $_POST['address'];

    $sql = "INSERT INTO company (name, mobile_no, address)
            VALUES ('$name', '$mobile', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Company added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch all companies
$result = $conn->query("SELECT id, name, mobile_no, address FROM company");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add & Manage Companies</title>
  <style>
    body { font-family: Arial; background: #f4f7f6; padding: 20px; position: relative; }
    h2 { color: #4CAF50; }
    .home-button {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      border-radius: 5px;
    }
    form {
      background: #fff; padding: 20px; border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 30px;
    }
    input, textarea { width:100%; padding:8px; margin-bottom:15px; }
    input[type=submit] {
      background: #4CAF50; color: #fff; border:none; padding:10px 20px;
      cursor:pointer;
    }
    table {
      width:100%; border-collapse:collapse; margin-top:10px;
    }
    th, td { border:1px solid #ddd; padding:10px; }
    th { background: #4CAF50; color: #fff; }
    tr:nth-child(even){ background:#f2f2f2; }
  </style>
</head>
<body>

  <!-- Home Button -->
  <a href="dashboard.php" class="home-button">Home</a>

  <h2>Add New Company</h2>
  <form method="POST" action="">
    <label>Company Name:</label>
    <input type="text" name="name" required>

    <label>Mobile No (10 digits):</label>
    <input type="text" name="mobile_no" pattern="\d{10}" required>

    <label>Address:</label>
    <textarea name="address" rows="3" required></textarea>

    <input type="submit" value="Add Company">
  </form>

  <h2>Company List</h2>
  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th><th>Name</th><th>Mobile No</th><th>Address</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['mobile_no'] ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No companies found.</p>
  <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
