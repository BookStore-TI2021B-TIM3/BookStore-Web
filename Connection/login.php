<?php
include 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!empty($data['email']) && !empty($data['password'])) {
        $email = $data['email'];
        $password = $data['password'];

        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
           
            if ($password === $row['password']) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Login successful",
                    "user_id" => $row['id']
                ]);
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid password"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Email not found"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Email and password required"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}

$conn->close();
?>
