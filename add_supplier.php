<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $supplier_name = $_POST['supplier_name'];
    $contact_person = $_POST['contact_person'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $query = "INSERT INTO suppliers
              (supplier_name, contact_person, phone, email, city)
              VALUES
              ('$supplier_name', '$contact_person', '$phone', '$email', '$city')";

    if (mysqli_query($conn, $query)) {

        header("Location: suppliers.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>