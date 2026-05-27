<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM sales WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Sale</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

  <div class="card shadow p-4">

    <h2 class="mb-4">Edit Sale</h2>

    <form action="update_sale.php" method="POST">

      <input type="hidden"
             name="id"
             value="<?php echo $row['id']; ?>">

      <input type="text"
             name="customer_name"
             class="form-control mb-3"
             value="<?php echo $row['customer_name']; ?>"
             required>

      <input type="text"
             name="gemstone_name"
             class="form-control mb-3"
             value="<?php echo $row['gemstone_name']; ?>"
             required>

      <input type="number"
             name="amount"
             class="form-control mb-3"
             value="<?php echo $row['amount']; ?>"
             required>

      <input type="date"
             name="sale_date"
             class="form-control mb-3"
             value="<?php echo $row['sale_date']; ?>"
             required>

      <button type="submit" class="btn btn-primary">
        Update Sale
      </button>

      <a href="sales.php" class="btn btn-secondary">
        Back
      </a>

    </form>

  </div>

</div>

</body>
</html>