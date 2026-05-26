<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO customers
              (customer_name, phone, email)
              VALUES
              ('$name', '$phone', '$email')";

    if (mysqli_query($conn, $query)) {

        header("Location: customers.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>