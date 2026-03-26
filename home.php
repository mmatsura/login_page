<?php
session_start();
// Якщо пошти в сесії немає — виганяємо на головну (index.php)
if(!isset($_SESSION['email'])) {
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <h1>Вітаємо, <?php echo $_SESSION['email']; ?>!</h1>
    <a href="php/logout.php">Вийти</a>
</body>
</html>