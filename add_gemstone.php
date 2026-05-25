<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $color = $_POST['color'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];

    $query = "INSERT INTO gemstones (name, color, weight, price)
              VALUES ('$name', '$color', '$weight', '$price')";

    if (mysqli_query($conn, $query)) {
        header("Location: gemstones.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>