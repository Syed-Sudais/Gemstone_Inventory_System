<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = $_POST['customer_name'];
    $gemstone_name = $_POST['gemstone_name'];
    $amount = $_POST['amount'];
    $sale_date = $_POST['sale_date'];

    $query = "INSERT INTO sales
              (customer_name, gemstone_name, amount, sale_date)
              VALUES
              ('$customer_name', '$gemstone_name', '$amount', '$sale_date')";

    if (mysqli_query($conn, $query)) {

        header("Location: sales.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}
?>