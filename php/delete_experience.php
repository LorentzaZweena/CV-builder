<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exp_id'])) {
    $expId = mysqli_real_escape_string($connection, $_POST['exp_id']);
    
    $sql = "DELETE FROM experiences WHERE id = '$expId'";
    $result = mysqli_query($connection, $sql);
    
    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($connection)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
