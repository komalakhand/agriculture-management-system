<?php
session_start();
include 'db_connect.php';

$error = "";

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare and run SQL query safely
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;

        // Redirect to proper page
        if ($username === "Komal") {
            header("Location: dashboard.php");
        } elseif ($username === "Admin") {
            header("Location: Admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css"> 
    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 30%;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required>
        
        <label for="password">Password</label>
        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>
        
        <button type="submit">Login</button>
    </form>
</div>

<script>
function togglePassword() {
    const pwd = document.getElementById("password");
    pwd.type = pwd.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
