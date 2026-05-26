<?php
include 'db_connect.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM suppliers
              WHERE supplier_id = $id";

    if (mysqli_query($conn, $query)) {

        header("Location: suppliers.php");
        exit();

    } else {

        echo "Error deleting supplier.";

    }
}
?>  