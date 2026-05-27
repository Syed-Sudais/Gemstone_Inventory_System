<?php
include 'db_connect.php';

$id = $_POST['id'];
$supplier_name = $_POST['supplier_name'];
$gemstone_name = $_POST['gemstone_name'];
$amount = $_POST['amount'];
$purchase_date = $_POST['purchase_date'];

$query = "UPDATE purchases SET
          supplier_name='$supplier_name',
          gemstone_name='$gemstone_name',
          amount='$amount',
          purchase_date='$purchase_date'
          WHERE id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: purchases.php");
    exit();
} else {
    echo "Error updating purchase: " . mysqli_error($conn);
}
?>