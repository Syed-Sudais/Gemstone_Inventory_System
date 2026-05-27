<?php
include 'db_connect.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM sales WHERE id = $id";

    if (mysqli_query($conn, $query)) {

        header("Location: sales.php");
        exit();

    } else {

        echo "Error deleting sale.";
    }
}
?>