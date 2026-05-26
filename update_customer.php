<?php
include 'db_connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "UPDATE customers 
          SET customer_name='$name', email='$email', phone='$phone'
          WHERE customer_id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: customers.php");
    exit();
} else {
    echo "Error updating customer: " . mysqli_error($conn);
}
?>