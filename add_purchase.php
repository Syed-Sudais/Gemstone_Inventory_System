<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $supplier_name = $_POST['supplier_name'];
    $gemstone_name = $_POST['gemstone_name'];
    $amount = $_POST['amount'];
    $purchase_date = $_POST['purchase_date'];

    // INSERT PURCHASE
    $purchase_query = "INSERT INTO purchases
    (supplier_name, gemstone_name, amount, purchase_date)
    VALUES
    ('$supplier_name', '$gemstone_name', '$amount', '$purchase_date')";

    mysqli_query($conn, $purchase_query);

    // CHECK INVENTORY
    $check_query = "SELECT * FROM inventory
                    WHERE gemstone_name='$gemstone_name'";

    $check_result = mysqli_query($conn, $check_query);

    // IF GEMSTONE EXISTS
    if(mysqli_num_rows($check_result) > 0){

        $row = mysqli_fetch_assoc($check_result);

        $new_quantity = $row['quantity'] + $amount;

        $update_query = "UPDATE inventory
                         SET quantity='$new_quantity'
                         WHERE gemstone_name='$gemstone_name'";

        mysqli_query($conn, $update_query);

    } else {

        // INSERT NEW INVENTORY ITEM
        $insert_inventory = "INSERT INTO inventory
        (gemstone_name, quantity, location, minimum_stock)
        VALUES
        ('$gemstone_name', '$amount', 'Main Store', 5)";

        mysqli_query($conn, $insert_inventory);
    }

    header("Location: purchases.php");
    exit();
}
?>