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
    <title>Add Resource</title>
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../CSS/form.css">
    <script src="../../bootstrap/dist/js/bootstrap.js"></script>
    <?php
    include '../../config.php';
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $author=$_POST['authorname'];
        $isbn=$_POST['isbn'];
        $quantity=$_POST['quantity'];
        $resource_type=$_POST['resource_type'];


        $exist="select * from resource where title='$title' and author='$author'";
        $result=$connection->query($exist);
        if($result->num_rows>0){
            echo "Resource already exist";
        }else{
            $createResource="insert into resource(title,author,isbn,quantity,resource_type) values('$title','$author','$isbn','$quantity','$resource_type')";
            $result=$connection->query($createResource);
            echo "Resource Added Successfully";
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
        <h2 class="text-center mt-3 mb-3"> Resource</h2>
        <div class="mb-3">
            <label  class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Author Name:</label>
            <input type="text" name="authorname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ISBN No:</label>
            <input type="number" name="isbn" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity:</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Resource Type:</label>
            <select name="resource_type" id="resource_type" required >
                <option value="book" class="dropdown-item" type="button">Book</option>
                <option value="journal" class="dropdown-item" type="button">Journal</option>
                <option value="dvd" class="dropdown-item" type="button">DVD</option>
                <option value="ebook" class="dropdown-item" type="button">E-book</option>
                <option value="audiobook" class="dropdown-item" type="button">Audiobook</option>
            </select><br><br>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>