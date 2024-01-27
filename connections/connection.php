<?php

    function connection(){
        
      // Connect database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "employee_system";

    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error){
        echo $conn->connect_error;

    }else {
        return $conn;
    }

}