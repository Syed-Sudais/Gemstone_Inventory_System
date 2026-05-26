<?php
include 'db_connect.php';

$id = $_POST['id'];
$supplier_name = $_POST['supplier_name'];
$contact_person = $_POST['contact_person'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];

$query = "UPDATE suppliers SET
          supplier_name='$supplier_name',
          contact_person='$contact_person',
          phone='$phone',
          email='$email',
          city='$city'
          WHERE supplier_id=$id";

if (mysqli_query($conn, $query)) {

    header("Location: suppliers.php");
    exit();

} else {

    echo "Error updating supplier: " . mysqli_error($conn);

}
?>