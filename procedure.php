<?php
include 'db_connect.php'; // Make sure to include your DB connection file
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Procedure</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e0f7fa, #fff3e0);
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .container {
      background: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.1);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #2c3e50;
    }
    .result {
      font-size: 18px;
      margin-top: 20px;
      color: green;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🔁 Creating Procedure...</h2>
    <div class="result">
      <?php
        // Drop the procedure if it already exists
        $conn->query("DROP PROCEDURE IF EXISTS GetFarmerOrders");

        // SQL to create a stored procedure
        $sql = "CREATE PROCEDURE GetFarmerOrders(IN farmer_id INT)
                BEGIN
                    SELECT * FROM orders WHERE farmer_id = farmer_id;
                END";

        // Execute the query to create the procedure
        if ($conn->query($sql)) {
          echo "✅ Procedure created successfully!";
        } else {
          echo "<span class='error'>❌ " . $conn->error . "</span>";
        }
      ?>
    </div>
  </div>
</body>
</html>
