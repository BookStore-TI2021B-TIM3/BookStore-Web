<?php
include 'db_connect.php';

$username = $_GET['username'];

$sql = "SELECT * FROM orders WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$orders = array();
while ($row = $result->fetch_assoc()) {
    // Format the arrival date
    if (isset($row['arrival'])) {
        $date = new DateTime($row['arrival']);
        $row['arrival'] = $date->format('d-m-Y');
    }
    $orders[] = $row;
}

echo json_encode($orders);

$stmt->close();
$conn->close();
?>
