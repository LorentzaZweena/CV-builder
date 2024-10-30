<?php
include 'connection.php';

$edu_id = $_POST['edu_id'];
$query = "DELETE FROM education WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $edu_id);

$response = array();
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $stmt->error;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
