<?php
include 'db_connect.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id']) && isset($data['username']) && isset($data['email']) && isset($data['password'])) {
        $id = $data['id'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password']; 
        $newPassword = isset($data['newPassword']) ? $data['newPassword'] : '';

        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($dbPassword);
        $stmt->fetch();
        $stmt->close();

        if ($password === $dbPassword) {
            $query = "UPDATE users SET username = ?, email = ?";
            $params = array($username, $email);

            if (!empty($newPassword)) {
                $query .= ", password = ?";
                $params[] = $newPassword; 
            }

            $query .= " WHERE id = ?";
            $params[] = $id; 
            
            $stmt = $conn->prepare($query);
            $types = str_repeat('s', count($params) - 1) . 'i';
            $stmt->bind_param($types, ...$params);

            if ($stmt->execute()) {
                $response['error'] = false;
                $response['message'] = 'User details updated successfully';
            } else {
                $response['error'] = true;
                $response['message'] = 'Failed to update user details';
            }

            $stmt->close();
        } else {
            $response['error'] = true;
            $response['message'] = 'Incorrect password';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Required fields are missing';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);

$conn->close();
?>
