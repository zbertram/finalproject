<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "recipes";
    $conn = mysqli_connect($serverName, $userName, $password, $dbname);
    if(mysqli_connect_errno()){
        echo "Fail to connect to mySQL".mysqli_connect_error();
    }

?>