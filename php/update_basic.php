<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
    $designation = mysqli_real_escape_string($connection, $_POST['designation']);

    $sql = "UPDATE creative SET full_name = '$full_name', designation = '$designation' WHERE id = '$id'";
    
    if (mysqli_query($connection, $sql)) {
        header("Location: index2.php");
        exit();
    }
}
?>
