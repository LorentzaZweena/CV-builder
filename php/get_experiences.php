<?php
include 'connection.php';

$cv_id = $_GET['cv_id'];
$sql = "SELECT * FROM experiences WHERE cv_id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $cv_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$experiences = array();
while($row = mysqli_fetch_assoc($result)) {
    $experiences[] = $row;
}

header('Content-Type: application/json');
echo json_encode($experiences);
?>
