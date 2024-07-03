<?php
include 'db_connect.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($input['username']) && isset($input['email']) && isset($input['password'])) {
        $username = $input['username'];
        $email = $input['email'];
        $password = $input['password'];
        $location = isset($input['location']) ? $input['location'] : '';
        $phone = isset($input['phone']) ? $input['phone'] : '';

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, location, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $password, $location, $phone);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "User registered successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "All fields are required"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

$conn->close();
?>
