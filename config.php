<?php
    $server="localhost";
    $dbusername="root";
    $dbpassword="root";
    $dbName="lms";

    $connection=mysqli_connect($server,$dbusername,$dbpassword,$dbName);
    if(!$connection){
        die ("Database connection error");
    }else{
        echo "connection success";
    }

    
?>