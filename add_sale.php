<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = $_POST['customer_name'];
    $gemstone_name = $_POST['gemstone_name'];
    $amount = $_POST['amount'];
    $sale_date = $_POST['sale_date'];

    // INSERT SALE
    $sale_query = "INSERT INTO sales
    (customer_name, gemstone_name, amount, sale_date)
    VALUES
    ('$customer_name', '$gemstone_name', '$amount', '$sale_date')";

    mysqli_query($conn, $sale_query);

    // CHECK INVENTORY
    $inventory_query = "SELECT * FROM inventory
                        WHERE gemstone_name='$gemstone_name'";

    $inventory_result = mysqli_query($conn, $inventory_query);

    if(mysqli_num_rows($inventory_result) > 0){

        $row = mysqli_fetch_assoc($inventory_result);

        $new_quantity = $row['quantity'] - $amount;

        // PREVENT NEGATIVE STOCK
        if($new_quantity < 0){
            $new_quantity = 0;
        }

        $update_query = "UPDATE inventory
                         SET quantity='$new_quantity'
                         WHERE gemstone_name='$gemstone_name'";

        mysqli_query($conn, $update_query);
    }

    header("Location: sales.php");
    exit();
}
?>