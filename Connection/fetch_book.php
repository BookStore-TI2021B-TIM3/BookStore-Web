<?php
include 'db_connect.php';

$sql = "SELECT id, author, title, price, rating, synopsis, imageUrl FROM books";
$result = $conn->query($sql);

$books = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

$conn->close();

echo json_encode($books);
?>
