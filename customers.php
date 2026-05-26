<?php
include 'db_connect.php';

$query = "SELECT * FROM customers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-2 bg-dark text-white vh-100 p-3">

      <h3 class="mb-4">Gemstone System</h3>

      <ul class="nav flex-column">

        <li class="nav-item mb-2">
          <a href="dashboard.html" class="nav-link text-white">Dashboard</a>
        </li>

        <li class="nav-item mb-2">
          <a href="gemstones.php" class="nav-link text-white">Gemstones</a>
        </li>

        <li class="nav-item mb-2">
          <a href="customers.php" class="nav-link text-white">Customers</a>
        </li>

        <li class="nav-item mb-2">
          <a href="suppliers.html" class="nav-link text-white">Suppliers</a>
        </li>

        <li class="nav-item mb-2">
          <a href="sales.html" class="nav-link text-white">Sales</a>
        </li>

        <li class="nav-item mb-2">
          <a href="purchases.html" class="nav-link text-white">Purchases</a>
        </li>

        <li class="nav-item mb-2">
          <a href="inventory.html" class="nav-link text-white">Inventory</a>
        </li>

        <li class="nav-item mb-2">
          <a href="categories.html" class="nav-link text-white">Categories</a>
        </li>

      </ul>

    </div>

    <div class="col-md-10 p-4 main-content">

      <div class="d-flex justify-content-between mb-4">

        <h1>Customers</h1>

        <a href="add_customer_form.php" class="btn btn-success">
          Add Customer
        </a>

      </div>

      <div class="card shadow p-3">

        <table class="table table-bordered table-hover">

          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>

          <?php
          while($row = mysqli_fetch_assoc($result)) {
          ?>

            <tr>

              <td><?php echo $row['customer_id']; ?></td>

              <td><?php echo $row['customer_name']; ?></td>

              <td><?php echo $row['email']; ?></td>

              <td><?php echo $row['phone']; ?></td>

              <td>

                <a href="edit_customer.php?id=<?php echo $row['customer_id']; ?>"
                   class="btn btn-primary btn-sm">
                   Edit
                </a>

                <a href="delete_customer.php?id=<?php echo $row['customer_id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this customer?');">
                   Delete
                </a>

              </td>

            </tr>

          <?php
          }
          ?>

          </tbody>

        </table>

      </div>

    </div>

  </div>
</div>

</body>
</html>