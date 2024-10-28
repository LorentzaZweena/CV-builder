<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['exp_id'];
    $title = $_POST['exp_title'];
    $organization = $_POST['exp_organization'];
    $location = $_POST['exp_location'];
    $start_date = $_POST['exp_start_date'];
    $end_date = $_POST['exp_end_date'];
    $description = $_POST['exp_description'];

    $sql = "UPDATE experiences SET title=?, organization=?, location=?, start_date=?, end_date=?, description=? WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssi", $title, $organization, $location, $start_date, $end_date, $description, $id);
    $stmt->execute();

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index2.php");
    } else {
        echo "Error updating experience: " . mysqli_error($connection);
    }
}
