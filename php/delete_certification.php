<?php
include 'connection.php';

if (isset($_POST['cert_id'])) {
    $cert_id = $_POST['cert_id'];
    
    $sql = "DELETE FROM certifications WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $cert_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $connection->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No certification ID provided']);
}
?>
