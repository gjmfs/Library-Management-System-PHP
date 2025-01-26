<?php

include "../config.php";
if(isset($_POST['submit'])){
    $adminUserName = $_POST["username"];
    $adminPassword = $_POST["password"];

    $query = "SELECT * FROM admin WHERE username='$adminUserName' AND password='$adminPassword'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        // Set a session variable to indicate successful login
        session_start(); 
        $_SESSION['isLoggedIn'] = true; // Or any other appropriate session variable name
        while($row = $result->fetch_assoc()) {
            $_SESSION['admin']=$row['username'];
            
        }
        header("Location: home.php"); 
        exit; 
    } else {
        echo "User doesn't exist";
    }
}else
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../bootstrap//dist//css/bootstrap.css">
    <script src="../bootstrap//dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../CSS//form.css">
</head>
<body class="login bg-dark text-light">
    <div class="form container">
        <div class="row row-cols-1 p-3">
            <form action="./login.php" method="post">
            <h2>Admin Login</h2>
            <div class="col" >
                <label for="user_name">User Name:</label> <br>
                <input type="text" required class="rounded" name="username">
            </div>
            <div class="col">
                <label for="password">Password: </label> <br>
                <input type="text" required class="rounded" name="password">
            </div>
            <div class="col mt-4">
                <button type="submit" class="btn btn-outline-primary" name="submit">Login</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>