<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM purchases WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: purchases.php");
        exit();
    } else {
        echo "Error deleting purchase.";
    }
}
?>