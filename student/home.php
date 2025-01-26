<?php
session_start();
if(!isset($_SESSION['student'])){
  die ("You are not logged in ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body class="bg-dark">
    <?php
    include "./nav.php";
    ?>
    <div class="index container">
    <div class=" row">
            <a href="./pre-order.php" class="col">Place an Order</a>
            <a href="./history.php" class="col">Booked History</a>
        </div>
    </div>
</body>
</html>