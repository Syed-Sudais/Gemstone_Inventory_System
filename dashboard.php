<?php include 'auth_check.php'; ?>
<?php
include 'db_connect.php';

// TOTAL GEMSTONES
$gemstones = mysqli_query($conn, "SELECT COUNT(*) as total FROM gemstones");
$gemstones_total = mysqli_fetch_assoc($gemstones)['total'];

// TOTAL CUSTOMERS
$customers = mysqli_query($conn, "SELECT COUNT(*) as total FROM customers");
$customers_total = mysqli_fetch_assoc($customers)['total'];

// TOTAL SUPPLIERS
$suppliers = mysqli_query($conn, "SELECT COUNT(*) as total FROM suppliers");
$suppliers_total = mysqli_fetch_assoc($suppliers)['total'];

// TOTAL SALES
$sales = mysqli_query($conn, "SELECT COUNT(*) as total FROM sales");
$sales_total = mysqli_fetch_assoc($sales)['total'];

// LOW STOCK ITEMS
$low_stock = mysqli_query($conn,
"SELECT * FROM inventory
 WHERE quantity <= minimum_stock");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f4f4;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#111827;
            padding-top:20px;
        }

        .sidebar h2{
            color:white;
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:white;
            padding:15px 25px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#1f2937;
        }

        .content{
            margin-left:260px;
            padding:40px;
        }

        .card-box{
            border-radius:15px;
            color:white;
            padding:25px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .low-stock{
            background:white;
            border-radius:15px;
            padding:20px;
            margin-top:30px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

    </style>

</head>

<body>

<div class="sidebar">

    <h2>Gemstone System</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="gemstones.php">Gemstones</a>
    <a href="customers.php">Customers</a>
    <a href="suppliers.php">Suppliers</a>
    <a href="sales.php">Sales</a>
    <a href="purchases.php">Purchases</a>
    <a href="inventory.php">Inventory</a>
    <a href="categories.php">Categories</a>

</div>

<div class="content">

    <h1 class="mb-4">Dashboard</h1>

    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card-box bg-primary">
                <h3><?php echo $gemstones_total; ?></h3>
                <p>Total Gemstones</p>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card-box bg-success">
                <h3><?php echo $customers_total; ?></h3>
                <p>Total Customers</p>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card-box bg-warning">
                <h3><?php echo $suppliers_total; ?></h3>
                <p>Total Suppliers</p>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card-box bg-danger">
                <h3><?php echo $sales_total; ?></h3>
                <p>Total Sales</p>
            </div>
        </div>

    </div>

    <div class="low-stock">

        <h3 class="mb-3">Low Stock Alerts</h3>

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>
                    <th>Gemstone</th>
                    <th>Quantity</th>
                    <th>Minimum Stock</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($low_stock)) { ?>

                <tr>

                    <td><?php echo $row['gemstone_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['minimum_stock']; ?></td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>