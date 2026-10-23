<?php
include 'db_connect.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "agriculture_management_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Krishna Krushi Kendra Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(to right, #e0ffe0, #f0fff0);
      padding: 40px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      font-size: 32px;
      color: #2f5233;
      margin-bottom: 30px;
      animation: fadeIn 1s ease-in-out;
    }

    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      width: 100%;
      max-width: 1000px;
      margin-bottom: 40px;
    }

    .card {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 25px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card i {
      font-size: 28px;
      color: #2d6a4f;
      margin-bottom: 10px;
    }

    .card span {
      display: block;
      font-size: 18px;
      font-weight: bold;
      color: #2d6a4f;
    }

    .logout-btn {
      padding: 12px 25px;
      background: #dc3545;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 20px;
    }

    .logout-btn:hover {
      background: #339e4b;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <h1>Welcome to Krishna Krushi Kendra</h1>

  <div class="dashboard">
    <div class="card" onclick="location.href='add_farmer.php'">
      <i class="fas fa-user-plus"></i>
      <span>Add Farmer</span>
    </div>
    <div class="card" onclick="location.href='add_product.php'">
      <i class="fas fa-plus-circle"></i>
      <span>Add Product</span>
    </div>
    <div class="card" onclick="location.href='add_company.php'">
      <i class="fas fa-building"></i>
      <span>Add Company</span>
    </div>
    <div class="card" onclick="location.href='add_order.php'">
      <i class="fas fa-cart-plus"></i>
      <span>Add Order</span>
    </div>
    <div class="card" onclick="location.href='add_loan.php'">
      <i class="fas fa-piggy-bank"></i>
      <span>Add Loan</span>
    </div>
    <div class="card" onclick="location.href='update.php'">
      <i class="fas fa-pen-to-square"></i>
      <span>Update</span>
    </div>
    <div class="card" onclick="location.href='delete.php'">
      <i class="fas fa-trash-alt"></i>
      <span>Delete</span>
    </div>
    <div class="card" onclick="location.href='view.php'">
      <i class="fas fa-eye"></i>
      <span>View</span>
    </div>
    <div class="card" onclick="location.href='trigger.php'">
      <i class="fas fa-bolt"></i>
      <span>Trigger</span>
    </div>
    <div class="card" onclick="location.href='procedure.php'">
      <i class="fas fa-gears"></i>
      <span>Procedure</span>
    </div>
  </div>

  <button class="logout-btn" onclick="window.location.href='login.php'">
    <i class="fas fa-sign-out-alt"></i> Logout
  </button>

</body>
</html>
