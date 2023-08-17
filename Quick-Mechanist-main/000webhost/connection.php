<?php 
    $servername = "localhost";
    $username = "id20568145_root";
    $password = "Admin#$6264";
    $dbname = "id20568145_repairspot";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die ('connection faild:'.$conn->connect_error);
    }
?>