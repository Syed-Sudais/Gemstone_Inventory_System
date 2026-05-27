<!DOCTYPE html>
<html>
<head>
  <title>Add Purchase</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">

    <h2 class="mb-4">Add Purchase</h2>

    <form action="add_purchase.php" method="POST">

      <input type="text" name="supplier_name" class="form-control mb-3" placeholder="Supplier Name" required>

      <input type="text" name="gemstone_name" class="form-control mb-3" placeholder="Gemstone Name" required>

      <input type="number" name="amount" class="form-control mb-3" placeholder="Amount" required>

      <input type="date" name="purchase_date" class="form-control mb-3" required>

      <button type="submit" class="btn btn-success">Save Purchase</button>

      <a href="purchases.php" class="btn btn-secondary">Back</a>

    </form>

  </div>
</div>

</body>
</html>