<?php
include 'db_connect.php';

$id = $_POST['id'];
$customer_name = $_POST['customer_name'];
$gemstone_name = $_POST['gemstone_name'];
$amount = $_POST['amount'];
$sale_date = $_POST['sale_date'];

$query = "UPDATE sales SET
          customer_name='$customer_name',
          gemstone_name='$gemstone_name',
          amount='$amount',
          sale_date='$sale_date'
          WHERE id=$id";

if (mysqli_query($conn, $query)) {

    header("Location: sales.php");
    exit();

} else {

    echo "Error updating sale: " . mysqli_error($conn);
}
?>