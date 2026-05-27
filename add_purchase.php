<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $supplier_name = $_POST['supplier_name'];
    $gemstone_name = $_POST['gemstone_name'];
    $amount = $_POST['amount'];
    $purchase_date = $_POST['purchase_date'];

    $query = "INSERT INTO purchases
              (supplier_name, gemstone_name, amount, purchase_date)
              VALUES
              ('$supplier_name', '$gemstone_name', '$amount', '$purchase_date')";

    if (mysqli_query($conn, $query)) {
        header("Location: purchases.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>