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
    <title>Create Student Account</title>
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../CSS/form.css">
    <script src="../../bootstrap/dist/js/bootstrap.js"></script>
    <?php
    include '../../config.php';
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $grade=$_POST['grade'];
        $password=$_POST['password'];
       


        $exist="select * from student where name='$name' and password='$password'";
        $result=$connection->query($exist);
        if($result->num_rows>0){
            echo "Student already exist";
        }else{
            $createStudent="insert into student(name,grade,password) values('$name','$grade','$password')";
            $result=$connection->query($createStudent);
            echo "Student Account Create Successfully";
        }
    }
    ?>
</head>
<body>
    <?php
        include "./nav.php";
    ?>
    <div class="container">
    <form action='./add.php' method="POST">
        <h2 class="text-center mt-3 mb-3"> Student</h2>
        <div class="mb-3">
            <label  class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Grade:</label>
            <input type="text" name="grade" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>