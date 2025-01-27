<?php
session_start();
if(!isset($_SESSION['admin'])){
    die ("You are not logged in ");
}
// Database connection
include '../../config.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $username=$_SESSION['admin'];
    // Prepare the SQL statement to prevent SQL injection
    $sql="select * from admin where username='$username' ";
    $check=$connection->query($sql);
    if($check->num_rows>0){
        $resut= $connection->query("DELETE FROM pre_order WHERE req_id = '$id'");
    }else{
        echo "You're not logged in yet";
    }
    
    
}

$connection->close();

// Redirect back to the main page
header("Location: ./request.php");
exit();
?>