<?php
    include("connection.php");
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM `experiences` WHERE id='$id'";
    mysqli_query($connection, $query);

    header('location:create-experiences.php');
?>
