<?php
include 'db_connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$color = $_POST['color'];
$weight = $_POST['weight'];
$price = $_POST['price'];

$query = "UPDATE gemstones 
          SET name='$name', color='$color', weight='$weight', price='$price'
          WHERE id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: gemstones.php");
    exit();
} else {
    echo "Error updating gemstone: " . mysqli_error($conn);
}
?>