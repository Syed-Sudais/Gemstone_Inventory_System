<?php include 'auth_check.php'; ?>
<?php
include 'db_connect.php';

$query = "SELECT * FROM suppliers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Suppliers</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-2 bg-dark text-white vh-100 p-3">
      <h3 class="mb-4">Gemstone System</h3>

      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="dashboard.html" class="nav-link text-white">Dashboard</a></li>
        <li class="nav-item mb-2"><a href="gemstones.php" class="nav-link text-white">Gemstones</a></li>
        <li class="nav-item mb-2"><a href="customers.php" class="nav-link text-white">Customers</a></li>
        <li class="nav-item mb-2"><a href="suppliers.php" class="nav-link text-white">Suppliers</a></li>
        <li class="nav-item mb-2"><a href="sales.html" class="nav-link text-white">Sales</a></li>
        <li class="nav-item mb-2"><a href="purchases.html" class="nav-link text-white">Purchases</a></li>
        <li class="nav-item mb-2"><a href="inventory.html" class="nav-link text-white">Inventory</a></li>
        <li class="nav-item mb-2"><a href="categories.html" class="nav-link text-white">Categories</a></li>
      </ul>
    </div>

    <div class="col-md-10 p-4 main-content">

      <div class="d-flex justify-content-between mb-4">
        <h1>Suppliers</h1>
        <a href="add_supplier_form.php" class="btn btn-success">Add Supplier</a>
      </div>

      <div class="card shadow p-3">

        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Supplier Name</th>
              <th>Contact Person</th>
              <th>Phone</th>
              <th>Email</th>
              <th>City</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
          <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $row['supplier_id']; ?></td>
              <td><?php echo $row['supplier_name']; ?></td>
              <td><?php echo $row['contact_person']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td>
                <a href="edit_supplier.php?id=<?php echo $row['supplier_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="delete_supplier.php?id=<?php echo $row['supplier_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this supplier?');">Delete</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

      </div>

    </div>

  </div>
</div>

</body>
</html>