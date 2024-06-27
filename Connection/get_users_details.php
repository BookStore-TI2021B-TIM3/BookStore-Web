<?php
include 'db_connect.php'; 

header('Content-Type: application/json');

$response = array('status' => 'error');

if (isset($_GET['user_id'])) {
    $user_id = (int) $_GET['user_id']; 

    $query = "SELECT username, email, password FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param('i', $user_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response['status'] = 'success';
                $response['data'] = $row;
            } else {
                $response['message'] = 'User not found.';
            }
        } else {
            $response['message'] = 'Failed to execute query.';
        }

        $stmt->close();
    } else {
        $response['message'] = 'Failed to prepare query.';
    }
} else {
    $response['message'] = 'User ID not provided.';
}

echo json_encode($response);
?>