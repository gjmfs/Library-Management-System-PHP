<?php
session_start();
if(!isset($_SESSION['username'])){
    die ("You are not logged in ");
}
// Database connection
include '../../config.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $username=$_SESSION['username'];
    // Prepare the SQL statement to prevent SQL injection
    $sql="select * from admin where username='$username' ";
    $check=$connection->query($sql);
    if($check->num_rows>0){
        $resut= $connection->query("DELETE FROM student WHERE s_id = '$id'");
        echo "student account removed successfully";
    }else{
        echo "You're not logged in yet";
    }
    
    
}

$connection->close();

// Redirect back to the main page
header("Location: ./view.php");
exit();
?>