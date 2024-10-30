<?php
include 'connection.php';

if(isset($_POST['cert_id'])) {
    $cert_id = $_POST['cert_id'];
    
    $sql = "DELETE FROM certifications WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $cert_id);
    
    $success = $stmt->execute();
    
    header('Content-Type: application/json');
    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false, 'error' => 'No certification ID provided']);
}
?>
