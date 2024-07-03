<?php
include 'db_connect.php';

header('Content-Type: application/json');

$response = array('status' => 'error');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you are receiving JSON data
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate and sanitize input
    $id = (isset($data['id'])) ? intval($data['id']) : 0;
    $username = (isset($data['username'])) ? $data['username'] : '';
    $email = (isset($data['email'])) ? $data['email'] : '';
    $password = (isset($data['password'])) ? $data['password'] : '';
    $location = (isset($data['location'])) ? $data['location'] : '';
    $phone = (isset($data['phone'])) ? $data['phone'] : ''; // Change to VARCHAR type

    if (!empty($id) && !empty($username) && !empty($email)) {
        // Construct SQL query
        $query = "UPDATE users SET username = ?, email = ?";
        $types = "ss";
        $params = array($username, $email);

        // Add location to query if provided
        if (isset($data['location'])) {
            $query .= ", location = ?";
            $types .= "s";
            $params[] = $location;
        }

        // Add phone to query if provided
        if (isset($data['phone'])) {
            $query .= ", phone = ?";
            $types .= "s";
            $params[] = $phone;
        }

        // Add password to query if provided
        if (!empty($password)) {
            $query .= ", password = ?";
            $types .= "s";
            $params[] = $password;
        }

        $query .= " WHERE id = ?";
        $types .= "i";
        $params[] = $id;

        // Prepare statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'User details updated successfully';
        } else {
            $response['message'] = 'Failed to update user details';
        }

        $stmt->close();
    } else {
        $response['message'] = 'Required fields are missing';
    }
} else {
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);

$conn->close();
?>
