<?php
include 'connection.php';

if (isset($_GET['cv_id'])) {
    $cv_id = $_GET['cv_id'];
    
    $sql = "SELECT * FROM certifications WHERE cv_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $cv_id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $certifications = [];
    
    while ($row = $result->fetch_assoc()) {
        $certifications[] = $row;
    }
    
    echo json_encode($certifications);
} else {
    echo json_encode([]);
}
?>
