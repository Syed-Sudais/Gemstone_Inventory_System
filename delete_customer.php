<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM customers WHERE customer_id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: customers.php");
        exit();
    } else {
        echo "Error deleting customer.";
    }
}
?>