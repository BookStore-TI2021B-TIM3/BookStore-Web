<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    $query = "SELECT username FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($username);
    
    if ($stmt->fetch()) {
        $response = array('username' => $username);
        echo json_encode($response);
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'User not found'));
    }
    
    $stmt->close();
    $conn->close();
}
?>
