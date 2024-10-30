<?php
include 'connection.php';

$skill_id = $_POST['skill_id'];
$sql = "DELETE FROM skills WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $skill_id);

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
