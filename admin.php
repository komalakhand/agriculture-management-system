<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h2>Hello Admin, welcome to the Admin Page.</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
