<?php
include "connection/db_connect.php"; 

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];  // Retrieve the author data
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $synopsis = $_POST['synopsis'];
    
    if (isset($_FILES['imageUrl']['name']) && $_FILES['imageUrl']['name'] != "") {
        $imageUrl = $_FILES['imageUrl']['name'];
        $tmp_name = $_FILES['imageUrl']['tmp_name'];
        move_uploaded_file($tmp_name, "assets/img/" . $imageUrl);
        $query = "UPDATE books SET title='$title', author='$author', price='$price', rating='$rating', synopsis='$synopsis', imageUrl='$imageUrl' WHERE id='$id'";
    } else {
        $query = "UPDATE books SET title='$title', author='$author', price='$price', rating='$rating', synopsis='$synopsis' WHERE id='$id'";
    }

    if ($mysqli->query($query)) {
        header("Location: buku.php");
    } else {
        die('Ada kesalahan pada query: ' . $mysqli->error);
    }
}
?>
