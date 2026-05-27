<!DOCTYPE html>
<html>
<head>
  <title>Add Sale</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

  <div class="card shadow p-4">

    <h2 class="mb-4">Add Sale</h2>

    <form action="add_sale.php" method="POST">

      <input type="text"
             name="customer_name"
             class="form-control mb-3"
             placeholder="Customer Name"
             required>

      <input type="text"
             name="gemstone_name"
             class="form-control mb-3"
             placeholder="Gemstone Name"
             required>

      <input type="number"
             name="amount"
             class="form-control mb-3"
             placeholder="Amount"
             required>

      <input type="date"
             name="sale_date"
             class="form-control mb-3"
             required>

      <button type="submit" class="btn btn-success">
        Save Sale
      </button>

      <a href="sales.php" class="btn btn-secondary">
        Back
      </a>

    </form>

  </div>

</div>

</body>
</html>