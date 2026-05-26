<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM customers WHERE customer_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">
    <h2 class="mb-4">Edit Customer</h2>

    <form action="update_customer.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['customer_id']; ?>">

      <input type="text" name="name" class="form-control mb-3" value="<?php echo $row['customer_name']; ?>" required>

      <input type="email" name="email" class="form-control mb-3" value="<?php echo $row['email']; ?>" required>

      <input type="text" name="phone" class="form-control mb-3" value="<?php echo $row['phone']; ?>" required>

      <button type="submit" class="btn btn-primary">Update Customer</button>
      <a href="customers.php" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>

</body>
</html>