<?php
include 'db_connect.php';

$query = "SELECT * FROM gemstones";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gemstones</title>

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
          <a href="customers.html" class="nav-link text-white">Customers</a>
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

        <h1>Gemstones</h1>

        <a href="add_gemstone_form.php" class="btn btn-success">
          Add Gemstone
        </a>

      </div>

      <div class="card shadow p-3">

        <table class="table table-bordered table-hover">

          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Color</th>
              <th>Weight</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>

          <?php
          while($row = mysqli_fetch_assoc($result)) {
          ?>

            <tr>

              <td><?php echo $row['id']; ?></td>

              <td><?php echo $row['name']; ?></td>

              <td><?php echo $row['color']; ?></td>

              <td><?php echo $row['weight']; ?></td>

              <td>$<?php echo $row['price']; ?></td>

              <td>

                <a href="edit_gemstone.php?id=<?php echo $row['id']; ?>"
                   class="btn btn-primary btn-sm">
                   Edit
                </a>

                <a href="delete_gemstone.php?id=<?php echo $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this gemstone?');">
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