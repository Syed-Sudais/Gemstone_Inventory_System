<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM suppliers WHERE supplier_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Supplier</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

  <div class="card shadow p-4">

    <h2 class="mb-4">Edit Supplier</h2>

    <form action="update_supplier.php" method="POST">

      <input type="hidden"
             name="id"
             value="<?php echo $row['supplier_id']; ?>">

      <input type="text"
             name="supplier_name"
             class="form-control mb-3"
             value="<?php echo $row['supplier_name']; ?>"
             required>

      <input type="text"
             name="contact_person"
             class="form-control mb-3"
             value="<?php echo $row['contact_person']; ?>">

      <input type="text"
             name="phone"
             class="form-control mb-3"
             value="<?php echo $row['phone']; ?>">

      <input type="email"
             name="email"
             class="form-control mb-3"
             value="<?php echo $row['email']; ?>">

      <input type="text"
             name="city"
             class="form-control mb-3"
             value="<?php echo $row['city']; ?>">

      <button type="submit" class="btn btn-primary">
        Update Supplier
      </button>

      <a href="suppliers.php" class="btn btn-secondary">
        Back
      </a>

    </form>

  </div>

</div>

</body>
</html>