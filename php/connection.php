<?php
    $connection = mysqli_connect("localhost", "root", "", "cvbuilder");
    
    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_error();
    }

    return array(
        'host' => "localhost",
        'username' => "root",
        'password' => "",
        'dbname' => "cvbuilder"
        
    );
?>