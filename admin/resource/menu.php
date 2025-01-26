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
    <title>Resource Menu</title>
    <link rel="stylesheet" href="../../bootstrap/dist//css/bootstrap.css">
    <link rel="stylesheet" href="../../CSS/index.css">
    <script src="../../bootstrap/dist/js/bootstrap.js"></script>
</head>
<body class="bg-dark">
    <?php
        include "./nav.php";
    ?>
    <div class="index container">
    <div class=" row">
            <a href="./add.php" class="col">Add New Resource</a>
            <a href="./view.php" class="col">Available Resource </a>
        </div>
    </div>
</body>
</html>