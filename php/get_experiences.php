<?php
include 'connection.php';

$exp_id = $_GET['id'];
$sql = "SELECT * FROM experiences WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $exp_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$experience = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode($experience);
?>