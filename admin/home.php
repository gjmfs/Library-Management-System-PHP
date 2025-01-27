<?php
session_start();
if(!isset($_SESSION['admin'])){
  die ("You are not logged in ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
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
            <a href="./user/menu.php" class="col">Student</a>
            <a href="./resource/menu.php" class="col">Resources</a>
            <a href="./pre-order/request.php" class="col">Requests</a>
        </div>
    </div>
</body>
</html>