<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM purchases WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Purchase</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">

    <h2 class="mb-4">Edit Purchase</h2>

    <form action="update_purchase.php" method="POST">

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <input type="text" name="supplier_name" class="form-control mb-3" value="<?php echo $row['supplier_name']; ?>" required>

      <input type="text" name="gemstone_name" class="form-control mb-3" value="<?php echo $row['gemstone_name']; ?>" required>

      <input type="number" name="amount" class="form-control mb-3" value="<?php echo $row['amount']; ?>" required>

      <input type="date" name="purchase_date" class="form-control mb-3" value="<?php echo $row['purchase_date']; ?>" required>

      <button type="submit" class="btn btn-primary">Update Purchase</button>
      <a href="purchases.php" class="btn btn-secondary">Back</a>

    </form>

  </div>
</div>

</body>
</html>