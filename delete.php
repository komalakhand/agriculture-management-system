<?php
// Include the correct database connection file
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $farmer_id = $_POST['farmer_id'];

    // Step 1: Check if the farmer exists
    $check_sql = "SELECT id FROM farmer WHERE id = '$farmer_id'";
    $check_res = $conn->query($check_sql);

    if ($check_res && $check_res->num_rows > 0) {
        // Step 2: Delete the farmer from the database
        $delete_sql = "DELETE FROM farmer WHERE id = '$farmer_id'";

        $message = $conn->query($delete_sql)
            ? "<p class='success'>✅ Farmer deleted successfully!</p>"
            : "<p class='error'>❌ Deletion failed: " . $conn->error . "</p>";
    } else {
        $message = "<p class='error'>❌ Farmer not found with ID: $farmer_id</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Farmer</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #74ebd5, #9face6);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      background: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      max-width: 450px;
      width: 100%;
      text-align: center;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 25px;
    }

    input[type="number"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 15px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background: linear-gradient(to right, #56ccf2, #2f80ed);
      color: white;
      border: none;
      font-size: 16px;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background: linear-gradient(to right, #2f80ed, #56ccf2);
    }

    .success {
      color: green;
      margin-top: 15px;
    }

    .error {
      color: red;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>❌ Delete Farmer</h2>
    <?php if (!empty($message)) echo $message; ?>
    <form method="post">
      <input type="number" name="farmer_id" placeholder="Farmer ID" required><br>
      <input type="submit" value="Delete Farmer">
    </form>
  </div>
</body>
</html>
