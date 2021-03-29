<?php
    $servername= 'localhost';
    $username= 'root';
    $password= '';
    $dbname= 'db_user';

    // create connection
    $conn= new mysqli($servername, $username, $password, $dbname);

    //check connection
    if($conn->connect_error){
        die("conection failed: ".$conn->connect_error);
    }
    // echo "Connection successfully";
?>