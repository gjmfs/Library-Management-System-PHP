<?php
// Include your database connection file
include '../config.php';

// Get data from the form
$resource_id = $_POST['resource_id'];
$resource_title = $_POST['resource_title'];
$resource_author = $_POST['resource_author'];
$resource_isbn = $_POST['resource_isbn'];
$resource_type = $_POST['resource_type'];
session_start();
// Get user information (replace with your user authentication logic)
$user_id = $_SESSION['stu-id']; 

// Insert pre-order data into the database
$sql = "INSERT INTO pre_order (user_id, resource_id, resource_title, resource_author, resource_isbn, resource_type) 
        VALUES ('$user_id', '$resource_id', '$resource_title', '$resource_author', '$resource_isbn', '$resource_type')";

if ($connection->query($sql) === TRUE) {
    echo "Pre-order placed successfully!";
    header("Location: ./pre-order.php");
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>