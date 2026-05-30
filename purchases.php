<?php include 'auth_check.php'; ?>
<?php
include 'db_connect.php';

$query = "SELECT * FROM purchases";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchases</title>

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

        .table-box{
            background:white;
            padding:20px;
            border-radius:15px;
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

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Purchases</h1>

        <a href="add_purchase_form.php" class="btn btn-success">
            Add Purchase
        </a>

    </div>

    <div class="table-box">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Gemstone</th>
                    <th>Amount</th>
                    <th>Purchase Date</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['supplier_name']; ?></td>

                    <td><?php echo $row['gemstone_name']; ?></td>

                    <td><?php echo $row['amount']; ?></td>

                    <td><?php echo $row['purchase_date']; ?></td>

                    <td>

                        <a href="edit_purchase.php?id=<?php echo $row['id']; ?>"
                           class="btn btn-primary btn-sm">
                           Edit
                        </a>

                        <a href="delete_purchase.php?id=<?php echo $row['id']; ?>"
                           class="btn btn-danger btn-sm">
                           Delete
                        </a>

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>